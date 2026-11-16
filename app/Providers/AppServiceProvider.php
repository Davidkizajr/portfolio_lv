<?php

namespace App\Providers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Mailer\Bridge\Brevo\Transport\BrevoTransportFactory;
use Symfony\Component\Mailer\Transport\Dsn;

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
        if (env("APP_ENV") === "production") {
            URL::forceScheme("https");
        }

        Mail::extend("brevo", function () {
            $config = $this->app["config"]->get("services.brevo", []);

            return (new BrevoTransportFactory())->create(
                new Dsn("brevo+api", "default", $config["key"]),
            );
        });
    }
}
