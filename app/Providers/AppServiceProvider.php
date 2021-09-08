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
                Lang::get("Moment!.").'<br>' .'<strong>'. Lang::get("Un abrazo") . '</strong>'));

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

        /* ResetPassword::$toMailCallback = function($notifiable, $url){
            return (new MailMessage)
            ->subject(Lang::get('Solicitud de restablecimiento de contraseña'))
            ->line(Lang::get('Hola, se solicitó un restablecimiento de contraseña para tu cuenta ' . $notifiable->getEmailForPasswordReset() . ', haz clic en el botón que aparece a continuación para cambiar tu contraseña.'))
            ->action(Lang::get('Cambiar contraseña'), $url = url(route('password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false)))
            ->line(Lang::get('Si tu no realizaste la solicitud de cambio de contraseña, solo ignora este mensaje. '))
            ->line(Lang::get('Este enlace solo es válido dentro de los proximos :count minutos.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
            ->salutation(new HtmlString(
                Lang::get("Momment!.").'<br>' .'<strong>'. Lang::get("Proyecto") . '</strong>'));

        }; */


        Blade::directive('routeIs', function ($expression) {
            return "<?php if(Request::url() == route($expression)): ?>";
        });
    }
}
