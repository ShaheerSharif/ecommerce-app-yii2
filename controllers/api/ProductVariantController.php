<?php

namespace app\controllers\api;

use app\models\db\ProductVariant;
use Yii;
use yii\data\ActiveDataProvider;

class ProductVariantController extends ApiController
{
    public function actionIndex()
    {
        return ProductVariant::fetchViaPagination(20);
    }
}
