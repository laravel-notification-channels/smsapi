<?php

namespace NotificationChannels\Smsapi;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use SMSApi\Client;

class SmsapiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(SmsapiChannel::class)
            ->needs(SmsapiClient::class)
            ->give(function () {
                $config = config('smsapi');
                $auth = $config['auth'];
                if ($auth['method'] === 'token') {
                    $client = Client::createFromToken($auth['credentials']['token']);
                } elseif ($auth['method'] === 'password') {
                    $client = new Client($auth['credentials']['username']);
                    $client->setPasswordHash($auth['credentials']['password']);
                }
                $defaults = $config['defaults'] + ['sms' => [], 'mms' => [], 'vms' => []];
                if (! empty($defaults['common'])) {
                    $defaults['common'] = Arr::only($defaults['common'], [
                        'notify_url', 'partner', 'test',
                    ]);
                    $defaults['sms'] = Arr::only($defaults['sms'] + $defaults['common'], [
                        'from', 'fast', 'flash', 'encoding', 'normalize', 'nounicode', 'single',
                    ]);
                    $defaults['mms'] = Arr::only($defaults['mms'] + $defaults['common'], [
                    ]);
                    $defaults['vms'] = Arr::only($defaults['vms'] + $defaults['common'], [
                        'from', 'tries', 'interval', 'tts_lector', 'skip_gsm',
                    ]);
                }
                $defaults = Arr::only($defaults, ['sms', 'mms', 'vms']);
                $defaults = array_map(function (array $defaults) {
                    return array_filter($defaults, function ($value) {
                        return $value !== null;
                    });
                }, $defaults);

                return new SmsapiClient($client, $defaults);
            });

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/smsapi.php' => config_path('smsapi.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/smsapi.php', 'smsapi');
    }
}
