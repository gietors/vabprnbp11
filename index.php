<?php

require 'layout/header.php';
require_once 'app/ProductController.php';

$koneksi = new mysqli("localhost", "root", "", "vabprnbp11");

$productController = new ProductController();
$products = $productController->getProducts();


?>

<div class="container mt-5">
    <h2>Data Virtual Account Nasabah</h2>

    <div class="card">
        <div class="card-header">
            <h5>BPR NBP 11</h5>
        </div>

        <div class="card-body">

            <div class="search-box">
        
    </div>

            <table id="products" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th width="2%">No</th>
                        <th>No Kredit</th>
                        <th>No Tabungan</th>
                        <th>Virtual Account</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Angsuran Pokok</th>
                        <th>Angsuran Bunga</th>
                        <th>Total Angsuran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $product['noacc']; ?></td>
                            <td><?= $product['norektab']; ?></td>
                            <td><?= $product['va']; ?></td>
                            <td><?= $product['fnama']; ?></td>
                            <td><?= $product['alamat']; ?></td>
                            <td>Rp. <?= number_format($product['angsuran_pokok'], 0, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($product['angsuran_bunga'], 0, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($product['total_angsuran'], 0, ',', '.'); ?></td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require 'layout/footer.php'; ?>
