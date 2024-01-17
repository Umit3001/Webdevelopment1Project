<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Clothing webshop.">
    <meta name="author" content="Umit Can">
    <meta name="keywords" content="UCee, Clothing, Fashion, Online Shopping">
    <title>UCee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel= "stylesheet" href="/resources/css/basiclayout/basiclayoutstyle.css">
</head>
<body>
    <main>
        <header class="d-flex justify-content-between py-3">
            <h1 class="webshop-name">UCee</h1>
            <nav>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/products" class="nav-link">Products</a>
                </li>
                <li class="nav-item">
                    <a href="/contact" class="nav-link">Contact</a>
                </li>
            </ul>
            </nav>
            <div class="rightHeaderContainer">
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="/user/profile" class="nav-link"><?php echo $_SESSION['username']; ?></a>
                    <a href="/logout" class="nav-link">Logout</a>
                <?php else: ?>
                    <a href="/login" class="nav-link">Login</a>
                <?php endif; ?>
                <a href="<?php echo isset($_SESSION['user_id']) ? '/shoppingcart' : '/login'; ?>" class="shopping-cart-button">
                    <svg class="shopping-cart-image" width="800px" height="600px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.46785 10.2658C4.47574 10.3372 4.48376 10.4094 4.49187 10.4823L4.61751 11.6131C4.7057 12.4072 4.78218 13.0959 4.91562 13.6455C5.05917 14.2367 5.29582 14.7937 5.78931 15.2354C6.28281 15.6771 6.86251 15.8508 7.46598 15.9281C8.02694 16.0001 8.71985 16 9.51887 16H14.8723C15.4201 16 15.9036 16 16.3073 15.959C16.7448 15.9146 17.1698 15.8162 17.5785 15.5701C17.9872 15.324 18.2731 14.9944 18.5171 14.6286C18.7422 14.291 18.9684 13.8637 19.2246 13.3797L21.7141 8.67734C22.5974 7.00887 21.3879 4.99998 19.5 4.99998L9.39884 4.99998C8.41604 4.99993 7.57525 4.99988 6.90973 5.09287C6.5729 5.13994 6.24284 5.21529 5.93326 5.34375L5.78941 4.04912C5.65979 2.88255 4.67375 2 3.5 2H3C2.44772 2 2 2.44771 2 3C2 3.55228 2.44772 4 3 4H3.5C3.65465 4 3.78456 4.11628 3.80164 4.26998L4.46785 10.2658Z" fill="#323232"/>
                    </svg> 
                </a>
            </div>    
            </header>
    </main>
</body>
</html>



