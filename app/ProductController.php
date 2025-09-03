<?php

require_once 'Database.php';

class ProductController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getProducts()
    {
        $result = mysqli_query($this->db, "SELECT * FROM data_nasabah");
        $products = [];

        while ($product = mysqli_fetch_assoc($result)) {
            $products[] = $product;
        }

        return $products;
    }

    public function createProduct($data)
    {
        $noacc   = $this->filter($data['noacc']);
        $norektab = $this->filter($data['notab']);
        $va   = $this->filter($data['va']);
        $fnama  = $this->filter($data['fnama']);
        $alamat   = $this->filter($data['alamat']);
        $angsuran_pokok = $this->filter($data['angsuran_pokok']);
        $angsuran_bunga   = $this->filter($data['angsuran_bunga']);
        $total_angsuran  = $this->filter($data['total_angsuran']);

        $sql = $this->db->prepare("INSERT INTO data_nasabah (noacc, notab) VALUES (?, ?)");
        $sql->bind_param("si", $name, $price);

        if ($sql->execute()) {
            if ($sql->affected_rows > 0) {
                echo "<script>
                    alert('Product created successfully!')
                    window.location.href = 'index.php';
                </script>";
            } else {
                echo "<script>
                    alert('Failed to create product! " . $sql->error . "')
                    window.location.href = 'create-product.php';
                </script>";
            }
        }
    }

    public function updateProduct($data, $id)
    {
        $noacc   = $this->filter($data['noacc']);
        $norektab = $this->filter($data['notab']);
        $va   = $this->filter($data['va']);
        $fnama  = $this->filter($data['fnama']);
        $alamat   = $this->filter($data['alamat']);
        $angsuran_pokok = $this->filter($data['angsuran_pokok']);
        $angsuran_bunga   = $this->filter($data['angsuran_bunga']);
        $total_angsuran  = $this->filter($data['total_angsuran']);

        $sql = $this->db->prepare("UPDATE data_nasabah SET noacc = ?, norektab = ? WHERE id = ?");
        $sql->bind_param("sii", $noacc, $norektab, $id);

        if ($sql->execute()) {
            if ($sql->affected_rows > 0) {
                echo "<script>
                    alert('Product updated successfully!')
                    window.location.href = 'index.php';
                </script>";
            } else {
                echo "<script>
                    alert('Failed to update product! " . $sql->error . "')
                    window.location.href = 'edit-product.php?id=" . $id . "';
                </script>";
            }
        }
    }

    public function deleteProduct($id)
    {
        $sql = $this->db->prepare("DELETE FROM data_nasabah WHERE id = ?");
        $sql->bind_param("i", $id);

        if ($sql->execute()) {
            echo "<script>
            alert('Product deleted successfully!')
            window.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
            alert('Failed to delete product! " . $sql->error . "')
            window.location.href = 'index.php';
            </script>";
        }
    }

    public function showProduct($id)
    {
        $sql = $this->db->prepare("SELECT * FROM data_nasabah WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $product = $sql->get_result()->fetch_assoc();
        return $product;
    }

    private function filter($input)
    {
        return htmlspecialchars(strip_tags($input));
    }
}
