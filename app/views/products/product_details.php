<?php
include __DIR__ . '/../basiclayout/header.php';
?>
<link rel="stylesheet" type="text/css" href="../resources/css/product_detailsstyle.css">
<?php 
if (isset($product)) { ?>
    <h1 class="product-title"><?php echo $product->name; ?></h1>
    <div class="product-details">
        <img src="<?php echo $product->image; ?>" alt="Product Image" class="product-image">
        <div class="product-info">
            <p class="product-description"><?php echo $product->description; ?></p>
            <p class="product-price">Price: €<?php echo $product->price; ?></p>

            <?php 
            if (isset($_SESSION['user_id'])) { ?>
                <form method="POST" action="/shoppingcart/add_to_cart">
                    <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="product-buy-button">add to cart</button>
                </form>
            <?php 
            } else { ?>
                <p>You must be <a href="/login">logged in</a> to add products to the cart.</p>
            <?php 
            } ?>
            <h2>Post a Comment</h2>

            <?php 
            if (isset($_SESSION['user_id'])) { ?>
                <form  class="comment-form" method="POST" action="/products/product_details?id=<?php echo $product->product_id; ?>">
                    <textarea name="comment_text" id="comment" rows="5" cols="40"></textarea><br>
                    <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                    <input type="submit" value="Post Comment" name="submit_comment">
                </form>
            <?php 
            } else { ?>
                <p>You must be <a href="/login">logged in</a> to post a comment.</p>
            <?php 
            } ?>

            <h2>Comments</h2>

            <?php 
            foreach ($comments as $comment) { ?>
                <div class="comment">
                    <div class="card">
                        <p class="comment-text"><?php echo $comment->comment_text; ?></p>
                        <p class="comment-timestamp"><?php echo $comment->timestamp; ?></p>
                    </div>
                </div>
            <?php 
            }
        ?>
        </div>
    </div>
<?php 
}
include __DIR__ . '/../basiclayout/footer.php';
?>