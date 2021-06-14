<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\MessageSentNotification;
use App\User;
use App\Message;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();

        return view('home', compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'recipient_id' => 'required|exists:users,id',

        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $request->recipient_id,
            'body' => $request->body
        ]);

        $recipient = User::findOrFail($request->recipient_id);

        $recipient->notify(new MessageSentNotification($message));

        return back()->with('flash', 'Your message has been sent');
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);

        return view('messages.show', compact('message'));
    }
}
