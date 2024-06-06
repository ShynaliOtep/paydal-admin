<?php

namespace App\Filament\Pages\Auth;

use App\Services\Company\CompanyLogin;
use App\Services\Demo\DemoService;
use App\Services\UserService;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Models\Contracts\FilamentUser;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{

    public function authenticate(): ?LoginResponse
    {
        $parent = parent::authenticate();

        $user = Filament::auth()->user();

        if ($user->police_id) {
            session()->put('police_id', $user->police_id);
        }


        return $parent;
    }
}
