<?php

require 'layout/header.php';
require_once 'app/ProductController.php';

$productController = new ProductController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productController->createProduct($_POST);
}

?>

<div class="container mt-5">
    <h1>CRUD PHP OOP</h1>

    <div class="card">
        <div class="card-header">
            <h5>Create Product</h5>
        </div>

        <div class="card-body">

            <form action="" method="post" id="createProduct">
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" required min="0">
                </div>
            </form>

            <div class="float-end">
                <a href="index.php" class="btn btn-secondary">Back</a>
                <button type="submit" form="createProduct" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<?php require 'layout/footer.php'; ?>
