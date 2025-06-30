@extends('layouts.admin')

@section('title', 'Mesajlar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Mesajlar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kullanıcı</th>
                                    <th>Rol</th>
                                    <th>Gönderilen Mesaj</th>
                                    <th>Alınan Mesaj</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->role === 'student' ? 'Öğrenci' : 'Koç' }}</td>
                                        <td>{{ $user->sent_messages_count }}</td>
                                        <td>{{ $user->received_messages_count }}</td>
                                        <td>
                                            <a href="{{ route('admin.messages.show', $user) }}" class="btn btn-primary btn-sm">
                                                Mesajları Görüntüle
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Henüz mesaj bulunmuyor.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 