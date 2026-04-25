<link rel="stylesheet" href="{{ asset('assets/pylearn/css/style.css') }}">
<div id="page-login" class="page">
  <div style="min-height:100vh;display:flex;align-items:center;justify-content:center;padding:80px 16px;position:relative;overflow:hidden">
    <div class="bg-glow" style="width:600px;height:600px;background:var(--blue);opacity:0.06;top:-100px;right:-200px"></div>
    <div style="width:100%;max-width:380px;position:relative;z-index:1">
      <a href="{{ route('landing.index') }}" 
        class="btn btn-ghost btn-sm" 
        style="margin-bottom:28px">
        ← Kembali
        </a>
      <div class="card-elevated">
        <div style="margin-bottom:28px">
          <div class="nav-brand" style="margin-bottom:20px;cursor:default">
            <div class="brand-mark"><div class="brand-dot"></div></div>
            <span class="brand-name">Py<em>Learn</em></span>
          </div>
          <h1 style="font-family:var(--f-serif);font-size:26px;letter-spacing:-0.02em;margin-bottom:5px">Selamat datang kembali</h1>
          <p style="font-size:14px;color:var(--t2);font-weight:300">Lanjutkan perjalanan belajarmu.</p>
        </div>
        <div id="login-err" style="display:none;background:var(--red-dim);border:1px solid rgba(224,82,82,0.3);border-radius:var(--r2);padding:11px 14px;margin-bottom:16px;font-size:13px;color:#f87171">
          Email atau password tidak sesuai.
        </div>
        <div style="display:flex;flex-direction:column;gap:14px">
            @if(session('error'))
            <div style="background:var(--red-dim);padding:10px;border-radius:8px;margin-bottom:10px;color:red;">
                {{ session('error') }}
            </div>
            @endif
          <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="field">
                <label class="label">Email</label>
                <input class="input" type="email" name="email" placeholder="kamu@email.com">
            </div>

            <div class="field">
                <label class="label">Password</label>
                <input class="input" type="password" name="password" placeholder="••••••••">
            </div>

            <button class="btn btn-primary btn-full" style="margin-top: 14px" type="submit">
                Masuk
            </button>
        </form>
        <div class="hr"></div>
        <p style="text-align:center;font-size:13px;color:var(--t2)">
            Belum punya akun? 
            <a href="{{ route('register') }}" 
            style="color:var(--blue-light);font-weight:500;text-decoration:none">
                Daftar
            </a>
        </p>
      </div>
    </div>
  </div>
</div>
