@extends('layouts.app')

@section('title', 'Edit Profil')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
<style>
    #cropModal .cropper-container {
        max-height: 70vh;
    }
    .cropper-view-box,
    .cropper-face {
        border-radius: 50%;
    }
</style>
@endpush

@section('content')
<div class="pt-16 min-h-screen bg-ink-950">
    <div class="relative overflow-hidden pt-12 pb-16">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-[1200px] pointer-events-none">
            <div class="absolute top-[-100px] left-[-100px] w-[400px] h-[400px] bg-brand-blue/10 blur-[120px] rounded-full"></div>
            <div class="absolute bottom-[-50px] right-[-100px] w-[300px] h-[300px] bg-brand-purple/10 blur-[100px] rounded-full"></div>
        </div>

        <div class="max-w-[600px] mx-auto px-7 relative z-10">
            <div class="text-center">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-blue/10 border border-brand-blue/20 text-brand-blue-light text-[11px] font-bold uppercase tracking-wider mb-3">
                    <i class="fa-solid fa-pen-to-square text-[10px]"></i> Edit Profil
                </div>
                <h1 class="text-4xl font-semibold text-white mb-2 tracking-tight">Edit Profil</h1>
                <p class="text-text-secondary mb-8">Perbarui nama dan foto profil kamu</p>
            </div>

            @if(session('success'))
            <div class="mb-6 px-5 py-4 rounded-2xl bg-brand-green/10 border border-brand-green/20 text-brand-green text-sm font-semibold flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="mb-6 px-5 py-4 rounded-2xl bg-brand-red/10 border border-brand-red/20 text-brand-red text-sm font-semibold flex items-center gap-3">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Foto Profil -->
                <div class="bg-surface-1 rounded-[24px] sm:rounded-[28px] border border-white/5 p-5 sm:p-8">
                    <label class="text-xs sm:text-sm font-bold text-white uppercase tracking-widest flex items-center gap-3 mb-4 sm:mb-6">
                        <i class="fa-solid fa-camera text-brand-blue"></i> Foto Profil
                    </label>

                    <div class="flex flex-col items-center gap-4 sm:gap-5">
                        <div class="relative group">
                            <div class="absolute inset-0 bg-ink-700/30 rounded-[32px] blur-xl opacity-40"></div>
                            <div id="previewContainer" class="relative w-24 h-24 sm:w-32 sm:h-32 rounded-[32px] bg-ink-700 border-2 border-ink-600 flex items-center justify-center shadow-2xl overflow-hidden">
                                @if($user->profile_picture)
                                <img id="previewImage" src="{{ '/' . $pubDir . 'storage/' . $user->profile_picture }}" alt="Foto Profil" class="w-full h-full object-cover">
                                @else
                                <i id="previewIcon" class="fa-solid fa-user text-white text-3xl sm:text-5xl"></i>
                                <img id="previewImage" class="hidden w-full h-full object-cover">
                                @endif
                            </div>
                        </div>

                        <label class="cursor-pointer px-4 sm:px-5 py-2 sm:py-2.5 rounded-2xl bg-brand-blue text-white font-bold text-[10px] sm:text-xs hover:bg-brand-blue-light transition-all shadow-lg shadow-brand-blue/20 inline-flex items-center gap-2">
                            <i class="fa-solid fa-upload"></i> Pilih Foto
                            <input type="file" name="profile_picture" id="profile_picture" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" class="hidden" onchange="previewFile(this)">
                        </label>

                        @if($user->profile_picture)
                        <button type="button" onclick="removePhoto()" class="text-[11px] sm:text-xs text-brand-red font-semibold hover:text-brand-red-light transition-colors">
                            <i class="fa-solid fa-trash-can mr-1"></i> Hapus Foto
                        </button>
                        @endif

                        <p class="text-[10px] sm:text-[11px] text-text-muted">Format: JPG, PNG, GIF, WebP. Maks: 2MB</p>
                    </div>
                </div>

                <!-- Nama -->
                <div class="bg-surface-1 rounded-[24px] sm:rounded-[28px] border border-white/5 p-5 sm:p-8">
                    <label class="text-xs sm:text-sm font-bold text-white uppercase tracking-widest flex items-center gap-3 mb-3 sm:mb-4">
                        <i class="fa-solid fa-user text-brand-blue"></i> Nama Lengkap
                    </label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                        class="w-full px-4 sm:px-5 py-3 sm:py-4 rounded-2xl bg-surface-2 border border-white/10 text-white text-sm font-medium placeholder-text-muted focus:outline-none focus:border-brand-blue/50 focus:ring-4 focus:ring-brand-blue/10 transition-all"
                        placeholder="Masukkan nama kamu">
                </div>

                <!-- Tombol -->
                <div class="flex gap-3 sm:gap-4">
                    <a href="{{ route('profile.index') }}" class="flex-1 text-center px-4 sm:px-5 py-3 sm:py-4 rounded-2xl bg-surface-1 border border-white/10 text-text-secondary font-bold text-[10px] sm:text-xs hover:bg-surface-2 transition-all">
                        <i class="fa-solid fa-arrow-left mr-1 sm:mr-2"></i>Kembali
                    </a>
                    <button type="submit" class="flex-1 px-4 sm:px-5 py-3 sm:py-4 rounded-2xl bg-brand-blue text-white font-bold text-[10px] sm:text-xs hover:bg-brand-blue-light hover:shadow-[0_20px_40px_rgba(59,124,244,0.3)] transition-all duration-300 active:scale-[0.97]">
                        <i class="fa-solid fa-floppy-disk mr-1 sm:mr-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Crop Modal -->
<div id="cropModal" class="fixed inset-0 z-[200] bg-ink-950/90 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-surface-1 rounded-[28px] border border-white/10 w-full max-w-md shadow-2xl overflow-hidden">
        <div class="p-4 sm:p-5 border-b border-white/5 flex items-center justify-between">
            <h3 class="text-sm font-bold text-white">Crop Foto Profil</h3>
            <button type="button" onclick="closeCropModal()" class="text-text-secondary hover:text-white w-7 h-7 flex items-center justify-center rounded-full hover:bg-white/10 transition-all">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-4 sm:p-5">
            <div class="w-full max-h-[400px] overflow-hidden rounded-2xl bg-ink-950">
                <img id="cropImage" src="" alt="Crop Foto">
            </div>
        </div>
        <div class="p-4 sm:p-5 border-t border-white/5 flex gap-3">
            <button type="button" onclick="closeCropModal()" class="flex-1 py-2.5 sm:py-3 rounded-2xl bg-white/5 text-text-secondary font-bold text-[10px] sm:text-xs hover:bg-white/10 transition-all">Batal</button>
            <button type="button" onclick="confirmCrop()" class="flex-1 py-2.5 sm:py-3 rounded-2xl bg-brand-blue text-white font-bold text-[10px] sm:text-xs hover:bg-brand-blue-light transition-all shadow-lg shadow-brand-blue/20">Terapkan</button>
        </div>
    </div>
</div>

<form id="deletePhotoForm" action="{{ route('profile.delete-photo') }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
let cropper = null;
let currentCropFile = null;

function previewFile(input) {
    if (input.files && input.files[0]) {
        currentCropFile = input.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            showCropModal(e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function showCropModal(src) {
    const modal = document.getElementById('cropModal');
    const img = document.getElementById('cropImage');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    img.src = src;

    setTimeout(function() {
        if (cropper) cropper.destroy();
        cropper = new Cropper(img, {
            aspectRatio: 1,
            viewMode: 1,
            dragMode: 'move',
            cropBoxResizable: true,
            cropBoxMovable: true,
            minContainerWidth: 200,
            minContainerHeight: 200,
        });
    }, 200);
}

function closeCropModal() {
    const modal = document.getElementById('cropModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
    document.getElementById('profile_picture').value = '';
    currentCropFile = null;
}

function confirmCrop() {
    if (!cropper) return;

    const canvas = cropper.getCroppedCanvas({
        width: 512,
        height: 512,
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high',
    });

    canvas.toBlob(function(blob) {
        const fileName = currentCropFile ? currentCropFile.name.replace(/\.[^.]+$/, '') + '-cropped.jpg' : 'profile-cropped.jpg';
        const croppedFile = new File([blob], fileName, {
            type: 'image/jpeg',
            lastModified: Date.now(),
        });

        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(croppedFile);
        const input = document.getElementById('profile_picture');
        input.files = dataTransfer.files;

        const preview = document.getElementById('previewImage');
        const icon = document.getElementById('previewIcon');
        preview.src = canvas.toDataURL('image/jpeg');
        preview.classList.remove('hidden');
        if (icon) icon.style.display = 'none';

        const modal = document.getElementById('cropModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    }, 'image/jpeg', 0.95);
}

function removePhoto() {
    if (confirm('Hapus foto profil?')) {
        document.getElementById('deletePhotoForm').submit();
    }
}
</script>
@endpush
@endsection
