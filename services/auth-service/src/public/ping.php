<?php
header('Content-Type: application/json');
 echo json_encode([
    'message' => 'pong',
    'service' => 'auth-service',
    'timestamp' => date('c')
]);
