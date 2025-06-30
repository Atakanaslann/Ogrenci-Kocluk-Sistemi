@extends('layouts.app')
@section('title', 'Şifremi Unuttum')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<style>
body { background: #f7f8fa; font-family: 'Inter', 'Roboto', Arial, sans-serif; }
.forgot-container { min-height: 100vh; display: flex; align-items: center; justify-content: center; }
.forgot-card { background: #fff; border-radius: 1.5rem; box-shadow: 0 8px 32px 0 rgba(99,102,241,0.10); padding: 2.5rem 2.2rem 2rem 2.2rem; max-width: 400px; width: 100%; z-index: 2; }
.forgot-title { font-size: 2rem; font-weight: 700; color: #23243a; margin-bottom: 0.7rem; }
.forgot-desc { color: #6366f1; font-size: 1.08rem; margin-bottom: 1.5rem; }
.forgot-label { color: #6366f1; font-weight: 500; margin-bottom: 0.3rem; }
.forgot-input { border-radius: 0.7rem; border: 1.5px solid #e0e7ff; font-size: 1rem; padding: 0.7rem 1rem; background: #f7f8fa; color: #23243a; margin-bottom: 1.2rem; }
.forgot-input:focus { border: 1.5px solid #6366f1; background: #fff; outline: none; }
.forgot-btn { background: linear-gradient(90deg, #6366f1 0%, #3b82f6 100%); color: #fff; border: none; border-radius: 0.7rem; padding: 0.7rem 1.5rem; font-size: 1.05rem; font-weight: 600; width: 100%; transition: background 0.2s; margin-bottom: 0.7rem; }
.forgot-btn:hover { background: linear-gradient(90deg, #3b82f6 0%, #6366f1 100%); }
.forgot-success { background: #e0ffe9; color: #22c55e; border-radius: 0.7rem; padding: 1rem; margin-bottom: 1.2rem; text-align: center; font-weight: 500; }
.forgot-anim-area { position: absolute; right: 0; top: 0; bottom: 0; width: 48vw; min-width: 320px; height: 100vh; display: flex; align-items: center; justify-content: flex-end; background: transparent; z-index: 1; overflow: hidden; }
@media (max-width: 900px) { .forgot-anim-area { display: none; } }
.forgot-anim-bg { position: absolute; right: 0; top: 50%; transform: translateY(-50%); width: 420px; height: 420px; border-radius: 50%; background: linear-gradient(135deg, #e0e7ff 0%, #6366f1 100%); filter: blur(18px) brightness(1.08); opacity: 0.45; z-index: 1; }
</style>
<div class="forgot-container position-relative">
  <div class="forgot-card">
    <div class="forgot-title">Şifremi Unuttum</div>
    <div class="forgot-desc">Kayıtlı e-posta adresinizi girin, size şifre sıfırlama bağlantısı gönderelim.</div>
    @if (session('status'))
      <div class="forgot-success">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <label for="email" class="forgot-label">E-posta Adresi</label>
      <input id="email" type="email" class="form-control forgot-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="ornek@mail.com">
      @error('email')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
      <button type="submit" class="forgot-btn">Şifre Sıfırlama Linki Gönder</button>
    </form>
    <div class="mt-3 text-center">
      <a href="{{ route('login') }}" style="color:#6366f1;font-weight:500;">Giriş Ekranına Dön</a>
    </div>
  </div>
  <div class="forgot-anim-area">
    <div class="forgot-anim-bg"></div>
    <lottie-player
      src="https://assets10.lottiefiles.com/packages/lf20_jcikwtux.json"
      background="transparent"
      speed="1"
      style="width: 340px; height: 340px;"
      loop
      autoplay>
    </lottie-player>
  </div>
</div> 