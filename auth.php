<?php
require __DIR__ . '/vendor/autoload.php';

use Shopify\Auth\OAuth;
use Shopify\Clients\Rest;

session_start();

// Shopify app credentials
$apiKey = '7c02368df14952077e3b1747bd3f1372';
$apiSecret = '33da385e7bc46ee1f41086a1888b332c';
$scopes = ['read_products', 'write_products'];
$redirectUri = 'http://shopifytestapp.transactagain.com/transactagain-shopify-test/callback.php';

// Step 1: Redirect to Shopify for OAuth
if (!isset($_GET['shop'])) {
    die("No shop parameter provided!");
}
$shop = $_GET['shop'];
$authUrl = OAuth::buildAuthUrl($scopes, $shop, $redirectUri, $apiKey);

header("Location: $authUrl");
exit;
