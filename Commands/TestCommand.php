<?php

namespace Statamic\Addons\StatamicSentryLaravel\Commands;

use Sentry\SentryLaravel\SentryTestCommand;

class TestCommand extends SentryTestCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statamic-sentry-laravel:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verify that statamic-sentry-laravel was installed correctly';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        parent::handle();
    }
}
