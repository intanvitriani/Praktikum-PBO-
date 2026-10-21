<?php
require_once 'Product.php';

$editData = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'create') {
        $p = new Product();
        $p->setNama($_POST['nama'])
          ->setHarga($_POST['harga'])
          ->setStok($_POST['stok'])
          ->save();
        header("Location: index.php");
        exit;
    } elseif ($action === 'update') {
        $p = new Product();
        $p->setNama($_POST['nama'])
          ->setHarga($_POST['harga'])
          ->setStok($_POST['stok'])
          ->update($_POST['id']);
        header("Location: index.php");
        exit;
    }
}

if (isset($_GET['delete'])) {
    Product::delete($_GET['delete']);
    header("Location: index.php");
    exit;
}

if (isset($_GET['edit'])) {
    $editData = Product::findById($_GET['edit']);
}

$products = Product::findAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SISTEM MANAJEMEN PRODUK</title>
    <!-- Import Font Pacifico dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 30px; 
            background-color: #FAF5F6; 
            color: #333;
        }
        h2 { 
            font-family: 'Pacifico', cursive;
            color: #66021F; 
            text-align: center;
            font-size: 38px;
            font-weight: normal;
            margin-bottom: 25px;
        }
        h3 {
            color: #66021F; 
            text-align: center;
        }
        .form-container { 
            margin: 0 auto 30px auto; 
            padding: 20px; 
            border: 1px solid #eb6580d6; 
            border-radius: 8px; 
            width: 320px; 
            background-color: #FFE9EC; 
            box-shadow: 0 4px 6px rgba(102, 2, 31, 0.05);
        }
        .form-container input { 
            display: block; 
            margin-bottom: 12px; 
            width: 95%; 
            padding: 8px; 
            border: 1px solid #cb647a; 
            border-radius: 4px; 
            background-color: #FFF;
        }
        .form-container button { 
            padding: 9px 16px; 
            cursor: pointer; 
            background-color: #66021F; 
            color: #FFF; 
            border: none; 
            border-radius: 4px; 
            font-weight: bold;
        }
        .form-container button:hover {
            background-color: #4A0116;
        }
        .form-container a { 
            margin-left: 10px; 
            text-decoration: none; 
            color: #66021F; 
            font-weight: 500;
        }
        table { 
            border-collapse: collapse; 
            width: 100%; 
            margin-top: 10px; 
            background-color: #FFF;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        table, th, td { 
            border: 1px solid #E6CDD2; 
            padding: 10px; 
            text-align: left; 
        }
        th { 
            background-color: #66021F; 
            color: #FFF;
        }
        tr:nth-child(even) {
            background-color: #FFF7F8;
        }
        .btn-action { 
            text-decoration: none; 
            padding: 5px 10px; 
            border-radius: 4px; 
            font-size: 13px; 
            font-weight: bold;
        }
        .btn-edit { 
            background-color: #FFE9EC; 
            color: #66021F; 
            border: 1px solid #66021F;
        }
        .btn-edit:hover {
            background-color: #F7D0D7;
        }
        .btn-delete { 
            background-color: #66021F; 
            color: #FFF; 
        }
        .btn-delete:hover {
            background-color: #4A0116;
        }
    </style>
</head>
<body>

    <h2>Sistem Manajemen Produk</h2>

    <div class="form-container">
        <h3>Form <?= $editData ? 'Edit' : 'Tambah' ?> Produk</h3>
        <form method="POST" action="index.php">
            <input type="hidden" name="action" value="<?= $editData ? 'update' : 'create' ?>">
            <?php if ($editData): ?>
                <input type="hidden" name="id" value="<?= $editData['id'] ?>">
            <?php endif; ?>

            <label>Nama Produk:</label>
            <input type="text" name="nama" value="<?= $editData['nama'] ?? '' ?>" required>

            <label>Harga (Rp):</label>
            <input type="number" name="harga" value="<?= $editData['harga'] ?? '' ?>" required>

            <label>Stok:</label>
            <input type="number" name="stok" value="<?= $editData['stok'] ?? '' ?>" required>

            <button type="submit"><?= $editData ? 'Update Produk' : 'Simpan Produk' ?></button>
            <?php if ($editData): ?>
                <a href="index.php">Batal</a>
            <?php endif; ?>
        </form>
    </div>

    <h3>Daftar Produk</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($products)): ?>
            <tr>
                <td colspan="5" style="text-align: center;">Belum ada data produk.</td>
            </tr>
            <?php else: ?>
                <?php foreach ($products as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                    <td><?= $row['stok'] ?></td>
                    <td>
                        <a href="index.php?edit=<?= $row['id'] ?>" class="btn-action btn-edit">Edit</a>
                        <a href="index.php?delete=<?= $row['id'] ?>" class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
