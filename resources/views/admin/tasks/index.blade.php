@extends('layouts.admin')

@section('title', 'Görevler')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Görev Listesi</h6>
                    <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Yeni Görev
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Başlık</th>
                                    <th>Öğrenci</th>
                                    <th>Koç</th>
                                    <th>Son Tarih</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->student->name }}</td>
                                        <td>{{ $task->coach->name }}</td>
                                        <td>{{ $task->due_date->format('d.m.Y') }}</td>
                                        <td>
                                            @if($task->completed)
                                                <span class="badge bg-success">Tamamlandı</span>
                                            @else
                                                <span class="badge bg-warning">Devam Ediyor</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.tasks.edit', $task) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.tasks.destroy', $task) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bu görevi silmek istediğinizden emin misiniz?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Henüz görev eklenmemiş.</td>
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