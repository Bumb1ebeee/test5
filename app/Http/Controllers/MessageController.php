<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::whereNot('status','insult')->orderBy('created_at', 'desc')->get();

        return view('message', compact('messages'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'text' => 'required',
        ]);

        $message = new Message();
        $message->text = $request->input('text');
        $message->user_id = Auth::id();
        $message->save();

        return redirect()->back();
    }

    public function insult(Request $request){
        $validated = $request->validate([
            'id' => 'required'
        ]);

        $message = Message::where('id', $request->input('id'))->first();

        $message->status = 'insult';
        $message->save();

        return redirect()->back();
    }

    public function notInsult(Request $request){
        $validated = $request->validate([
            'id' => 'required'
        ]);

        $message = Message::where('id', $request->input('id'))->first();

        $message->status = 'notInsult';
        $message->save();

        return redirect()->back();
    }

    public function delete(Request $request){
        $validated = $request->validate([
            'id' => 'required'
        ]);

        $message = Message::where('id', $request->input('id'))->first();

        $message->status = 'notInsult';
        $message->save();

        return redirect()->back();
    }
}
