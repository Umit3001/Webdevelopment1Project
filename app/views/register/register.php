<?php
require_once __DIR__ . '/../basiclayout/header.php';
?>
<div class="d-flex flex-column min-vh-100">
    <div class="container my-auto">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h1 class="text-center">Register</h1>
                <form action="/register" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <input type="submit" value="Register" class="btn btn-primary mt-3">
                </form>
                <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger mt-3">
                    <?php echo $_GET['error']; ?>
                </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success mt-3">
                    <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <footer class="mt-auto">
        <?php
        include __DIR__ . '/../basiclayout/footer.php';
        ?>
    </footer>