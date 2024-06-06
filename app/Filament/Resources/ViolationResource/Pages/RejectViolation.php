<?php

namespace App\Filament\Resources\ViolationResource\Pages;

use App\Filament\Resources\ViolationResource;
use App\Models\Violation;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Resources\Pages\Page;

class RejectViolation extends Page
{
    use InteractsWithFormActions;

    protected static string $resource = ViolationResource::class;
    protected static ?string $title = 'Отклонить заявку';

    protected static string $view = 'filament.resources.violation-resource.pages.reject-violation';
    //protected static ?string $slug = 'violations/reject';

    /**
     * @var array<string, mixed> | null
     */
    public ?array $data = [];

    protected ?int $violationId = null;

    public function __construct()
    {
        $this->violationId = $_GET['id'] ?? null;
    }

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form;
    }


    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        Hidden::make('id')->default($this->violationId),
                        Textarea::make('reason')->label('Причина')
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    public function register()
    {
        $data = $this->form->getState();
        $violation = Violation::where('id', $data['id'])->first();
        $violation->reason = $data['reason'];
        $violation->status = 'rejected';
        $violation->save();
        redirect()->intended(Filament::getUrl());
    }

    protected function getFormActions(): array
    {
        return [
            $this->getRegisterFormAction(),
        ];
    }

    public function getRegisterFormAction(): Action
    {
        return Action::make('reject')
            ->label('Отклонить')
            ->submit('reject');
    }
}
