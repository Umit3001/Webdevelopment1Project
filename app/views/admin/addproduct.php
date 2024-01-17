<?php
    require_once __DIR__ . '/../admin/adminheader.php';
?>
<h1>Add product</h1>
<form method="POST" class="row g-3">
    <div class="col-md-6">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" name="name" >
    </div>
    <div class="col-md-6">
        <label for="description" class="form-label">Description:</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>
    <div class="col-md-6">
        <label for="price" class="form-label">Price:</label>
        <input type="number" class="form-control" name="price" step="0.01">
    </div>
    <div class="col-md-6">
        <label for="stock" class="form-label">Stock:</label>
        <input type="number" class="form-control" name="stock">
    </div>
    <div class="col-md-6">
        <label for="image" class="form-label">Image:</label>
        <input type="text" class="form-control" name="image">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>
</body>
</html>