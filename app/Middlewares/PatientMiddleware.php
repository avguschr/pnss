<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;


class PatientMiddleware
{
    public function handle(Request $request)
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
        }
        if(!Auth::user()->isPatient())
        {
            app()->route->redirect('/login');
        }
    }
}