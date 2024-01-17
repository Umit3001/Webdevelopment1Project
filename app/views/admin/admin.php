<?php
    require_once __DIR__ . '/../admin/adminheader.php';
?>

    <h1>Manage products</h1>
    <a href="/admin/addproduct" class="btn btn-success mb-3">Add product</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product->product_id; ?></td>
                    <td><?php echo $product->name; ?></td>
                    <td><?php echo $product->description; ?></td>
                    <td><?php echo $product->price; ?></td>
                    <td><?php echo $product->stock; ?></td>
                    <td><?php echo $product->image; ?></td>
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