<?php

namespace app\components;

class ApiResponse
{
    public static function success(
        array $data,
        string $message = 'Success',
        int $statusCode = 200,
        array $meta = []
    ) {
        return self::genericResponse(
            ['data' => $data],
            true,
            $message,
            $statusCode,
            $meta
        );
    }

    public static function createdSuccess(
        array $data,
        string $message = 'Created',
        int $statusCode = 201,
        array $meta = []
    ) {
        return self::success(
            $data,
            $message,
            $statusCode,
            $meta
        );
    }

    public static function error(
        array $error,
        string $message = 'Error',
        int $statusCode = 400,
        array $meta = []
    ) {
        return self::genericResponse(
            ['error' => $error],
            false,
            $message,
            $statusCode,
            $meta
        );
    }

    public static function unauthorizedError(
        array $error,
        string $message = 'Unauthorized',
        int $statusCode = 401,
        array $meta = []
    ) {
        return self::error(
            $error,
            $message,
            $statusCode,
            $meta
        );
    }

    public static function forbiddenError(
        array $error,
        string $message = 'Forbidden',
        int $statusCode = 403,
        array $meta = []
    ) {
        return self::error(
            $error,
            $message,
            $statusCode,
            $meta
        );
    }

    public static function validationError(
        array $error,
        string $message = 'Validation error',
        int $statusCode = 422,
        array $meta = []
    ) {
        return self::error(
            $error,
            $message,
            $statusCode,
            $meta
        );
    }

    private static function genericResponse(
        array $fields,
        bool $success,
        string $message,
        int $statusCode,
        array $meta = []
    ) {
        return [
            'success' => $success,
            'message' => $message,

            ...$fields,

            'meta' => [
                'status' => $statusCode,
                'retrieved_at' => date('Y-m-d H:i:s'),
                ...$meta,
            ],
        ];
    }
}
