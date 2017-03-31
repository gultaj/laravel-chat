<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::with('user')->get();
        return response(['status' => 'OK', 'messages' => $messages]);
    }

    public function store(Request $request)
    {
        $message = $request->user()->messages()->create([
            'title' => $request->message
        ]);
        $message->user = $request->user();

        return response(['status' => 'OK', 'message' => $message]);
    }

    public function show(Request $request)
    {
        return Message::all();
    }
}
