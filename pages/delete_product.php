<?php

require "../config.php";

use App\Product;

// Remove Student record, and automatically redirect to index

try {
	$product_id = $_GET['id'];
	$result = Product::delProd($product_id);

	if ($result) {
		header('Location: admin_panel.php');
	}

} catch (PDOException $e) {
	error_log($e->getMessage());
	echo "<h1 style='color: red'>" . $e->getMessage() . "</h1>";
}

?>

