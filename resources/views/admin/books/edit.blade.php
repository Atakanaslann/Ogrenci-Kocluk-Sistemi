@extends('layouts.admin')

@section('title', 'Kitabı Düzenle')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Kitabı Düzenle</h1>
            <p class="mb-0 text-gray-600">{{ $book->name }} kitabının bilgilerini düzenleyin</p>
        </div>
        <a href="{{ route('admin.books.index') }}" class="btn btn-outline-primary px-4 py-2 rounded-pill">
            <i class="fas fa-arrow-left me-2"></i>Kitaplara Dön
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('admin.books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row g-4">
                            <!-- Kitap Adı -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Kitap Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $book->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Yazar -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="author" class="form-label">Yazar <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('author') is-invalid @enderror" 
                                           id="author" name="author" value="{{ old('author', $book->author) }}" required>
                                    @error('author')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Yayınevi -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="publisher" class="form-label">Yayınevi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('publisher') is-invalid @enderror" 
                                           id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" required>
                                    @error('publisher')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Ders -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject" class="form-label">Ders <span class="text-danger">*</span></label>
                                    <select class="form-select @error('subject') is-invalid @enderror" 
                                            id="subject" name="subject" required>
                                        <option value="">Ders Seçin</option>
                                        @foreach(App\Models\Book::SUBJECTS as $key => $subject)
                                            <option value="{{ $key }}" {{ old('subject', $book->subject) == $key ? 'selected' : '' }}>
                                                {{ $subject }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Açıklama -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description" class="form-label">Açıklama</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="4">{{ old('description', $book->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Butonlar -->
                            <div class="col-12">
                                <hr class="my-4">
                                <div class="d-flex justify-content-end gap-3">
                                    <a href="{{ route('admin.books.index') }}" class="btn btn-light px-4 py-2 rounded-pill">
                                        İptal
                                    </a>
                                    <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                                        <i class="fas fa-save me-2"></i>Değişiklikleri Kaydet
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
:root {
    --primary-color: #4f46e5;
    --secondary-color: #818cf8;
    --success-color: #22c55e;
    --danger-color: #ef4444;
    --dark-color: #1e293b;
    --light-color: #f1f5f9;
}

.form-label {
    font-weight: 500;
    margin-bottom: 0.5rem;
    color: var(--dark-color);
}

.form-control, .form-select {
    padding: 0.75rem 1rem;
    border: 2px solid #e3e6f0;
    border-radius: 0.5rem;
    transition: all 0.2s ease-in-out;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.1);
}

.form-control::placeholder {
    color: #858796;
    opacity: 0.6;
}

.card {
    border-radius: 16px;
    overflow: hidden;
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}

.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

.btn-primary:hover {
    background-color: var(--secondary-color);
    border-color: var(--secondary-color);
}

.btn-light {
    background-color: var(--light-color);
    border-color: var(--light-color);
    color: var(--dark-color);
}

.btn-light:hover {
    background-color: #e2e8f0;
    border-color: #e2e8f0;
}

.invalid-feedback {
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

hr {
    border-color: #e3e6f0;
}
</style>
@endsection 