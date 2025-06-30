@extends('layouts.admin')

@section('title', 'Yeni Kaynak Ekle')

@section('content')
<div class="container-fluid p-4">
    <!-- Başlık -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 text-dark mb-1">Yeni Kaynak Ekle</h1>
            <p class="text-muted">Test kitabı veya deneme ekleyin</p>
        </div>
        <a href="{{ route('admin.books.index') }}" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left me-2"></i>Kaynaklara Dön
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('admin.books.store') }}" method="POST">
                        @csrf
                        
                        <div class="row g-4">
                            <!-- Kaynak Türü -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type" class="form-label">Kaynak Türü <span class="text-danger">*</span></label>
                                    <select class="form-select @error('type') is-invalid @enderror" 
                                            id="type" name="type" required>
                                        <option value="">Kaynak Türü Seçin</option>
                                        @foreach(App\Models\Book::TYPES as $key => $value)
                                            <option value="{{ $key }}" {{ old('type') == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Kaynak Adı (Test Kitabı için) -->
                            <div class="col-md-6" id="nameField">
                                <div class="form-group">
                                    <label for="name" class="form-label">Kaynak Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Yayınevi -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="publisher" class="form-label">Yayınevi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('publisher') is-invalid @enderror" 
                                           id="publisher" name="publisher" value="{{ old('publisher') }}" required>
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
                                        @foreach(App\Models\Book::SUBJECTS as $key => $value)
                                            <option value="{{ $key }}" {{ old('subject') == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sınıf Seviyesi -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="grade" class="form-label">Sınıf Seviyesi <span class="text-danger">*</span></label>
                                    <select class="form-select @error('grade') is-invalid @enderror" 
                                            id="grade" name="grade" required>
                                        <option value="">Sınıf Seçin</option>
                                        @foreach(App\Models\Book::GRADES as $key => $value)
                                            <option value="{{ $key }}" {{ old('grade') == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('grade')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Açıklama -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description" class="form-label">Açıklama</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="4" 
                                              placeholder="Kaynak hakkında ek bilgiler...">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Butonlar -->
                            <div class="col-12">
                                <hr class="my-4">
                                <div class="d-flex justify-content-end gap-3">
                                    <a href="{{ route('admin.books.index') }}" class="btn btn-light">
                                        İptal
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Kaynağı Kaydet
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

.container-fluid {
    max-width: 1400px;
}

.form-label {
    font-weight: 500;
    color: var(--dark);
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    padding: 0.75rem 1rem;
    border: 1px solid #e2e8f0;
    border-radius: 0.5rem;
    transition: all 0.2s ease;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
}

.card {
    border-radius: 1rem;
    border: none;
}

.btn {
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.2s ease;
}

.btn:hover {
    transform: translateY(-2px);
}

.btn-primary {
    background: var(--primary);
    border-color: var(--primary);
}

.btn-primary:hover {
    background: var(--primary-dark);
    border-color: var(--primary-dark);
}

.btn-light {
    background: var(--light);
    border: 1px solid #e2e8f0;
    color: var(--dark);
}

.btn-light:hover {
    background: #e2e8f0;
}

.invalid-feedback {
    font-size: 0.875rem;
    color: var(--danger);
}

hr {
    opacity: 0.1;
    margin: 2rem 0;
}

.text-muted {
    color: var(--secondary) !important;
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const typeSelect = document.getElementById('type');
    const nameField = document.getElementById('nameField');
    const nameInput = document.getElementById('name');

    function toggleNameField() {
        if (typeSelect.value === 'test') {
            nameField.style.display = 'block';
            nameInput.required = true;
        } else {
            nameField.style.display = 'none';
            nameInput.required = false;
        }
    }

    typeSelect.addEventListener('change', toggleNameField);
    toggleNameField(); // Sayfa yüklendiğinde çalıştır
});
</script>
@endpush
@endsection 