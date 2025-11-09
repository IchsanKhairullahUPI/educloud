<?php

header('Content-Type: application/json');

echo json_encode([
    'service' => 'AI Question Generator Service',
    'status' => 'running',
    'message' => 'Hello from AI service!'
]);
