@extends('layouts.admin')

@section('title', 'Kitaplar')

@section('content')
<div class="container-fluid p-4">
    <!-- Başlık ve Yeni Kitap Butonu -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 text-dark mb-1">Kitaplar</h1>
            <p class="text-muted">Sistemdeki tüm kitapları yönetin</p>
        </div>
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Yeni Kitap
        </a>
    </div>

    <!-- Başarı Mesajı -->
    @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!-- Arama ve Filtreleme -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6 col-lg-4">
                    <div class="search-wrapper">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" class="form-control" placeholder="Kitap veya yazar ara...">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <select id="subjectFilter" class="form-select">
                        <option value="">Tüm Dersler</option>
                        @foreach(App\Models\Book::SUBJECTS as $key => $subject)
                            <option value="{{ $key }}">{{ $subject }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Kitap Listesi -->
    <div class="row g-4" id="booksGrid">
        @forelse($books as $book)
        <div class="col-md-6 col-lg-4 book-card" 
             data-name="{{ strtolower($book->name) }}" 
             data-author="{{ strtolower($book->author) }}"
             data-subject="{{ $book->subject }}">
            <div class="book-item">
                <div class="book-cover">
                    <div class="book-icon">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
                <div class="book-details">
                    <h5 class="book-title">{{ $book->name }}</h5>
                    <p class="book-author">{{ $book->author }}</p>
                    <div class="book-meta">
                        <span class="badge">{{ App\Models\Book::SUBJECTS[$book->subject] }}</span>
                        <span class="publisher">{{ $book->publisher }}</span>
                    </div>
                    <p class="book-description">{{ Str::limit($book->description, 100) }}</p>
                    <div class="book-actions">
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-light btn-sm">
                            <i class="fas fa-edit"></i>
                            <span>Düzenle</span>
                        </a>
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Bu kitabı silmek istediğinizden emin misiniz?')">
                                <i class="fas fa-trash"></i>
                                <span>Sil</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-books"></i>
                </div>
                <h4>Henüz Kitap Yok</h4>
                <p>Sisteme henüz hiç kitap eklenmemiş. Hemen yeni kitap ekleyebilirsiniz.</p>
                <a href="{{ route('admin.books.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i>Yeni Kitap Ekle
                </a>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Sonuç Bulunamadı -->
    <div id="noResults" class="empty-state" style="display: none;">
        <div class="empty-state-icon">
            <i class="fas fa-search"></i>
        </div>
        <h4>Sonuç Bulunamadı</h4>
        <p>Aramanızla eşleşen kitap bulunamadı. Lütfen farklı bir arama terimi deneyin.</p>
    </div>
</div>

<style>
:root {
    --primary: #6366f1;
    --primary-dark: #4f46e5;
    --secondary: #64748b;
    --success: #22c55e;
    --danger: #ef4444;
    --warning: #f59e0b;
    --info: #3b82f6;
    --light: #f8fafc;
    --dark: #0f172a;
    --gray: #94a3b8;
}

/* Genel Stiller */
.container-fluid {
    max-width: 1400px;
}

/* Arama Alanı */
.search-wrapper {
    position: relative;
}

.search-wrapper i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray);
}

.search-wrapper .form-control {
    padding-left: 40px;
    height: 48px;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
}

.form-select {
    height: 48px;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
}

/* Kitap Kartı */
.book-item {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.book-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
}

.book-cover {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    padding: 2rem;
    text-align: center;
}

.book-icon {
    width: 60px;
    height: 60px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.book-icon i {
    color: white;
    font-size: 24px;
}

.book-details {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.book-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 0.5rem;
}

.book-author {
    color: var(--secondary);
    font-size: 0.875rem;
    margin-bottom: 1rem;
}

.book-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.badge {
    background: var(--primary);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-weight: 500;
    font-size: 0.75rem;
}

.publisher {
    color: var(--gray);
    font-size: 0.875rem;
}

.book-description {
    color: var(--secondary);
    font-size: 0.875rem;
    margin-bottom: 1.5rem;
    flex: 1;
}

.book-actions {
    display: flex;
    gap: 0.5rem;
    margin-top: auto;
}

.book-actions .btn {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-size: 0.875rem;
    transition: all 0.2s ease;
}

.btn-light {
    background: var(--light);
    color: var(--dark);
    border: 1px solid #e2e8f0;
}

.btn-danger {
    background: #fee2e2;
    color: var(--danger);
    border: none;
}

.btn-light:hover {
    background: #e2e8f0;
}

.btn-danger:hover {
    background: #fecaca;
}

/* Boş Durum */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
}

.empty-state-icon {
    width: 80px;
    height: 80px;
    background: var(--light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.empty-state-icon i {
    font-size: 32px;
    color: var(--primary);
}

.empty-state h4 {
    color: var(--dark);
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: var(--secondary);
    margin-bottom: 1.5rem;
}

/* Alert */
.alert {
    border-radius: 12px;
    padding: 1rem 1.5rem;
}

.alert-success {
    background: #f0fdf4;
    color: var(--success);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const subjectFilter = document.getElementById('subjectFilter');
    const bookCards = document.querySelectorAll('.book-card');
    const noResults = document.getElementById('noResults');
    
    function filterBooks() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedSubject = subjectFilter.value;
        let visibleCount = 0;
        
        bookCards.forEach(card => {
            const name = card.dataset.name;
            const author = card.dataset.author;
            const subject = card.dataset.subject;
            
            const matchesSearch = name.includes(searchTerm) || author.includes(searchTerm);
            const matchesSubject = !selectedSubject || subject === selectedSubject;
            
            if (matchesSearch && matchesSubject) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        
        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
    }
    
    searchInput.addEventListener('input', filterBooks);
    subjectFilter.addEventListener('change', filterBooks);
});
</script>
@endsection 