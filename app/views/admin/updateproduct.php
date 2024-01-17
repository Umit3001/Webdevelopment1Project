<?php
    require_once __DIR__ . '/../admin/adminheader.php';
?>

<h1>Update product</h1>
<form method="POST" class="row g-3">
    <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
    <div class="col-md-6">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" name="name" value="<?php echo $model->name ?>">
    </div>
    <div class="col-md-6">
        <label for="description" class="form-label">Description:</label>
        <textarea class="form-control" name="description" rows="3"><?php echo $model->description ?></textarea>
    </div>
    <div class="col-md-6">
        <label for="price" class="form-label">Price:</label>
        <input type="number" class="form-control" name="price" step="0.01" value="<?php echo $model->price ?>">
    </div>
    <div class="col-md-6">
        <label for="stock" class="form-label">Stock:</label>
        <input type="number" class="form-control" name="stock" value="<?php echo $model->stock ?>">
    </div>
    <div class="col-md-6">
        <label for="image" class="form-label">Image:</label>
        <input type="text" class="form-control" name="image" value="<?php echo $model->image ?>">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
</body>
</html>