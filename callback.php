<?php
require __DIR__ . '/vendor/autoload.php';

use Shopify\Auth\OAuth;
use Shopify\Clients\Rest;

session_start();

// Shopify app credentials
$apiSecret = '33da385e7bc46ee1f41086a1888b332c';

// Step 2: Verify the callback from Shopify
if (!isset($_GET['shop']) || !isset($_GET['code'])) {
    die("Invalid request.");
}

$shop = $_GET['shop'];
$code = $_GET['code'];

// Exchange the authorization code for an access token
try {
    $accessToken = OAuth::getAccessToken($shop, $code, $apiSecret);
    $_SESSION['access_token'] = $accessToken;
    $_SESSION['shop'] = $shop;

    // Redirect to your app's main page
    header("Location: /dashboard.php");
    exit;
} catch (Exception $e) {
    die("Error during authentication: " . $e->getMessage());
}
