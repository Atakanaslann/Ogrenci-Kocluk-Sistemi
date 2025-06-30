@extends('layouts.admin')

@section('title', 'Dersler')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold">Dersler</h2>
    <div class="row g-4">
        @php
            $icons = [
                'Matematik' => ['icon' => 'fa-square-root-alt', 'color' => 'text-primary'],
                'Türkçe' => ['icon' => 'fa-language', 'color' => 'text-danger'],
                'Tarih' => ['icon' => 'fa-landmark', 'color' => 'text-warning'],
                'Coğrafya' => ['icon' => 'fa-globe-europe', 'color' => 'text-success'],
                'Felsefe' => ['icon' => 'fa-brain', 'color' => 'text-info'],
                'Din Kültürü ve Ahlak Bilgisi' => ['icon' => 'fa-praying-hands', 'color' => 'text-secondary'],
                'Fizik' => ['icon' => 'fa-atom', 'color' => 'text-primary'],
                'Kimya' => ['icon' => 'fa-flask', 'color' => 'text-success'],
                'Biyoloji' => ['icon' => 'fa-dna', 'color' => 'text-warning'],
                'Geometri' => ['icon' => 'fa-shapes', 'color' => 'text-dark'],
            ];
        @endphp
        @foreach($lessons as $lesson)
            @php
                $icon = $icons[$lesson->name]['icon'] ?? 'fa-book';
                $color = $icons[$lesson->name]['color'] ?? 'text-primary';
            @endphp
            <div class="col-md-4">
                <a href="{{ route('admin.lessons.topics', $lesson->id) }}" style="text-decoration:none;">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <span class="fs-1 {{ $color }}"><i class="fas {{ $icon }}"></i></span>
                            <h5 class="card-title mt-3 mb-2">{{ $lesson->name }}</h5>
                            <p class="card-text text-muted">{{ $lesson->name }} dersine ait kazanımlar ve içerikler.</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection 