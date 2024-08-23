<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT * FROM berita WHERE id=$id";
    $result = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Berita tidak ditemukan.";
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['judul']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 px-4">
        <h1 class="text-3xl font-bold mb-4"><?php echo $row['judul']; ?></h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <p class="mb-2"><strong class="font-bold">Penulis:</strong> <?php echo $row['penulis']; ?></p>
            <p class="mb-4"><strong class="font-bold">Tanggal:</strong> <?php echo $row['tanggal_berita']; ?></p>
            <div class="bg-gray-100 rounded p-4 mb-4">
                <?php echo nl2br($row['berita']); ?>
            </div>
            <a href="index.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Kembali ke Daftar Berita</a>
        </div>
    </div>
</body>
</html>