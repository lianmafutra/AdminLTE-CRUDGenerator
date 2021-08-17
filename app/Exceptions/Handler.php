<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Exception;
use Mail;
use Illuminate\Auth\AuthenticationException;
use Auth;
use GuzzleHttp\Psr7\Request as Req;
use GuzzleHttp\Client;

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
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
        // parent::report($exception);
        // $client  = new Client();
        // $url = "https://api.telegram.org/bot".env("BOTTELEGRAM","1689831164:AAEytCExkIzDriaAo8M6T7-5G2o4MCB81GA")."/sendMessage";//<== ganti jadi token yang kita tadi
        // $data    = $client->request('GET', $url, [
        //     'json' =>[
        //       "chat_id" => env("BOTTELEGRAM_CHATID","1105999838"), //<== ganti dengan id_message yang kita dapat tadi
        //       "text" => "File : ".$exception->getFile()."\nLine : ".$exception->getLine()."\nCode : ".$exception->getCode()."\nMessage : ".$exception->getMessage(),"disable_notification" => true
        //     ]
        // ]);

        // $json = $data->getBody();
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // // Handle jika route tidak ditemukan akan dilempar ke page 404
        // if ($exception instanceof NotFoundHttpException) {
        //     return redirect('/NotFound');
        // }

        // return parent::render($request, $exception);
        return parent::render($request, $exception);
    }
}
