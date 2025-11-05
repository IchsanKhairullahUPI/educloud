<?php
require __DIR__ . '/../app/Http/Controllers/MediaController.php';

use App\Http\Controllers\MediaController;

$controller = new MediaController();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/media') {
    $controller->index();
}
