@extends('layouts.admin')

@section('title', 'Öğrenciler')

@section('styles')
<style>
/* Ana Container Stilleri */
.container-fluid {
    padding: 2.5rem;
    background: #f8f9fc;
}

/* Kart Grid Stilleri */
.students-grid {
    --bs-gutter-x: 2rem;
    --bs-gutter-y: 2rem;
}

/* Kart Stilleri */
.student-card {
    margin-bottom: 1.5rem;
}

.student-card .card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: none !important;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 1rem;
    overflow: hidden;
}

.student-card .card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
}

.student-card .card-body {
    padding: 1.75rem;
}

/* Avatar Stilleri */
.avatar-circle {
    width: 65px;
    height: 65px;
    background: linear-gradient(135deg, #00b09b, #96c93d);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 600;
    transition: all 0.4s ease;
    box-shadow: 0 5px 15px rgba(0, 176, 155, 0.2);
    border: 3px solid #fff;
    margin-right: 1.25rem;
}

.student-card .card:hover .avatar-circle {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 8px 20px rgba(0, 176, 155, 0.3);
}

/* Öğrenci Bilgi Stilleri */
.student-info {
    padding: 0.5rem 0;
}

.student-info .name {
    font-size: 1.4rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
    letter-spacing: -0.5px;
    line-height: 1.2;
}

.student-info .email {
    color: #718096;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    opacity: 0.8;
}

.student-meta {
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
    color: #00b09b;
    border-color: #00b09b;
}

.action-buttons .btn-outline-info:hover {
    background: #00b09b;
    color: white;
}

.action-buttons .btn-outline-success {
    color: #96c93d;
    border-color: #96c93d;
}

.action-buttons .btn-outline-success:hover {
    background: #96c93d;
    color: white;
}

.action-buttons .btn-outline-primary {
    color: #00b09b;
    border-color: #00b09b;
}

.action-buttons .btn-outline-primary:hover {
    background: #00b09b;
    color: white;
}

.action-buttons .btn-outline-danger {
    color: #ff6b6b;
    border-color: #ff6b6b;
}

.action-buttons .btn-outline-danger:hover {
    background: #ff6b6b;
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
    color: #00b09b;
    font-size: 1.2rem;
}

.search-input {
    padding: 1.2rem 1.5rem 1.2rem 3.5rem;
    border-radius: 50px;
    border: 2px solid rgba(0, 176, 155, 0.1);
    font-size: 1.1rem;
    width: 100%;
    background: white;
    transition: all 0.3s ease;
}

.search-input:focus {
    border-color: #00b09b;
    box-shadow: 0 0 0 4px rgba(0, 176, 155, 0.1);
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
    color: #00b09b;
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

/* Yeni Öğrenci Ekleme Butonu */
.btn-add-student {
    background: linear-gradient(135deg, #00b09b, #96c93d);
    color: white;
    padding: 1rem 2rem;
    font-weight: 600;
    border: none;
    transition: all 0.3s ease;
    font-size: 1.1rem;
}

.btn-add-student:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 176, 155, 0.3);
    color: white;
}

</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h1>Öğrenciler</h1>
            <p>Sistem öğrencilerini yönetin</p>
        </div>
        <a href="{{ route('admin.students.create') }}" class="btn btn-add-student rounded-pill shadow-sm">
            <i class="fas fa-plus-circle me-2"></i>Yeni Öğrenci Ekle
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
                    <input type="text" id="searchInput" class="form-control search-input" placeholder="Öğrenci ara... (İsim veya email)">
                </div>
                <div class="text-center search-count">
                    <span id="searchCount">{{ count($students) }}</span> öğrenci bulundu
                </div>
            </div>
        </div>
    </div>

    <!-- Öğrenciler Grid -->
    <div class="row students-grid" id="studentsGrid">
        @forelse($students as $student)
        <div class="col-12 col-md-6 col-lg-4 student-card" data-name="{{ strtolower($student->name) }}" data-email="{{ strtolower($student->email) }}">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="student-info flex-grow-1">
                            <h5 class="name">{{ $student->name }}</h5>
                            <div class="email">
                                <i class="fas fa-envelope"></i>
                                {{ $student->email }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="student-meta">
                        <i class="fas fa-clock"></i>
                        <span>Kayıt: {{ $student->created_at->format('d.m.Y H:i') }}</span>
                    </div>

                    <hr class="my-3">

                    <div class="action-buttons">
                        <button type="button" class="btn btn-outline-info rounded-pill" 
                                onclick="openStudentBooksModal('{{ $student->id }}', '{{ $student->name }}')">
                            <i class="fas fa-book-reader"></i>
                            <span>Kitaplar</span>
                        </button>
                        <button type="button" class="btn btn-outline-success rounded-pill" 
                                onclick="openAssignBookModal('{{ $student->id }}', '{{ $student->name }}')">
                            <i class="fas fa-book"></i>
                            <span>Kitap Ata</span>
                        </button>
                        <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-outline-primary rounded-pill">
                            <i class="fas fa-edit"></i>
                            <span>Düzenle</span>
                        </a>
                        <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger rounded-pill w-100" 
                                    onclick="return confirm('Bu öğrenciyi silmek istediğinizden emin misiniz?')">
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
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <h5>Henüz Hiç Öğrenci Yok</h5>
                        <p class="text-muted">Sisteme henüz hiç öğrenci eklenmemiş. Yeni öğrenci eklemek için yukarıdaki butonu kullanabilirsiniz.</p>
                        <a href="{{ route('admin.students.create') }}" class="btn btn-add-student rounded-pill px-4">
                            <i class="fas fa-plus-circle me-2"></i>Yeni Öğrenci Ekle
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
                        <p class="text-muted">Aramanızla eşleşen öğrenci bulunamadı. Lütfen farklı bir arama terimi deneyin.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Kitap Atama Modal -->
<div class="modal fade" id="assignBookModal" tabindex="-1" aria-labelledby="assignBookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="assignBookModalLabel">Kitap Ata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted mb-3">
                    <span id="studentName"></span> adlı öğrenciye kitap atamak için aşağıdan seçim yapın.
                </p>
                <form id="assignBookForm" action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="book_id" class="form-label">Kitap Seçin</label>
                        <select class="form-select" id="book_id" name="book_id" required>
                            <option value="">Kitap seçin...</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}">{{ $book->name }} - {{ $book->publisher }}</option>
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

<!-- Öğrenci Kitapları Modal -->
<div class="modal fade" id="studentBooksModal" tabindex="-1" aria-labelledby="studentBooksModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="studentBooksModalLabel">Öğrenci Kitapları</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted mb-3">
                    <span id="studentBooksName"></span> adlı öğrencinin kitapları
                </p>
                
                <div id="studentBooksList" class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Kitap Adı</th>
                                <th>Yayınevi</th>
                                <th>Ders</th>
                                <th>Sınıf</th>
                                <th>Atanma Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody id="studentBooksTableBody">
                            <!-- Kitaplar JavaScript ile doldurulacak -->
                        </tbody>
                    </table>
                </div>
                
                <div id="noBooksMessage" class="text-center py-4 d-none">
                    <i class="fas fa-book fa-3x text-muted mb-3"></i>
                    <h5>Henüz Kitap Atanmamış</h5>
                    <p class="text-muted">Bu öğrenciye henüz hiç kitap atanmamış.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const studentCards = document.querySelectorAll('.student-card');
    const noResults = document.getElementById('noResults');
    const searchCount = document.getElementById('searchCount');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        let visibleCount = 0;

        studentCards.forEach(card => {
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

function openAssignBookModal(studentId, studentName) {
    document.getElementById('studentName').textContent = studentName;
    document.getElementById('assignBookForm').action = `/admin/students/${studentId}/assign-book`;
    new bootstrap.Modal(document.getElementById('assignBookModal')).show();
}

function openStudentBooksModal(studentId, studentName) {
    console.log('Kitaplar modalı açılıyor:', studentId, studentName);
    document.getElementById('studentBooksName').textContent = studentName;
    
    // Kitapları getir
    fetch(`/admin/students/${studentId}/books`, {
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
        console.log('Kitaplar yüklendi:', data);
        const tableBody = document.getElementById('studentBooksTableBody');
        const noBooksMessage = document.getElementById('noBooksMessage');
        
        if (data.books && data.books.length > 0) {
            tableBody.innerHTML = '';
            noBooksMessage.classList.add('d-none');
            
            data.books.forEach(book => {
                const row = document.createElement('tr');
                const assignmentDate = book.pivot ? new Date(book.pivot.created_at) : new Date(book.created_at);
                row.innerHTML = `
                    <td>${book.name}</td>
                    <td>${book.publisher}</td>
                    <td>${book.subject}</td>
                    <td>${book.grade}</td>
                    <td>${assignmentDate.toLocaleDateString('tr-TR')}</td>
                    <td>
                        <form action="/admin/students/${studentId}/remove-book/${book.id}" method="POST" class="d-inline">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-outline-danger" 
                                    onclick="return confirm('Bu kitabı öğrenciden kaldırmak istediğinizden emin misiniz?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        } else {
            tableBody.innerHTML = '';
            noBooksMessage.classList.remove('d-none');
        }
    })
    .catch(error => {
        console.error('Kitaplar yüklenirken hata oluştu:', error);
        // Hata mesajını gösterme
        const tableBody = document.getElementById('studentBooksTableBody');
        const noBooksMessage = document.getElementById('noBooksMessage');
        tableBody.innerHTML = '';
        noBooksMessage.classList.remove('d-none');
    });
    
    // Modal'ı aç
    const studentBooksModal = new bootstrap.Modal(document.getElementById('studentBooksModal'));
    studentBooksModal.show();
}
</script>
@endsection 