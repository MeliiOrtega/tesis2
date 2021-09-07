<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as NotificationsResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\HtmlString;
class ResetPassword extends NotificationsResetPassword
{


    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(Lang::get('Solicitud de restablecimiento de contraseña'))
            ->greeting(Lang::get("Hola ") . $notifiable->name)
            ->line(Lang::get('Hola, se solicitó un restablecimiento de contraseña para tu cuenta ' . $notifiable->getEmailForPasswordReset() . ', haz clic en el botón que aparece a continuación para cambiar tu contraseña.'))
            ->action(Lang::get('Cambiar contraseña'), url(route('password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false)))
            ->line(Lang::get('Si tu no realizaste la solicitud de cambio de contraseña, solo ignora este mensaje. '))
            ->line(Lang::get('Este enlace solo es válido dentro de los proximos :count minutos.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
            ->salutation(new HtmlString(
                Lang::get("Moment!.").'<br>' .'<strong>'. Lang::get("Un abrazo") . '</strong>'));;
    }




}
