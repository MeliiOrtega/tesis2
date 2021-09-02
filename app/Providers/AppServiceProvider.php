<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\Lesson;
use App\Models\Review;
use App\Observers\LessonObserver;
use App\Observers\ReviewObserver;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\HtmlString;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Lesson::observe(LessonObserver::class);
        Review::observe(ReviewObserver::class);

        VerifyEmail::$toMailCallback = function($notifiable, $verificationUrl){
            return (new MailMessage)
            ->subject(Lang::get('Verificación de correo electronico'))
            ->greeting(Lang::get("Hola ") . $notifiable->name)
            ->line(Lang::get('Da click en el boton para verificar tu correo'))
            ->action(Lang::get('Verificar correo'), $verificationUrl)
            ->line(Lang::get('Si no creó una cuenta, no es necesario realizar ninguna otra acción..'))
            ->salutation(new HtmlString(
                Lang::get("Momment!.").'<br>' .'<strong>'. Lang::get("Proyecto") . '</strong>'));

        };

        VerifyEmail::$createUrlCallback = function($notifiable){
            return URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );

        };

        ResetPassword::$toMailCallback = function($notifiable, $resetUrl){
            return (new MailMessage)
            ->subject(Lang::get('Notificación para resetear contraseña'))
            ->greeting(Lang::get("Hola ") . $notifiable->name)
            ->line(Lang::get('Estás recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para tu cuenta..'))
            ->action(Lang::get('Resetear Contraseña'), $resetUrl)
            ->line(Lang::get('Este enlace de restablecimiento de contraseña caducará en :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('Si no solicitó un restablecimiento de contraseña, no es necesario realizar ninguna otra acción.'))
            ->salutation(new HtmlString(
                Lang::get("Momment!.").'<br>' .'<strong>'. Lang::get("Proyecto") . '</strong>'));

        };

        Blade::directive('routeIs', function ($expression) {
            return "<?php if(Request::url() == route($expression)): ?>";
        });
    }
}
