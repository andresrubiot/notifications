<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsController extends Controller
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

    public function index()
    {
        $unreadNotifications = auth()->user()->unreadNotifications;
        $readNotifications = auth()->user()->readNotifications;

        return view('notifications.index', compact('unreadNotifications', 'readNotifications'));
    }

    public function read($id)
    {
        DatabaseNotification::findOrFail($id)->markAsRead();

        return back()->with('flash', 'Notification marked as read');
    }
}
