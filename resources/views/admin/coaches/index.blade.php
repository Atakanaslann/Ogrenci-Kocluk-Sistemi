@extends('layouts.admin')

@section('title', 'Koçlar')

@section('styles')
<style>
/* Ana Container Stilleri */
.container-fluid {
    padding: 2.5rem;
    background: #f8f9fc;
}

/* Kart Grid Stilleri */
.coaches-grid {
    --bs-gutter-x: 2rem;
    --bs-gutter-y: 2rem;
}

/* Kart Stilleri */
.coach-card {
    margin-bottom: 1.5rem;
}

.coach-card .card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: none !important;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 1rem;
    overflow: hidden;
}

.coach-card .card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
}

.coach-card .card-body {
    padding: 1.75rem;
}

/* Avatar Stilleri */
.avatar-circle {
    width: 65px;
    height: 65px;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 600;
    transition: all 0.4s ease;
    box-shadow: 0 5px 15px rgba(106, 17, 203, 0.2);
    border: 3px solid #fff;
    margin-right: 1.25rem;
}

.coach-card .card:hover .avatar-circle {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 8px 20px rgba(106, 17, 203, 0.3);
}

/* Koç Bilgi Stilleri */
.coach-info {
    padding: 0.5rem 0;
}

.coach-info .name {
    font-size: 1.4rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
    letter-spacing: -0.5px;
    line-height: 1.2;
}

.coach-info .email {
    color: #718096;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    opacity: 0.8;
}

.coach-meta {
    color: #718096;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 0.7rem;
    margin: 1.5rem 0;
    padding: 1rem;
    background: rgba(0, 0, 0, 0.03);
    border-radius: 12px;
}

/* Buton Stilleri */
.action-buttons {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-top: 1.75rem;
}

.action-buttons .btn {
    padding: 0.8rem 1.25rem;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.6rem;
    transition: all 0.3s ease;
    font-weight: 500;
    border-width: 2px;
    white-space: nowrap;
}

.action-buttons .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.action-buttons .btn i {
    font-size: 1.1rem;
}

.action-buttons .btn-outline-info {
    color: #2575fc;
    border-color: #2575fc;
}

.action-buttons .btn-outline-info:hover {
    background: #2575fc;
    color: white;
}

.action-buttons .btn-outline-success {
    color: #0acf97;
    border-color: #0acf97;
}

.action-buttons .btn-outline-success:hover {
    background: #0acf97;
    color: white;
}

.action-buttons .btn-outline-primary {
    color: #6a11cb;
    border-color: #6a11cb;
}

.action-buttons .btn-outline-primary:hover {
    background: #6a11cb;
    color: white;
}

.action-buttons .btn-outline-danger {
    color: #fa5c7c;
    border-color: #fa5c7c;
}

.action-buttons .btn-outline-danger:hover {
    background: #fa5c7c;
    color: white;
}

/* Arama Kutusu Stilleri */
.search-container {
    background: white;
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    margin-bottom: 2.5rem;
}

.search-box {
    position: relative;
    max-width: 600px;
    margin: 0 auto;
}

.search-icon {
    position: absolute;
    left: 1.5rem;
    top: 50%;
    transform: translateY(-50%);
    color: #6a11cb;
    font-size: 1.2rem;
}

.search-input {
    padding: 1.2rem 1.5rem 1.2rem 3.5rem;
    border-radius: 50px;
    border: 2px solid rgba(106, 17, 203, 0.1);
    font-size: 1.1rem;
    width: 100%;
    background: white;
    transition: all 0.3s ease;
}

.search-input:focus {
    border-color: #6a11cb;
    box-shadow: 0 0 0 4px rgba(106, 17, 203, 0.1);
}

.search-input::placeholder {
    color: #a0aec0;
    font-weight: 400;
}

.search-count {
    margin-top: 1rem;
    color: #718096;
    font-size: 1.1rem;
}

.search-count span {
    color: #6a11cb;
    font-weight: 600;
}

/* Sayfa Başlığı Stilleri */
.page-header {
    margin-bottom: 2.5rem;
    background: white;
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
}

.page-header h1 {
    font-size: 2.2rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
    letter-spacing: -0.5px;
}

.page-header p {
    color: #718096;
    font-size: 1.1rem;
    margin-bottom: 0;
}

/* Yeni Koç Ekleme Butonu */
.btn-add-coach {
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: white;
    padding: 1rem 2rem;
    font-weight: 600;
    border: none;
    transition: all 0.3s ease;
    font-size: 1.1rem;
}

.btn-add-coach:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(106, 17, 203, 0.3);
    color: white;
}

</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h1>Koçlar</h1>
            <p>Sistem koçlarını yönetin</p>
        </div>
        <a href="{{ route('admin.coaches.create') }}" class="btn btn-add-coach rounded-pill shadow-sm">
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

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Search Bar -->
    <div class="search-container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="searchInput" class="form-control search-input" placeholder="Koç ara... (İsim veya email)">
                </div>
                <div class="text-center search-count">
                    <span id="searchCount">{{ count($coaches) }}</span> koç bulundu
                </div>
            </div>
        </div>
    </div>

    <!-- Koçlar Grid -->
    <div class="row coaches-grid" id="coachesGrid">
        @forelse($coaches as $coach)
        <div class="col-12 col-md-6 col-lg-4 coach-card" data-name="{{ strtolower($coach->name) }}" data-email="{{ strtolower($coach->email) }}">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="avatar-circle">
                            {{ strtoupper(substr($coach->name, 0, 2)) }}
                        </div>
                        <div class="coach-info flex-grow-1">
                            <h5 class="name">{{ $coach->name }}</h5>
                            <div class="email">
                                <i class="fas fa-envelope"></i>
                                {{ $coach->email }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="coach-meta">
                        <i class="fas fa-clock"></i>
                        <span>Kayıt: {{ $coach->created_at->format('d.m.Y H:i') }}</span>
                    </div>

                    <hr class="my-3">

                    <div class="action-buttons">
                        <button type="button" class="btn btn-outline-info rounded-pill" 
                                onclick="openCoachStudentsModal('{{ $coach->id }}', '{{ $coach->name }}')">
                            <i class="fas fa-user-graduate"></i>
                            <span>Öğrenciler</span>
                        </button>
                        <button type="button" class="btn btn-outline-success rounded-pill" 
                                onclick="openAssignStudentModal('{{ $coach->id }}', '{{ $coach->name }}')">
                            <i class="fas fa-user-plus"></i>
                            <span>Öğrenci Ata</span>
                        </button>
                        <a href="{{ route('admin.coaches.edit', $coach->id) }}" class="btn btn-outline-primary rounded-pill">
                            <i class="fas fa-edit"></i>
                            <span>Düzenle</span>
                        </a>
                        <form action="{{ route('admin.coaches.destroy', $coach->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger rounded-pill w-100" 
                                    onclick="return confirm('Bu koçu silmek istediğinizden emin misiniz?')">
                                <i class="fas fa-trash-alt"></i>
                                <span>Sil</span>
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
                        <i class="fas fa-user-tie fa-3x text-muted mb-3"></i>
                        <h5>Henüz Hiç Koç Yok</h5>
                        <p class="text-muted">Sisteme henüz hiç koç eklenmemiş. Yeni koç eklemek için yukarıdaki butonu kullanabilirsiniz.</p>
                        <a href="{{ route('admin.coaches.create') }}" class="btn btn-primary rounded-pill px-4">
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

<!-- Öğrenci Atama Modal -->
<div class="modal fade" id="assignStudentModal" tabindex="-1" aria-labelledby="assignStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="assignStudentModalLabel">Öğrenci Ata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted mb-3">
                    <span id="coachName"></span> adlı koça öğrenci atamak için aşağıdan seçim yapın.
                </p>
                <form id="assignStudentForm" action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="student_id" class="form-label">Öğrenci Seçin</label>
                        <select class="form-select" id="student_id" name="student_id" required>
                            <option value="">Öğrenci seçin...</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check me-1"></i>
                            Ata
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Koç Öğrencileri Modal -->
<div class="modal fade" id="coachStudentsModal" tabindex="-1" aria-labelledby="coachStudentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="coachStudentsModalLabel">Koç Öğrencileri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted mb-3">
                    <span id="coachStudentsName"></span> adlı koçun öğrencileri
                </p>
                
                <div id="coachStudentsList" class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Öğrenci Adı</th>
                                <th>Email</th>
                                <th>Kayıt Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody id="coachStudentsTableBody">
                            <!-- Öğrenciler JavaScript ile doldurulacak -->
                        </tbody>
                    </table>
                </div>
                
                <div id="noStudentsMessage" class="text-center py-4 d-none">
                    <i class="fas fa-user-graduate fa-3x text-muted mb-3"></i>
                    <h5>Henüz Öğrenci Atanmamış</h5>
                    <p class="text-muted">Bu koça henüz hiç öğrenci atanmamış.</p>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const coachCards = document.querySelectorAll('.coach-card');
    const noResults = document.getElementById('noResults');
    const searchCount = document.getElementById('searchCount');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        let visibleCount = 0;

        coachCards.forEach(card => {
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

function openAssignStudentModal(coachId, coachName) {
    document.getElementById('coachName').textContent = coachName;
    document.getElementById('assignStudentForm').action = `/admin/coaches/${coachId}/assign-student`;
    new bootstrap.Modal(document.getElementById('assignStudentModal')).show();
}

function openCoachStudentsModal(coachId, coachName) {
    console.log('Öğrenciler modalı açılıyor:', coachId, coachName);
    document.getElementById('coachStudentsName').textContent = coachName;
    
    // Öğrencileri getir
    fetch(`/admin/coaches/${coachId}/students`, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        credentials: 'same-origin'
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Öğrenciler yüklendi:', data);
        const tableBody = document.getElementById('coachStudentsTableBody');
        const noStudentsMessage = document.getElementById('noStudentsMessage');
        
        if (data.students && data.students.length > 0) {
            tableBody.innerHTML = '';
            noStudentsMessage.classList.add('d-none');
            
            data.students.forEach(student => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${student.name}</td>
                    <td>${student.email}</td>
                    <td>${new Date(student.created_at).toLocaleDateString('tr-TR')}</td>
                    <td>
                        <form action="/admin/coaches/${coachId}/remove-student/${student.id}" method="POST" class="d-inline">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-outline-danger" 
                                    onclick="return confirm('Bu öğrenciyi koçtan kaldırmak istediğinizden emin misiniz?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        } else {
            tableBody.innerHTML = '';
            noStudentsMessage.classList.remove('d-none');
        }
    })
    .catch(error => {
        console.error('Öğrenciler yüklenirken hata oluştu:', error);
        // Hata mesajını gösterme
        const tableBody = document.getElementById('coachStudentsTableBody');
        const noStudentsMessage = document.getElementById('noStudentsMessage');
        tableBody.innerHTML = '';
        noStudentsMessage.classList.remove('d-none');
    });
    
    // Modal'ı aç
    const coachStudentsModal = new bootstrap.Modal(document.getElementById('coachStudentsModal'));
    coachStudentsModal.show();
}
</script>
@endpush
@endsection 