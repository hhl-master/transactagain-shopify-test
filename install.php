<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "a66a319ef0651ae2c15a42d50706d2f1";
$scopes = "read_orders,write_products";
$redirect_uri = "https://shopifytestapp.transactagain.com/transactagain-shopify-test/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . "/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();