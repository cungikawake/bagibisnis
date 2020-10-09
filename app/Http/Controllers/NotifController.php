<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SendGlobalNotification;

class NotifController extends Controller
{ 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($name)
    {
        event(new SendGlobalNotification($name));
        return "Event has been sent!";
    }
}
