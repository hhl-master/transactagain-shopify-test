<?php
require __DIR__ . '/vendor/autoload.php';

use Shopify\Auth\OAuth;
use Shopify\Clients\Rest;

session_start();

// Shopify app credentials
$apiSecret = '9ff329c4aaecee791a2f4d8af8c7a03b';

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
