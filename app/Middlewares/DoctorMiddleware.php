<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;


class DoctorMiddleware
{
    public function handle(Request $request)
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
        }
        if(!Auth::user()->isDoctor())
        {
            app()->route->redirect('/login');
        }
    }
}