<?php

declare(strict_types=1);

namespace app\models\db;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

class ProductVariant extends ActiveRecord
{
    public function tableName()
    {
        return '%{{product_variants}}';
    }

    public function fields()
    {
        return [
            'id',
            'barcode',
            'barcode_type',
            'sku',
            'is_active',
            'unit_price',
            'stock',
            'description',
            'expiry_date',
            'weight',
            'size',
            'color',
            'created_at',
            'updated_at',
        ];
    }

    public function extraFields()
    {
        return [
            'group',
        ];
    }

    public function rules()
    {
        return [];
    }

    public static function fetchViaPagination(int $pageSize): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => static::find(),
            'pagination' => [
                'pageSize' => $pageSize,
            ],
        ]);
    }

    /**
     * Fetches a key/cursor
     * @param int $lastId
     * @return ProductVariant[]
     */
    public static function fetchViaCursor(int $lastId): array
    {
        return static::find()
            ->where(['>', 'id', $lastId])
            ->orderBy(['id' => SORT_ASC])
            ->limit(20)
            ->all();
    }
}
