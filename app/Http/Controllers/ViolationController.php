<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Violation;
use App\Models\Volunteer;

class ViolationController extends Controller
{
    public function list()
    {

        $violations = [];
        //$violations = Violation::where('status', 'created')->get();
        $violations = Violation::all();
        return view('violations', ['violations' => $violations]);
    }

    public function policeViolation(int $id)
    {
        $violation = Violation::where('id', $id)->first();
        return view('police.violation', ['violation' => $violation]);
    }

    public function volunteerViolations(int $userId)
    {

        $violations = [];
        $volunteer = Volunteer::where('user_id', $userId)->first();

        if ($volunteer) {
            $violations = Violation::where('volunteer_id', $volunteer->id)->get();
        }
        return view('violations', ['violations' => $violations]);
    }

    public function policeViolations(int $userId)
    {

        $violations = [];
        $volunteer = User::where('id', $userId)->first();

        if ($volunteer) {
            $violations = Violation::where('police_id', $volunteer->id)->get();
        }
        return view('violations', ['violations' => $violations]);
    }
}
