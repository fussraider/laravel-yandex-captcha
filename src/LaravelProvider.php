<?php

namespace Fussraider\YandexCaptcha;

use Fussraider\YandexCaptcha\View\Components\ExtendedYandexCaptchaComponent;
use Fussraider\YandexCaptcha\View\Components\YandexCaptchaComponent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelProvider extends ServiceProvider
{
    public function boot(){

        $this->loadViewsFrom(__DIR__.'/resources/views/components', 'fussraider');

        $this->publishes([
            __DIR__.'/resources/views/components' => resource_path('views/vendor/fussraider'),
        ], 'yandex-captcha-view');

        $this->publishes([
            __DIR__ . "/config/yandex_captcha.php" => config_path('yandex_captcha.php'),
        ], 'yandex-captcha-config');

        Blade::component('yandex-captcha', YandexCaptchaComponent::class);
        Blade::component('extended-yandex-captcha', ExtendedYandexCaptchaComponent::class);
    }

    public function register()
    {
    }
}
