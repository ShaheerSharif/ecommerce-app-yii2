<?php

namespace app\modules\api;

use Yii;
use yii\base\Module as BaseModule;
use yii\web\JsonParser;
use yii\web\Response;

class Module extends BaseModule
{
    public function init()
    {
        parent::init();

        Yii::$app->request->parsers = array_merge(
            Yii::$app->request->parsers,
            [
                'application/json' => JsonParser::class,
            ]
        );

        Yii::$app->response->format = Response::FORMAT_JSON;
    }
}
