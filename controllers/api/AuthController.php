<?php

namespace app\controllers\api;

use app\models\db\User;

class AuthController extends ApiController
{
    public $modelClass = User::class;

    // POST - auth/login
    public function actionLogin()
    {

    }

    // POST - auth/register
    public function actionRegister()
    {

    }

    // POST - auth/forgot-password
    public function actionForgotPassword()
    {

    }

    // GET - auth/logout
    public function actionLogout()
    {

    }
}
