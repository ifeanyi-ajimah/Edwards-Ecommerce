<?php

namespace App\Models;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AppHttpResponse extends Model
{
    public static function getApiBaseUrl(): string {
        return '/api/';
    }

    public static function getWebsiteBaseUrl(): string {
        return url('/');
    }

    
    // error tries to conform to laravel validation error messages
    public static function responseError($code, $message = '', $errors = null): JsonResponse {
        return response()->json(
            [
                "message" => $message,
                "errors" => $errors
            ], $code);
    }

    public static function responseWarning($code, $message = '', $data = null): JsonResponse {
        return response()->json([
            'status' => [
                'code' => $code,
                'text' => 'warning'
            ],
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public static function responseFailure($code, $message = '', $data = null): JsonResponse {
        return response()->json([
            'status' => [
                'code' => $code,
                'text' => 'failure'
            ],
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public static function notFound($message = 'resource not found'): JsonResponse {
        return response()->json([
            'status' => [
                'code' => Response::HTTP_NOT_FOUND,
                'text' => 'not found'
            ],
            'message' => $message,
            'data' => null
        ], Response::HTTP_NOT_FOUND);
    }

    public static function responseSuccess($code, $message, $data): JsonResponse {

        return response()->json([
            'status' => [
                'code' => $code,
                'text' => 'success'
            ],
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
