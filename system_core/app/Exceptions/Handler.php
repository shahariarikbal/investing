<?php

namespace App\Exceptions;

use Auth;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
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
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($this->isHttpException($exception)) {
            switch($exception->getStatusCode()) {
                case 400:
                    return response()->view('frontend.errors.400', [], 400);
                    break;
                case 401:
                    return response()->view('frontend.errors.401', [], 401);
                    break;
                case 402:
                    return response()->view('frontend.errors.402', [], 402);
                    break;
                case 403:
                    return response()->view('frontend.errors.403', [], 403);
                    break;
                case 404:
                    return response()->view('frontend.errors.404', [], 404);
                    break;
                case 500:
                    return response()->view('frontend.errors.500', [], 500);
                    break;
                default:
                    return response()->view('frontend.errors.500', [], 500);
            }
        }
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('dashbaord') || $request->is('admin') || $request->is('admin/*')) {
            return redirect('login/admin');
        }
        if ($request->is('member') || $request->is('member/*')) {
            return redirect('login/member');
        }
    }
}
