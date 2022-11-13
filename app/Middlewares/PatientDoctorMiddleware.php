<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;


class PatientDoctorMiddleware
{
    public function handle(Request $request)
    {
        if (!Auth::check()) {
            app()->route->redirect('/');
        }
        if(!Auth::user()->isPatient() && !Auth::user()->isDoctor())
        {
            app()->route->redirect('/');
        }
    }
}