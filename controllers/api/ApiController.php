<?php

namespace app\controllers\api;

use Yii;
use yii\web\Controller;
use yii\web\JsonParser;
use yii\web\Response;

class ApiController extends Controller
{
    /**
     * {@inheritDoc}
     */
    public function beforeAction($action)
    {
        Yii::$app->request->parsers['application/json'] = JsonParser::class;
        Yii::$app->response->format = Response::FORMAT_JSON;

        return parent::beforeAction($action);
    }
}
