@extends('layouts.admin')

@section('title', 'Koçlar')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Koçlar</h1>
            <p class="mb-0 text-gray-600">Sistem koçlarını yönetin</p>
        </div>
        <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
            <i class="fas fa-plus-circle me-2"></i>Yeni Koç Ekle
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Search Bar -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="searchInput" class="form-control search-input" placeholder="Koç ara... (İsim veya email)">
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="text-muted mb-0 text-md-end small">
                        <span id="searchCount">{{ count($teachers) }}</span> koç bulundu
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Koçlar Grid -->
    <div class="row g-4" id="teachersGrid">
        @forelse($teachers as $teacher)
        <div class="col-12 col-md-6 col-lg-4 teacher-card" data-name="{{ strtolower($teacher->name) }}" data-email="{{ strtolower($teacher->email) }}">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <div class="avatar-circle">
                                {{ strtoupper(substr($teacher->name, 0, 2)) }}
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="card-title mb-0">{{ $teacher->name }}</h5>
                            <p class="card-text text-muted small mb-0">
                                <i class="fas fa-envelope me-1"></i>
                                {{ $teacher->email }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-muted small mb-3">
                        <i class="fas fa-clock me-2"></i>
                        Kayıt: {{ $teacher->created_at->format('d.m.Y H:i') }}
                    </div>
                    <hr class="my-3">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                            <i class="fas fa-edit me-1"></i>
                            Düzenle
                        </a>
                        <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3" 
                                    onclick="return confirm('Bu koçu silmek istediğinizden emin misiniz?')">
                                <i class="fas fa-trash-alt me-1"></i>
                                Sil
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5 text-center">
                    <div class="empty-state">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <h5>Henüz Hiç Koç Yok</h5>
                        <p class="text-muted">Sisteme henüz hiç koç eklenmemiş. Yeni koç eklemek için yukarıdaki butonu kullanabilirsiniz.</p>
                        <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary rounded-pill px-4">
                            <i class="fas fa-plus-circle me-2"></i>Yeni Koç Ekle
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforelse

        <!-- No Results Message -->
        <div class="col-12 d-none" id="noResults">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5 text-center">
                    <div class="empty-state">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h5>Sonuç Bulunamadı</h5>
                        <p class="text-muted">Aramanızla eşleşen koç bulunamadı. Lütfen farklı bir arama terimi deneyin.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-circle {
    width: 48px;
    height: 48px;
    background-color: #4e73df;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.2rem;
}

.empty-state {
    max-width: 450px;
    margin: 0 auto;
}

.card {
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
}

.btn-outline-primary, .btn-outline-danger {
    border-width: 2px;
}

.btn-outline-primary:hover, .btn-outline-danger:hover {
    transform: translateY(-2px);
}

.search-box {
    position: relative;
}

.search-icon {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #858796;
}

.search-input {
    padding-left: 45px;
    padding-right: 45px;
    border-radius: 50px;
    border: 2px solid #e3e6f0;
    transition: all 0.2s ease-in-out;
}

.search-input:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.1);
}

.search-input::placeholder {
    color: #858796;
    opacity: 0.6;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const teacherCards = document.querySelectorAll('.teacher-card');
    const noResults = document.getElementById('noResults');
    const searchCount = document.getElementById('searchCount');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        let visibleCount = 0;

        teacherCards.forEach(card => {
            const name = card.dataset.name;
            const email = card.dataset.email;
            const isVisible = name.includes(searchTerm) || email.includes(searchTerm);
            
            card.classList.toggle('d-none', !isVisible);
            if (isVisible) visibleCount++;
        });

        // Update counter
        searchCount.textContent = visibleCount;

        // Toggle no results message
        noResults.classList.toggle('d-none', visibleCount > 0);
    });
});
</script>
@endsection 