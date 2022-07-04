<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class KaveNegarChannel
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

        $response = Http::post(env('KAVENEGAR_BASE_URL') . 'sms/send.json', [
            'receptor' => $notifiable->phone,
            'message' => $message,
        ]);

        Log::info(json_encode($response));
    }
}
