<?php
include __DIR__ . '/../basiclayout/header.php';
?>
<link rel="stylesheet" type="text/css" href="../resources/css/productstyle.css">
<h1 class="text-center">Products</h1>
<div>
    <button id="sortPriceAsc">Sort by Price (Low to High)</button>
    <button id="sortPriceDesc">Sort by Price (High to Low)</button>
</div>
<div class="row" id="productsContainer">
</div>
<script>
function loadProducts(sort) {
    let url = '/api/products';
    if (sort === 'price-asc') {
        url += '?sort=price-asc';
    }
    else if (sort === 'price-desc') {
        url += '?sort=price-desc';
    }
    fetch(url)
        .then(response => response.json())
        .then(products => {
            var productsContainer = document.getElementById('productsContainer');
            productsContainer.innerHTML = '';

            products.forEach(product => {
                var productDiv = document.createElement('div');
                productDiv.className = 'col-4';
                productDiv.innerHTML = `
                    <div class="card">
                        <img src="${product.image}" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">${product.name}</h5>
                            <p class="card-text-description">${product.description}</p>
                            <p class="card-text">Price: €${product.price}</p>
                            <a href="/products/product_details?id=${product.product_id}" class="btn btn-primary">More info</a>
                        </div>
                    </div>
                `;
                productsContainer.appendChild(productDiv);
            });
        });
}

document.getElementById('sortPriceAsc').addEventListener('click', function() {
    loadProducts('price-asc');
});

document.getElementById('sortPriceDesc').addEventListener('click', function() {
    loadProducts('price-desc');
});

loadProducts(sort = null);
</script>

<?php
include __DIR__ . '/../basiclayout/footer.php';
?>