function go(p) {
  document.querySelectorAll('.page').forEach(x => x.classList.remove('active'));
  const t = document.getElementById('page-' + p);
  if (t) { t.classList.add('active'); window.scrollTo(0,0); }
}

function doLogin() {
  const e = document.getElementById('le').value;
  const p = document.getElementById('lp').value;
  const err = document.getElementById('login-err');
  if (!e || !p) { err.style.display = 'block'; return; }
  err.style.display = 'none';
  go('dashboard');
  toast('ok', 'Selamat datang kembali, Arya.');
}

function doRegister() {
  go('dashboard');
  toast('ok', 'Akun berhasil dibuat. Selamat belajar!');
  setTimeout(() => showBadge('🏆','First Blood','Selesaikan level pertamamu'), 1400);
}

function pick(el, ok) {
  document.querySelectorAll('.opt').forEach(o => {
    o.classList.remove('sel','ok','ng');
    o.disabled = true;
  });
  if (ok) el.classList.add('ok');
  else { el.classList.add('ng'); document.querySelectorAll('.opt')[1].classList.add('ok'); }
}

function toast(type, msg) {
  const w = document.getElementById('toasts');
  const d = document.createElement('div');
  d.className = 'toast toast-' + type;
  d.innerHTML = `<div class="t-dot t-dot-${type}"></div><span>${msg}</span>`;
  w.appendChild(d);
  setTimeout(() => { d.style.opacity='0'; d.style.transform='translateY(4px)'; d.style.transition='all .2s'; setTimeout(()=>d.remove(),200); }, 3200);
}

function showBadge(ico, name, desc) {
  document.getElementById('m-badge-ico').textContent = ico;
  document.getElementById('m-badge-name').textContent = name;
  document.getElementById('m-badge-desc').textContent = desc;
  document.getElementById('m-badge').classList.add('open');
}

function showLock() { document.getElementById('m-lock').classList.add('open'); }

function closeModal(id) { document.getElementById(id).classList.remove('open'); }

document.querySelectorAll('.overlay').forEach(o => {
  o.addEventListener('click', e => { if (e.target === o) o.classList.remove('open'); });
});

function ftab(el) {
  el.closest('.ftabs').querySelectorAll('.ftab').forEach(t => t.classList.remove('on'));
  el.classList.add('on');
}

window.addEventListener('load', () => {
  setTimeout(() => toast('ok', 'Streak 7 hari berjalan. Pertahankan!'), 700);
});