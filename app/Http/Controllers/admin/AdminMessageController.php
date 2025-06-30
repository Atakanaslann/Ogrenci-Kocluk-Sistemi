<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    public function index()
    {
        $users = User::whereIn('role', ['student', 'coach'])
            ->withCount(['sentMessages', 'receivedMessages'])
            ->get();
        return view('admin.messages.index', compact('users'));
    }

    public function show(User $user)
    {
        $messages = Message::where(function($query) use ($user) {
            $query->where('sender_id', $user->id)
                  ->orWhere('receiver_id', $user->id);
        })
        ->with(['sender', 'receiver'])
        ->orderBy('created_at', 'asc')
        ->get();

        return view('admin.messages.show', compact('user', 'messages'));
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $user->id,
            'content' => $request->content
        ]);

        return redirect()->back()->with('success', 'Mesaj başarıyla gönderildi.');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->back()->with('success', 'Mesaj başarıyla silindi.');
    }

    public function markAsRead(Message $message)
    {
        $message->update(['read_at' => now()]);
        return response()->json(['message' => 'Mesaj okundu olarak işaretlendi.']);
    }
} 