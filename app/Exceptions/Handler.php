<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {

        if ($exception instanceof HttpException) {

            $code = $exception->getStatusCode();

            if ($exception instanceof ServiceUnavailableHttpException) {
                $message = "MAINTAINANCE IN PROGRESS";
                $desc = "Server is currently under maintainance - please come back again later.";
            } elseif ($exception instanceof AccessDeniedHttpException){
                $message = "ACCESS DENIED!";
                $desc = "You have not enough right to access the requested page.";
            } elseif ($exception instanceof NotFoundHttpException) {
                $message = "PAGE NOT FOUND!";
                $desc = "The page you are looking for does not exist or has been moved.";
            } else {
                $message = "ERROR OCCURED";
                $desc = "An error has occured. Please report to the administrator for immediate action.";
            }

            $data = compact("code", "message", "desc");
            return response (view("errors.layout", $data), $code);
        }

        return parent::render($request, $exception);
    }
}
