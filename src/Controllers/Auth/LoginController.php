<?php

namespace App\Controllers\Auth;

use App\Application;
use App\Core\Auth;
use App\Core\Request;

class LoginController
{
        /**
     * [login callback]
     *
     * @param Request $req [request]
     *
     * @return [view]       [renders login]
     */
    public static function index(Request $req)
    {
        // if request was post then
        if ($req->onPost()) {
            return 'Logged in succesfully';
        }
        // renders the login view and returns it
        return Application::$app->router->renderView('login');
    }

    /**
     * [callback handler for handling login and session]
     *
     * @return [route] [returns to home]
     */
    public static function login()
    {
        Auth::validate();
    }
}
