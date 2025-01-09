<?php
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Verify the webhook using the HMAC header
$hmacHeader = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];
$calculatedHmac = base64_encode(hash_hmac('sha256', $input, '33da385e7bc46ee1f41086a1888b332c', true));

if (hash_equals($hmacHeader, $calculatedHmac)) {
    // Process the webhook payload
    file_put_contents('webhook_log.txt', print_r($data, true));
} else {
    http_response_code(403);
    die('Invalid HMAC');
}
