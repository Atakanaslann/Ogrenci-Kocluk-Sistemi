<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function getCoaches()
    {
        $coaches = User::where('role', 'coach')->get();
        
        return response()->json([
            'success' => true,
            'coaches' => $coaches
        ]);
    }

    public function getCoach()
    {
        // Giriş yapan kullanıcı öğrenci ise ona atanmış koçu bul
        $user = Auth::user();
        if ($user->role === 'student') {
            $coach = $user->coaches()->first();
        } else if ($user->role === 'coach') {
            // Koç kendi panelinden bakıyorsa kendisini döndür
            $coach = $user;
        } else {
            $coach = null;
        }

        if (!$coach) {
            return response()->json([
                'success' => false,
                'message' => 'Koç bulunamadı.'
            ]);
        }

        return response()->json([
            'success' => true,
            'coach' => $coach
        ]);
    }

    public function history(User $user)
    {
        // Mesajları tarihe göre sırala
        $messages = Message::where(function($query) use ($user) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $user->id);
        })->orWhere(function($query) use ($user) {
            $query->where('sender_id', $user->id)
                  ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        // Okunmamış mesajları okundu olarak işaretle
        foreach ($messages as $message) {
            if (!$message->is_read && $message->receiver_id === Auth::id()) {
                $message->update(['is_read' => true]);
            }
        }

        return response()->json([
            'success' => true,
            'messages' => $messages
        ]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'receiver_id' => 'required|exists:users,id'
        ]);

        // Mesajı oluştur
        $message = Message::create([
            'content' => $request->content,
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'is_read' => false
        ]);

        // Mesajı ilişkili kullanıcı bilgileriyle birlikte getir
        $message->load(['sender', 'receiver']);

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    public function markAsRead(Message $message)
    {
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