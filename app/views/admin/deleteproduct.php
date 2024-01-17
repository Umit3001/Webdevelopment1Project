<?php
    require_once __DIR__ . '/../admin/adminheader.php';
?>
<?php
$product_id = $_POST['product_id'] ?? $model->product_id;
?>

<h1>Update Product</h1>
<form action="/admin/deleteproduct" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <input type="submit" value="Delete">
</form>
</body>
</html>
