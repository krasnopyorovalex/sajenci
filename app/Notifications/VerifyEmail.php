<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;

/**
 * Class VerifyEmail
 * @package App\Notifications
 */
class VerifyEmail extends Notification
{

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)->view(
            'emails.verified', ['verificationUrl' => $verificationUrl]
        );

//        return (new MailMessage)
//                    ->subject('Верификация email-адреса')
//                    ->from('info@sajenci-krym.ru')
//                    ->greeting('Здравствуйте, ' . $notifiable->user->name . '!')
//                    ->line('Подтвердите адрес электронной почты.')
//                    ->action('Подтвердить', $verificationUrl)
//                    ->line('Если Вы не создавали учётную запись, то никаких дальнейших действий не требуется.');
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable): string
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            ['id' => $notifiable->getKey()]
        );
    }
}
