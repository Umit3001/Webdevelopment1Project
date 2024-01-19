<?php
    require_once __DIR__ . '/../admin/adminheader.php';
?>

    <h1>Manage products</h1>
    <a href="/admin/addproduct" class="btn btn-success mb-3">Add product</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product I</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td data-label="Product ID"><?php echo $product->product_id; ?></td>
                    <td data-label="Name"><?php echo $product->name; ?></td>
                    <td data-label="Description"><?php echo $product->description; ?></td>
                    <td data-label="Price"><?php echo $product->price; ?></td>
                    <td data-label="Stock"><?php echo $product->stock; ?></td>
                    <td data-label="Image"><?php echo $product->image; ?></td>
                    <td>
                        <a href="/admin/updateproduct?product_id=<?php echo $product->product_id; ?>" class="btn btn-primary">Update</a>
                        <a href="/admin/deleteproduct?product_id=<?php echo $product->product_id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>