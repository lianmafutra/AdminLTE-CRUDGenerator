<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class TeleNotifJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $to;
    public function __construct($message)
    {
        $this->to = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        for ($i=0; $i < 5; $i++) { 
            $chat_id= '1105999838';
        $bot_token = '1689831164:AAEytCExkIzDriaAo8M6T7-5G2o4MCB81GA';
        $client = new Client();
        $client->getAsync(
            'https://api.telegram.org/bot'.$bot_token.'/sendMessage?chat_id='.$chat_id.'&text='."message : ".$this->to."\n \nTime : ". Carbon::now() . "\nURL : ".url()->current()."\nUser : ".Auth::user()->username . "\nIP Address : ".\Request::ip())->wait() ;       
   
        }
       
    }
}
