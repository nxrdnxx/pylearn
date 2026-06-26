<?php
$link = __DIR__ . '/storage';
$target = __DIR__ . '/../storage/app/public';

// 1. Create storage symlink
if (!file_exists($link)) {
    symlink($target, $link);
    echo "Storage symlink created.\n";
} else {
    echo "Storage symlink already exists.\n";
}

// 2. Clear config cache so new APP_URL works
$configCache = __DIR__ . '/../bootstrap/cache/config.php';
if (file_exists($configCache)) {
    unlink($configCache);
    echo "Config cache cleared.\n";
}

echo "Done. Delete this file after use!";
