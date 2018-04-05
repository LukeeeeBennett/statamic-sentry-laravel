<?php

namespace Statamic\Addons\StatamicSentryLaravel;

use Statamic\Extend\ServiceProvider;
use Statamic\Exceptions\Handler;
use Sentry\SentryLaravel\SentryLaravelServiceProvider;
use Sentry\SentryLaravel\SentryFacade;

class StatamicSentryLaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->isEnabled()) return;

        parent::boot();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $dsn = $this->getConfig('dsn', null);

        if (!$dsn || !$this->isEnabled()) return;

        config([
            'sentry.dsn' => $dsn,
        ]);

        $this->app->register(SentryLaravelServiceProvider::class);
        $this->app->alias('Sentry', SentryFacade::class);

        $this->app->singleton(Handler::class, ExceptionHandler::class);
    
        parent::register();
    }

    /**
     * Check if is enabled.
     *
     * @return bool
     */
    private function isEnabled()
    {
        return $this->getConfigBool('enable', false);
    }
}
