<?php

namespace  App\Http\Controllers\Api\Auth\Traits;

use JWTAuth;
use http\Exception\RuntimeException;

use Tymon\JWTAuth\Exceptions\JWTException;

/**
 *
 * @copyright (c) 2018, Carlos Junior
 */
trait AuthTrait
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request()->only(['email', 'password']);

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return $this->respondWithToken($token);
    }


    public function getUser()
    {
        try {

            if ( !$user = JWTAuth::parseToken()->authenticate()) {
                return [
                    'response' => 'user_not_found',
                    'status'   => 404
                ];
            }
        }

        catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return [
                'response' => 'token_expired',
                'status' =>  $e->getCode()
            ];

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return [
                'response' => 'token_invalid',
                'status' =>  $e->getCode()
            ];

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return [
                'response' => 'token_absent',
                'status' =>  $e->getCode()
            ];
        }

        return [
            'response' => $user,
            'status' => 200
        ];
    }


    private function respondWithToken($token)
    {
        $user = auth()->user();

        return response()->json([
            'token' => $token,
            'user' => $user,
            'token_type' => 'bearer',
        ]);
    }

    /**
     * @param array $response
     * @return bool
     */
    private function isAuthenticated(array $response): bool
    {
        if (!array_key_exists('status', $response)) {
            throw new RuntimeException('Faltando atributo status para verificar autênticação');
        }

        return $response['status'] == 200;
    }

}
