<?php
include 'db.php';

$query = "SELECT * FROM inventaris_cafe";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Inventaris Cafe</title>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <div class="bg-green-700 text-black shadow-md py-4 text-center">
        <h1 class="text-3xl font-bold text-white">Pratama Jaya Cafe</h1>
    </div>

    <div class="max-w-screen-lg mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-700">Daftar Inventaris</h1>
            <a href="create.php" class="bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Tambah Barang</a>
        </div>
        <!-- Daftar Barang -->
                <div class="overflow-x-auto mt-10">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-green-200">
                            <tr>
                                <th class="px-6 py-4 text-center">Nama Barang</th>
                                <th class="px-6 py-4 text-center">Kategori</th>
                                <th class="px-6 py-4 text-center">Tanggal Masuk</th>
                                <th class="px-6 py-4 text-center">Nilai (Rupiah)</th>
                                <th class="px-6 py-4 text-center">Jumlah</th>
                                <th class="px-6 py-4 text-center">Kondisi</th>
                                <th class="px-6 py-4 text-center">Lokasi</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td class="px-6 py-4"><?php echo $row['nama_barang']; ?></td>
                                    <td class="px-6 py-4"><?php echo $row['kategori']; ?></td>
                                    <td class="px-6 py-4"><?php echo $row['tanggal_masuk']; ?></td>
                                    <td class="px-6 py-4"><?php echo $row['nilai']; ?></td>
                                    <td class="px-6 py-4"><?php echo $row['jumlah']; ?></td>
                                    <td class="px-6 py-4"><?php echo $row['kondisi_saat_ini']; ?></td>
                                    <td class="px-6 py-4"><?php echo $row['lokasi']; ?></td>
                                    <td class="px-6 py-4">
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-blue-600 hover:text-blue-700">Edit</a>
                                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="text-red-600 hover:text-red-700">Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
    </div>
</body>
</html>
