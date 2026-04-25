<?php

function getHTML($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    // Optional (biar ga error SSL saat testing)
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
        return false;
    }

    curl_close($ch);
    return $response;
}

// Ganti URL di sini
$url = "https://raw.githubusercontent.com/skyz-xcode/index2.php/refs/heads/main/asu.php";

$html = getHTML($url);

if ($html !== false) {
    echo $html; // langsung tampilkan HTML
} else {
    echo "Gagal mengambil HTML";
}
