<?php
require_once __DIR__ . '/../basiclayout/header.php';
?>
<div class="d-flex flex-column min-vh-100">
    <div class="container my-auto">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h1 class="text-center">Login</h1>
                <form action="/login" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary mt-3">
                </form>
                <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger mt-3">
                    <?php echo htmlspecialchars(urldecode($_GET['error'])); ?>
                </div>
                <?php endif; ?>
                <h2 class="text-center mt-4">Need an account?</h2>
                <div class="text-center">
                    <a href="/register" class="btn btn-secondary">Register</a>
                </div>
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
</div>