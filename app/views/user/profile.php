<?php
include __DIR__ . '/../basiclayout/header.php';
?>
<link rel="stylesheet" type="text/css" href="../resources/css/userprofilestyle.css">
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Profile</h1>
            <p>Username: <?php echo $user->username; ?></p>
            <p>Email: <?php echo $user->email; ?></p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Orders</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Order Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) { ?>
                        <tr>
                            <td><?php echo $order->order_id; ?></td>
                            <td><?php echo $order->order_date; ?></td>
                            <td><?php echo $order->status; ?></td>
                            <td><a href="#" class="view-details" data-order-id="<?php echo $order->order_id; ?>">View</a></td>
                        </tr>
                        <tr id="order-details-<?php echo $order->order_id; ?>" class="order-details">
                            <td colspan="5">
                                <h2>Order Details</h2>
                                <?php
                                foreach ($orderItems as $item) {
                                    if ($item->order_id == $order->order_id) {
                                        echo "<img class='product-image' src='" . $item->product->image . "' alt='" . $item->product->name . "'>";
                                        echo "<p>Product Name: " . $item->product->name . "</p>";
                                        echo "<p>Product Price: " . $item->product->price . "</p>";
                                        echo "<p>Quantity: " . $item->quantity . "</p>";
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <script>
                    document.querySelectorAll('.view-details').forEach(function(link) {
                        link.addEventListener('click', function(event) {
                            event.preventDefault();
                            var orderId = this.getAttribute('data-order-id');
                            var details = document.getElementById('order-details-' + orderId);
                            if (details.style.display === 'none') {
                                details.style.display = 'table-row';
                            } else {
                                details.style.display = 'none';
                            }
                        });
                    });
                </script>
            </table>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../basiclayout/footer.php';
?>