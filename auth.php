<?php
require __DIR__ . '/vendor/autoload.php';

use Shopify\Auth\OAuth;
use Shopify\Clients\Rest;

session_start();

// Shopify app credentials
$apiKey = 'your_api_key';
$apiSecret = 'your_api_secret';
$scopes = ['read_products', 'write_products'];
$redirectUri = 'https://your-app-domain.com/callback.php';

// Step 1: Redirect to Shopify for OAuth
if (!isset($_GET['shop'])) {
    die("No shop parameter provided!");
}
$shop = $_GET['shop'];
$authUrl = OAuth::buildAuthUrl($scopes, $shop, $redirectUri, $apiKey);

header("Location: $authUrl");
exit;
