<?php

namespace App\Providers;

use App\Models\Alert;
use App\Models\Movie;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Date;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $films = Movie::latest()->get();
        // Recuperar todas las alertas
        $alerts = Alert::whereDate('expires_at', '>', Date::now())
            ->orderBy('created_at', 'desc')
            ->get();
        view()->share('films', $films);
        view()->share('alerts', $alerts);
        VerifyEmail::$toMailCallback = function ($notifiable, $verificationUrl) {
            return (new MailMessage)
                ->subject('Welcome to LaraFlix - Verify Your Email')
                ->line('Thanks for signing up for LaraFlix! Please click the button below to verify your email address and start exploring our platform.')
                ->action('Verify Email Address', $verificationUrl)
                ->line('If you did not create an account on LaraFlix, you can ignore this email.');
        };
    }

}
