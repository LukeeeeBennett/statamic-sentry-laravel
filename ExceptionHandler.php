<?php

namespace Statamic\Addons\StatamicSentryLaravel;

use Statamic\Exceptions\Handler;

class ExceptionHandler extends Handler
{
    /**
     * Report to sentry.
     *
     * @param  Exception  $exception
     */
    public function report(Exception $exception)
    {
        if (app()->bound('sentry')) app('sentry')->captureException($exception);

        parent::report($exception);
    }
}