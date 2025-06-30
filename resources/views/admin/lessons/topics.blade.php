@extends('layouts.admin')
@section('title', $lesson->name . ' Konuları')
@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-4" style="font-size:2.2rem;">{{ $lesson->name }} Konuları</h1>
    <form method="POST" action="{{ route('admin.lessons.topics.add', $lesson->id) }}" class="mb-3 d-flex gap-2">
        @csrf
        <input type="text" name="title" class="form-control" placeholder="Yeni konu başlığı" required>
        <button class="btn btn-primary">Ekle</button>
    </form>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <ul class="list-group">
        @foreach($topics as $topic)
            <li class="list-group-item">{{ $topic->title }}</li>
        @endforeach
    </ul>
</div>
@endsection 