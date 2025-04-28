<?php

namespace Hamada\Laravel_SmsSak;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class SmsSak
{
    protected string $baseUrl;
    protected string $apiKey;
    protected string $projectId;
    protected string $country;

    public function __construct()
    {
        $this->baseUrl = config('smssak.base_url', 'https://smssak.com/api');
        $this->apiKey = config('smssak.api_key');
        $this->projectId = config('smssak.project_id');
        $this->country = config('smssak.country', 'dz');
    }

    public function sendOtp(string $phone): array
    {
        try {
            $response = Http::throw()->post("{$this->baseUrl}/sendotp", [
                'country' => $this->country,
                'phone' => $phone,
                'project_id' => $this->projectId,
                'key' => $this->apiKey,
            ]);

            $json = $response->json();

            return is_array($json) ? $json : [
                'success' => false,
                'message' => 'Invalid response from server.',
            ];
        } catch (RequestException $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function verifyOtp(string $phone, string $otp): array
    {
        try {
            $response = Http::throw()->post("{$this->baseUrl}/verifyotp", [
                'country' => $this->country,
                'phone' => $phone,
                'project_id' => $this->projectId,
                'otp' => $otp,
                'key' => $this->apiKey,
            ]);

            $json = $response->json();

            return is_array($json) ? $json : [
                'success' => false,
                'message' => 'Invalid response from server.',
            ];
        } catch (RequestException $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}
