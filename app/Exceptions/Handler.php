<?php

namespace Meddelivery\Exceptions;

use Mail;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\Debug\ExceptionHandler as SymfonyExceptionHandler;
use Meddelivery\Mail\ExceptionOccured;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Meddelivery\Mail\ExceptionMail;
use Symfony\Component\ErrorHandler\Exception\FlattenException as ExceptionFlattenException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        //    if ($this->shouldReport($exception)) {
        //         $this->sendEmail($exception); // sends an email
        //     }
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }

    // protected function unauthenticated($request, AuthenticationException $exception)
    // {
    //     if ($request->expectsJson()) {
    //         return response()->json(['error' => 'Unauthenticated.'], 401);
    //     }

    //     return redirect()->guest(route('auth.login'));
    // }
    
    public function sendEmail(Throwable $exception)
    {
        try {
            $e = ExceptionFlattenException::create($exception);

            $handler = new SymfonyExceptionHandler();

            $html = $handler->getHtml($e);

            FacadesMail::to('nakatsinho@gmail.com')->send(new ExceptionMail($html));
        } catch (Throwable $ex) {
            dd($ex);
        }
    }
}
