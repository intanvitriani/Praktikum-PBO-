<?php
require_once 'Database.php';

class Product {
    private $db;
    private $nama;
    private $harga;
    private $stok;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function setNama($nama) {
        $this->nama = $nama;
        return $this;
    }

    public function setHarga($harga) {
        $this->harga = $harga;
        return $this;
    }

    public function setStok($stok) {
        $this->stok = $stok;
        return $this;
    }

    public function save() {
        $sql = "INSERT INTO product (nama, harga, stok) VALUES (:nama, :harga, :stok)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'nama' => $this->nama,
            'harga' => $this->harga,
            'stok' => $this->stok
        ]);
    }

    public static function findAll() {
        $db = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM product ORDER BY id DESC";
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
        $db = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM product WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id) {
        $sql = "UPDATE product SET nama = :nama, harga = :harga, stok = :stok WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'nama' => $this->nama,
            'harga' => $this->harga,
            'stok' => $this->stok
        ]);
    }

    public static function delete($id) {
        $db = Database::getInstance()->getConnection();
        $sql = "DELETE FROM product WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}