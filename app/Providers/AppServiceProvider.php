<?php

namespace App\Providers;

use HotwiredLaravel\TurboLaravel\Facades\Turbo;
use HotwiredLaravel\TurboLaravel\Http\PendingTurboStreamResponse;
use Illuminate\Support\ServiceProvider;

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
        Turbo::usePartialsSubfolderPattern();
        PendingTurboStreamResponse::macro('flash', function ($message) {
            return $this->append('notifications', view('layouts.partials.notice', ['message' => $message]));
        });
    }
}
