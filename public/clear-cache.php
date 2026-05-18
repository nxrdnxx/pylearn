<?php

// 1. Reset OPcache (Memory Cache)
if (function_exists('opcache_reset')) {
    opcache_reset();
    $opcache_status = "OPcache berhasil dikosongkan (reset)!";
} else {
    $opcache_status = "OPcache tidak aktif atau tidak terpasang.";
}

// 2. Hapus File Cache Laravel (Config, Route, dll.)
$cache_files = [
    'Config Cache' => __DIR__ . '/../bootstrap/cache/config.php',
    'Route Cache' => __DIR__ . '/../bootstrap/cache/routes-v7.php',
    'Services Cache' => __DIR__ . '/../bootstrap/cache/services.php',
    'Packages Cache' => __DIR__ . '/../bootstrap/cache/packages.php',
];

$cache_status_logs = [];
foreach ($cache_files as $name => $path) {
    if (file_exists($path)) {
        if (unlink($path)) {
            $cache_status_logs[] = "<span style='color: #10b981; font-weight: bold;'>[BERHASIL DIHAPUS]</span> {$name} lama telah dibersihkan.";
        } else {
            $cache_status_logs[] = "<span style='color: #f59e0b; font-weight: bold;'>[GAGAL]</span> Gagal menghapus {$name}. Silakan hapus manual di: " . realpath($path);
        }
    } else {
        $cache_status_logs[] = "<span style='color: #64748b;'>[SUDAH BERSIH]</span> {$name} tidak aktif (tidak ada file cache).";
    }
}

// 3. Load Autoloader & Cek Kelas
$autoloader_path = __DIR__ . '/../vendor/autoload.php';
$autoloader_exists = file_exists($autoloader_path) ? "Ada" : "TIDAK ADA!";

if (file_exists($autoloader_path)) {
    require $autoloader_path;
}

$class_status = class_exists('Laravel\Socialite\Facades\Socialite') 
    ? "<span style='color: #10b981; font-weight: bold;'>Ditemukan! Kelas Laravel\\Socialite\\Facades\\Socialite siap digunakan.</span>" 
    : "<span style='color: #ef4444; font-weight: bold;'>TIDAK Ditemukan. Silakan lakukan restart server/Docker.</span>";

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PyLearn Cache Status</title>
    <style>
        body { font-family: sans-serif; background: #0f172a; color: white; padding: 40px; }
        .card { background: #1e293b; padding: 30px; border-radius: 12px; max-width: 600px; margin: 0 auto; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #3b82f6; }
        ul { line-height: 1.8; }
        .btn { display: inline-block; padding: 10px 20px; background: #3b82f6; color: white; text-decoration: none; border-radius: 8px; font-weight: bold; margin-top: 20px; }
        .log-list { background: #0f172a; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 13px; list-style-type: none; padding-left: 0; }
        .log-list li { padding: 4px 10px; border-bottom: 1px solid #1e293b; }
    </style>
</head>
<body>
    <div class="card">
        <h1>PyLearn Diagnostic Tool (v2)</h1>
        <p>Gunakan halaman ini untuk memuat ulang sistem cache Laravel & PHP Anda.</p>
        <hr style="border-color: #334155;">
        
        <h3>Hasil Pembersihan Cache:</h3>
        <ul class="log-list">
            <?php foreach ($cache_status_logs as $log): ?>
                <li><?php echo $log; ?></li>
            <?php endforeach; ?>
        </ul>

        <h3>Status Sistem:</h3>
        <ul>
            <li><strong>Status Memori Cache (OPcache):</strong> <?php echo $opcache_status; ?></li>
            <li><strong>Autoloader File:</strong> <?php echo $autoloader_exists; ?></li>
            <li><strong>Kelas Socialite:</strong> <?php echo $class_status; ?></li>
        </ul>
        
        <p style="color: #94a3b8; font-size: 13px; margin-top: 20px;">
            *Setelah membersihkan cache di atas, Laravel akan dipaksa membaca kredensial <strong>GOOGLE_CLIENT_ID</strong> baru yang Anda masukkan di file <strong>.env</strong> secara langsung.
        </p>
        
        <a href="/login" class="btn">Kembali ke Login</a>
    </div>
</body>
</html>
