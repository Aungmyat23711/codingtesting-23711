<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Message;

class MessageController extends Controller
{
    public function send(Request $req)
    {
        event(new Message($req->username, $req->message));
        return response(['message' => 'success']);
    }
}
