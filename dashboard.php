<?php
require __DIR__ . '/vendor/autoload.php';

use Shopify\Clients\Rest;

session_start();

if (!isset($_SESSION['access_token']) || !isset($_SESSION['shop'])) {
    die("Not authenticated.");
}

$shop = $_SESSION['shop'];
$accessToken = $_SESSION['access_token'];

// Fetch products from the Shopify store
$client = new Rest($shop, $accessToken);

try {
    $response = $client->get('products');
    $products = $response->getDecodedBody()['products'];
} catch (Exception $e) {
    die("Error fetching products: " . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopify Dashboard</title>
</head>
<body>
    <h1>Welcome to your Shopify App</h1>
    <h2>Products</h2>
    <ul>
        <?php foreach ($products as $product): ?>
            <li><?php echo $product['title']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
