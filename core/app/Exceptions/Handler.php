<?php

namespace App\Exceptions;

use Mail;
use Throwable;
use App\Mail\ExceptionOccured;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array>

     */
    protected $dontReport = [

    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array

     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            $this->sendEmail($e);
        });
    }

    /**
     * Write code on Method
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application()
     */
    public function sendEmail(Throwable $exception)
    {
        try {

            $message = $content['message'] = $exception->getMessage();
            $file = $content['file'] = $exception->getFile();
            $line = $content['line'] = $exception->getLine();
            $trace = $content['trace'] = $exception->getTrace();

            $url = $content['url'] = request()->url();
            $body = $content['body'] = request()->all();
            $ip = $content['ip'] = request()->ip();

            $message2 = "Error Message on ACE LOG";
            $message = $message2. "\n\nMessage========>" . $message . "\n\nLine========>" . $line . "\n\nFile========>" . $file . "\n\nURL========>" . $url . "\n\nIP========> " . $ip;

            //$message = "Error Message on ENKPAY APP";
            send_notification($message);
            send_notification2($message);


            return view('errors.500');




        } catch (Throwable $exception) {
            Log::error($exception);
        }
    }


//    public function render($request, Throwable $exception)
//    {
//        if ($this->isHttpException($exception)) {
//            switch ($exception->getStatusCode()) {
//                case 404:
//                    return response()->view('errors.404', [], 404);
//                case 500:
//                    return response()->view('errors.500', [], 500);
//            }
//        }
//
//        return parent::render($request, $exception);
//    }
}
