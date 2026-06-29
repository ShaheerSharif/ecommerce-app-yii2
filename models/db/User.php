<?php

declare(strict_types=1);

namespace app\models\db;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public const SCENARIO_REGISTER = 'register';
    public const SCENARIO_API_REGISTER = 'api-register';

    public string $password_repeat;

    public static function tableName()
    {
        return '{{%users}}';
    }

    public function fields()
    {
        return [
            'id',
            'username',
            'email',
        ];
    }

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],

            [['username', 'email'], 'trim'], // trims the white spaces surrounding username and email

            ['username', 'string', 'min' => 10, 'max' => 40],
            ['email', 'email'],
            ['password', 'string', 'min' => 8],

            [['username', 'email'], 'unique'],

            ['password_repeat', 'required', 'on' => self::SCENARIO_REGISTER],
            ['password_repeat', 'string', 'min' => 8, 'on' => self::SCENARIO_REGISTER],
            ['password', 'compare', 'compareAttribute' => 'password_repeat', 'on' => self::SCENARIO_REGISTER],
        ];
    }

    public static function register(string $username, string $email, string $password): static
    {
        $user = new static();
        $user->scenario = self::SCENARIO_REGISTER;
        $user->username = $username;
        $user->email = $email;
        $user->password = Yii::$app->security->generatePasswordHash($password);

        if (!$user->save()) {
            throw new \RuntimeException(json_encode($user->getErrors()));
        }

        return $user;
    }

    public static function findByEmailAndPassword(string $email, string $password): ?static
    {
        $user = static::find()
            ->where(['email' => $email])
            ->one();

        if (!$user) {
            return null;
        }

        if (!Yii::$app->security->validatePassword($password, $user->password)) {
            return null;
        }

        return $user;
    }
}
