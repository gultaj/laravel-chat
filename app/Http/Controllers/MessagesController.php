<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
        $message = $request->user()->messages()->create([
            'title' => $request->message
        ]);

        return response(['status' => 'OK', 'data' => $message]);
    }

    public function show(Request $request)
    {
        return Message::all();
    }
}
