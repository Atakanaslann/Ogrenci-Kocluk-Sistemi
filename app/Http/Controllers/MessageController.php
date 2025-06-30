<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string'
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content
        ]);

        // Gerçek zamanlı bildirim için event tetikleyebiliriz
        // event(new MessageSent($message));

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    public function getMessages($userId)
    {
        $messages = Message::where(function($query) use ($userId) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $userId);
        })->orWhere(function($query) use ($userId) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', Auth::id());
        })->with(['sender', 'receiver'])
          ->orderBy('created_at', 'asc')
          ->get();

        return response()->json([
            'success' => true,
            'messages' => $messages
        ]);
    }

    public function markAsRead($messageId)
    {
        $message = Message::findOrFail($messageId);
        
        if ($message->receiver_id === Auth::id()) {
            $message->update(['is_read' => true]);
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function getUnreadCount()
    {
        $count = Message::where('receiver_id', Auth::id())
                       ->where('is_read', false)
                       ->count();

        return response()->json([
            'success' => true,
            'count' => $count
        ]);
    }
}
