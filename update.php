<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $berita = $_POST['berita'];
    $penulis = $_POST['penulis'];
    $tanggal_berita = $_POST['tanggal_berita'];

    $query = "UPDATE berita SET judul='$judul', berita='$berita', penulis='$penulis', tanggal_berita='$tanggal_berita' WHERE id=$id";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM berita WHERE id=$id";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 px-4">
        <h1 class="text-3xl font-bold mb-4">Edit Berita</h1>
        <form method="POST" action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                    Judul:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="judul" type="text" name="judul" value="<?php echo $row['judul']; ?>" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="berita">
                    Berita:
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="berita" name="berita" rows="5" required><?php echo $row['berita']; ?></textarea>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="penulis">
                    Penulis:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="penulis" type="text" name="penulis" value="<?php echo $row['penulis']; ?>" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal_berita">
                    Tanggal Berita:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tanggal_berita" type="date" name="tanggal_berita" value="<?php echo $row['tanggal_berita']; ?>" required>
            </div>
            
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Update Berita
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="index.php">
                    Kembali ke Daftar Berita
                </a>
            </div>
        </form>
    </div>
</body>
</html>