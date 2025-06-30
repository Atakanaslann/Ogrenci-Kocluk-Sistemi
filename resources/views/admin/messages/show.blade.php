@extends('layouts.admin')

@section('title', 'Mesaj Detayları')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $user->name }} ile Mesajlaşma</h6>
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary btn-sm">
                        Geri Dön
                    </a>
                </div>
                <div class="card-body">
                    <div class="chat-messages" style="height: 400px; overflow-y: auto;">
                        @foreach($messages as $message)
                            <div class="message {{ $message->sender_id === auth()->id() ? 'text-right' : 'text-left' }} mb-3">
                                <div class="message-content d-inline-block p-2 rounded {{ $message->sender_id === auth()->id() ? 'bg-primary text-white' : 'bg-light' }}">
                                    <p class="mb-0">{{ $message->content }}</p>
                                    <small class="text-muted">
                                        {{ $message->created_at->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <form action="{{ route('admin.messages.store', $user) }}" method="POST" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="3" placeholder="Mesajınızı yazın..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var chatMessages = document.querySelector('.chat-messages');
    chatMessages.scrollTop = chatMessages.scrollHeight;
});
</script>
@endpush 