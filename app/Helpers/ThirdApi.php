<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class ThirdApi
{
    public static function createAccount($user_ext)
    {
        // Persiapkan data untuk dikirimkan
        $postArray = [
            'method' => 'user_create', 
            'agent_code' => 'ducduc', 
            'agent_token' => 'c4648a633d8887d7d4f7bafc3dcfe656',
            'user_code' => $user_ext
        ];

        try {
            $response = Http::timeout(5)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post('https://api.nexusggr.com', $postArray);

            if ($response->successful()) {
                return [
                    'status' => true,
                    'message' => 'Account created successfully',
                    'data' => $response->json()
                ];
            } elseif ($response->serverError()) {
                return [
                    'status' => false,
                    'message' => 'Server error occurred',
                    'code' => $response->status(),
                    'data' => null
                ];
            } elseif ($response->clientError()) {
                return [
                    'status' => false,
                    'message' => 'Client error occurred: ' . $response->body(),
                    'code' => $response->status(),
                    'data' => null
                ];
            } else {
                return [
                    'status' => false,
                    'message' => 'Unknown error occurred',
                    'code' => $response->status(),
                    'data' => null
                ];
            }

        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'Request error: ' . $e->getMessage(),
                'code' => null,
                'data' => null
            ];
        }
    }


    public static function deposit($userCode, $amount, $agentSign = null)
    {
        // Persiapkan data untuk dikirimkan
        $postArray = [
            'method' => 'user_deposit',
            'agent_code' => 'ducduc',
            'agent_token' => 'c4648a633d8887d7d4f7bafc3dcfe656',
            'user_code' => $userCode,
            'amount' => (int)$amount
        ];

        try {
            $response = Http::timeout(5)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post('https://api.nexusggr.com', $postArray);

            if ($response->successful()) {
                $data = $response->json();
                if ($data['status'] == 1) {
                    return [
                        'status' => true,
                        'message' => 'Deposit berhasil',
                        'data' => $data
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => $data['msg'] ?? 'Terjadi kesalahan',
                        'data' => null
                    ];
                }
            } else {
                return [
                    'status' => false,
                    'message' => 'Request gagal dengan status: ' . $response->status(),
                    'data' => null
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'data' => null
            ];
        }
    }


    public static function withdraw($userCode, $amount, $agentSign = null)
    {
        $postArray = [
            'method' => 'user_withdraw',
            'agent_code' => 'ducduc',
            'agent_token' => 'c4648a633d8887d7d4f7bafc3dcfe656',
            'user_code' => $userCode,
            'amount' => $amount,
            'agent_sign' => $agentSign ?? uniqid('agent_', true),
        ];

        try {
            $response = Http::timeout(5)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post('https://api.nexusggr.com', $postArray);

            if ($response->successful()) {
                $data = $response->json();
                if ($data['status'] == 1) {
                    return [
                        'status' => true,
                        'message' => 'Penarikan berhasil',
                        'data' => $data
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => $data['msg'] ?? 'Terjadi kesalahan',
                        'data' => null
                    ];
                }
            } else {
                return [
                    'status' => false,
                    'message' => 'Request gagal dengan status: ' . $response->status(),
                    'data' => null
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'data' => null
            ];
        }
    }
}
