@extends('layouts.admin')

@section('title', 'Dashboard')

@section('styles')
<style>
.stats-circle {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(78, 115, 223, 0.1);
}

.stats-circle.success {
    background: rgba(28, 200, 138, 0.1);
}

.stats-circle.info {
    background: rgba(54, 185, 204, 0.1);
}

.card {
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
}

.btn-light {
    background: #f8f9fc;
    border-color: #e3e6f0;
}

.btn-light:hover {
    background: #e3e6f0;
    border-color: #d1d3e2;
}

.table > :not(caption) > * > * {
    padding: 1rem;
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <p class="mb-0 text-gray-600">Sistem genel durumunu görüntüleyin</p>
        </div>
    </div>

    <!-- İstatistik Kartları -->
    <div class="row g-4 mb-4">
        <!-- Toplam Öğrenci Sayısı -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <div class="stats-circle">
                                <i class="fas fa-users text-primary fa-2x"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-0">Toplam Öğrenci</h6>
                            <h2 class="mb-0">{{ $studentCount }}</h2>
                        </div>
                    </div>
                    <a href="{{ route('admin.students.index') }}" class="btn btn-light btn-sm rounded-pill px-3 shadow-sm w-100">
                        <i class="fas fa-arrow-right me-1"></i>
                        Öğrencileri Görüntüle
                    </a>
                </div>
            </div>
        </div>

        <!-- Toplam Koç Sayısı -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <div class="stats-circle success">
                                <i class="fas fa-user-tie text-success fa-2x"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-0">Toplam Koç</h6>
                            <h2 class="mb-0">{{ $teacherCount }}</h2>
                        </div>
                    </div>
                    <a href="{{ route('admin.coaches.index') }}" class="btn btn-light btn-sm rounded-pill px-3 shadow-sm w-100">
                        <i class="fas fa-arrow-right me-1"></i>
                        Koçları Görüntüle
                    </a>
                </div>
            </div>
        </div>

        <!-- Toplam Kitap Sayısı -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <div class="stats-circle info">
                                <i class="fas fa-book text-info fa-2x"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-0">Toplam Kitap</h6>
                            <h2 class="mb-0">{{ $bookCount }}</h2>
                        </div>
                    </div>
                    <a href="{{ route('admin.books.index') }}" class="btn btn-light btn-sm rounded-pill px-3 shadow-sm w-100">
                        <i class="fas fa-arrow-right me-1"></i>
                        Kitapları Görüntüle
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Ana İçerik -->
    <div class="row g-4">
        <!-- Koçu Olmayan Öğrenciler -->
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                        Koçu Olmayan Öğrenciler
                    </h6>
                </div>
                <div class="card-body p-0">
                    @if($unassignedStudents->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Öğrenci</th>
                                        <th>Email</th>
                                        <th>Kayıt Tarihi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($unassignedStudents as $student)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    {{ $student->name }}
                                                </div>
                                            </td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->created_at->format('d.m.Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-check-circle text-success fa-3x mb-3"></i>
                            <h6 class="text-muted">Tüm öğrencilere koç atanmış!</h6>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 