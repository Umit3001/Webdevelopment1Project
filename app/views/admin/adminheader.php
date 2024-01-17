<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../resources/css/adminstyle.css">
</head>
<body>
<div class="container">
<header class="d-flex justify-content-between py-3 bg-dark text-white">
    <h1 class="h3">Admin Panel</h1>
    <div>
        <?php if (isset($_SESSION['username'])) { ?>
            <span><?php echo $_SESSION['username']; ?></span>
            <a href="/logout" class="btn btn-light">Logout</a>
        <?php } ?>
    </div>
</header>