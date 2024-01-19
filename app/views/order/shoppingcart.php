<?php
include __DIR__ . '/../basiclayout/header.php';
?>
<link rel="stylesheet" type="text/css" href="../resources/css/shoppingcartstyle.css">

<h1 class="text-center my-4">Shopping Cart</h1>
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderItems as $item): ?>
                <tr>
                    <td>
                        <img src="<?= $item->product->image ?>" alt="<?= $item->product->name ?>" class="product-image">
                    </td>
                    <td><?= $item->product->name ?></td>
                    <td>€ <?= $item->product->price?></td>
                    <td>
                        <form method="post" action="/shoppingcart/update_cart" class="quantity-form">
                            <input type="hidden" name="order_item_id" value="<?= $item->order_item_id ?>">
                            <input type="number" name="quantity" value="<?= $item->quantity ?>" class="quantity-input" onchange="submitForm(this)">
                        </form>
                    </td>
                    <td>
                        <form method="post" action="/shoppingcart/delete_from_cart">
                            <input type="hidden" name="order_item_id" value="<?= $item->order_item_id ?>">
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
    function submitForm(input) {
 
    var form = input.closest('.quantity-form');

    form.submit();
    }
    </script>

    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Total: € <?= $totalPrice ?></h5>
            <form method="post" action="/shoppingcart/confirm_order">
                <button class="confirm-order-button btn btn-success" type="submit" <?= empty($orderItems) ? 'disabled' : '' ?>>Confirm Order</button>
            </form>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../basiclayout/footer.php';
?>
