<?php

namespace Hamada\Laravel_SmsSak;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class SmsSak
{
    protected string $sendOtpUrl;
    protected string $verifyOtpUrl;

    protected string $apiKey;
    protected string $projectId;
    protected string $country;

    public function __construct()
    {
        $this->sendOtpUrl    = config('smssak.send_otp_url', 'https://sendotp-47lvvvrp4a-uc.a.run.app');
        $this->verifyOtpUrl  = config('smssak.verify_otp_url', 'https://verifyotp-47lvvvrp4a-uc.a.run.app');
        $this->apiKey        = config('smssak.api_key');
        $this->projectId     = config('smssak.project_id');
        $this->country       = config('smssak.country', 'dz');
    }

    /**
     *  Send Otp.
     */
    public function sendOtp(string $phone): array
    {
        try {
            $response = Http::withHeaders([
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'key'           => $this->apiKey,
            ])->post($this->sendOtpUrl, [
                'country'   => $this->country,
                'phone'     => $phone,
                'projectId' => $this->projectId,
            ]);

            $json = $response->json();

            if (isset($json['success']) && $json['success'] === 'SMS sent successfully.') {
                return [
                    'success' => true,
                    'message' => 'SMS envoyé avec succès.',
                ];
            }

            return [
                'success' => false,
                'message' => $json['error'] ?? 'Erreur inconnue lors de l’envoi du SMS.',
            ];
        } catch (RequestException $e) {
            return [
                'success' => false,
                'message' => 'Erreur de connexion : ' . $e->getMessage(),
            ];
        }
    }

    /**
     * verify OTP.
     */
    public function verifyOtp(string $phone, string $otp): array
    {
        try {
            $response = Http::withHeaders([
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'key'           => $this->apiKey,
            ])->post($this->verifyOtpUrl, [
                'country'   => $this->country,
                'phone'     => $phone,
                'projectId' => $this->projectId,
                'otp'       => $otp,
            ]);

            $json = $response->json();

            if (isset($json['success']) && $json['success'] === 'OTP verified successfully.') {
                return [
                    'success' => true,
                    'message' => 'OTP vérifié avec succès.',
                ];
            }

            return [
                'success' => false,
                'message' => $json['error'] ?? 'Échec de la vérification.',
            ];
        } catch (RequestException $e) {
            return [
                'success' => false,
                'message' => 'Erreur de connexion : ' . $e->getMessage(),
            ];
        }
    }
}
