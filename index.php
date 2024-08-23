<?php
include "koneksi.php";

$query = "SELECT * FROM berita ORDER BY tanggal_berita DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('gam.png')]">
    <div class="container mx-auto mt-8 px-4">
        <h1 class="text-3xl font-bold mb-4 text-white">Daftar Berita</h1>
        <table class="w-full bg-white shadow-md rounded mb-4">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Judul</th>
                    <th class="py-3 px-6 text-left">Penulis</th>
                    <th class="py-3 px-6 text-left">Tanggal Berita</th>
                    <th class="py-3 px-6 text-center">Ubah Data</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php 
                $asw = 0;
                while ($row = mysqli_fetch_assoc($result)) { 
            $asw++;
            ?>
            <tr>
                <td>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap"><?php echo $asw; ?></td>
                        <td class="py-3 px-6 text-left">
                            <a href="view.php?id=<?php echo $row['id']; ?>" class="text-blue-600 hover:text-blue-900"><?php echo $row['judul']; ?></a>
                        </td>
                        <td class="py-3 px-6 text-left"><?php echo $row['penulis']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['tanggal_berita']; ?></td>
                        <td class="py-3 px-6 text-center">
                            <a href="view.php?id=<?php echo $row['id']; ?>" class="text-blue-600 hover:text-blue-900 mr-2">Lihat</a>
                            <a href="update.php?id=<?php echo $row['id']; ?>" class="text-yellow-600 hover:text-yellow-900 mr-2" onclick="return confirm('Apakah Anda yakin ingin mengubah isi dari berita tersebut???')">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini???')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="create.php" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Tambah Berita</a>
    </div>
</body>
</html>