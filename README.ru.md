### Laravel Yandex Captcha

Небольшой пакет, который позволит вам использовать Яндекс SmartCaptcha в вашем Laravel приложении

## Возможности

- Простой в использовании Blade компонент для Яндекс SmartCaptcha
- Простая валидация Яндекс SmartCaptcha

## Установка

Установите fussraider/laravel-yandex-captcha через composer

```bash
  composer require fussraider/laravel-yandex-captcha
```

## Использование

1. Добавьте в ваш .env файл
   `YANDEX_CAPTCHA_CLIENT_KEY`
   `YANDEX_CAPTCHA_SERVER_KEY`

2. Опубликуйте конфигурацию
    ```bash
     php artisan vendor:publish --tag=yandex-captcha-config
    ```
3. Добавьте Blade компонент в форму, которая требует капчу
    ```html
    <form action="{{route('login')}}" method="post">
        @csrf
        <input type="text" name="email">
        <input type="password" name="password">
        <x-yandex-captcha></x-yandex-captcha>
        <button type="submit">Отправить</button>
    </form>
     ```
4. Добавьте правило валидации YandexCaptcha
    ```php
    <?php  
      
    namespace App\Http\Requests;  
      
    use Fussraider\YandexCaptcha\Rules\YandexCaptcha;  
    use Illuminate\Foundation\Http\FormRequest;  
      
    class LoginRequest extends FormRequest  
    {  
      public function rules(): array
      {  
        return [  
          'email' => ['required', 'email'],  
          'password' => ['required', 'string', 'min:8'],  
          'smart-token' => ['required', new YandexCaptcha]  
        ];  
      }
      
      public function authorize(): bool  
      {  
        return true;  
      }  
    }
    ```

Если вы хотите настроить blade компонент, вы можете опубликовать его с помощью

```bash
php artisan vendor:publish --tag=yandex-captcha-view
```

