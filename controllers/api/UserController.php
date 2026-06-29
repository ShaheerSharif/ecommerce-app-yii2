<?php

namespace app\controllers\api;

use app\models\db\User;

class UserController extends ApiController
{
    public $modelClass = User::class;

    // GET - user/info/{id}
    public function actionInfo($id)
    {

    }

    // POST - user/modify/{id}
    public function actionModify($id)
    {

    }
}
