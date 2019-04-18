<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        Log::info( 'User Id: '.Auth::id().', Username: '.Auth::user()->name.', Email: '.Auth::user()->email.', IP Address '.request()->ip().', Agent:'.request()->userAgent().' Authenticated.');Log::info( 'User Id: '.Auth::id().', Username: '.Auth::user()->name.', Email: '.Auth::user()->email.', IP Address '.request()->ip().', Agent:'.request()->userAgent().' Successful Login.');
    }
}
