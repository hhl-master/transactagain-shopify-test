<?php
require __DIR__ . '/vendor/autoload.php';

use Shopify\Auth\OAuth;
use Shopify\Clients\Rest;

session_start();

// Shopify app credentials
$apiKey = 'a66a319ef0651ae2c15a42d50706d2f1';
$apiSecret = '9ff329c4aaecee791a2f4d8af8c7a03b';
$scopes = ['read_products', 'write_products'];
$redirectUri = 'https://shopifytestapp.transactagain.com/transactagain-shopify-test/callback.php';

// Step 1: Redirect to Shopify for OAuth
if (!isset($_GET['shop'])) {
    die("No shop parameter provided!");
}
$shop = $_GET['shop'];
$authUrl = OAuth::buildAuthUrl($scopes, $shop, $redirectUri, $apiKey);

header("Location: $authUrl");
exit;
