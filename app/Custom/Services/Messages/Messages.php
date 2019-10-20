<?php


namespace App\Custom\Services\Messages;


use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response;

class Messages
{

    public function toTelegram($message)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request(
                'POST',
                'https://music.dll.had.su/api/bot/send-message',
                [
                    'json' => ["message" => $message],
                ]);

            if ($response->getStatusCode() == 200) {
                return response('Message delivered', Response::HTTP_OK);
            }
        } catch (GuzzleException $e) {
            $e->getMessage();
        }

        return response('Error', Response::HTTP_NOT_FOUND);
    }
}
