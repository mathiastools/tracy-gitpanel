<?php

$version = getenv('NETTE');

if (!$version || $version === 'default') {
    exit;
}

echo 'Nette version '.$version.PHP_EOL;

$file = __DIR__.'/composer.json';
$content = file_get_contents($file);
$composer = json_decode($content, true);
if (!isset($composer['require']['tracy/tracy'])) {
    exit(255);
}
$composer['require']['tracy/tracy'] = $version;
$content = json_encode($composer);
file_put_contents($file, $content);
