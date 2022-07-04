<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GhasedakChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSMS($notifiable);

        $response = Http::withHeaders([
            'apiKey' => env('GHASEDAK_API_KEY')
        ])->post(env('GHASEDAK_BASE_URL') . 'sms/send/simple', [
            'receptor' => $notifiable->phone,
            'message' => $message,
        ]);

        Log::info(json_encode($response));
    }
}
