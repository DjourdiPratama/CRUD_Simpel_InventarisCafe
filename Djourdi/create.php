<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $nilai = floatval($_POST['nilai']);
    $jumlah = intval($_POST['jumlah']);
    $kondisi_saat_ini = mysqli_real_escape_string($conn, $_POST['kondisi_saat_ini']);
    $lokasi = mysqli_real_escape_string($conn, $_POST['lokasi']);

    // Validasi input
    $errors = [];
    if (empty($nama_barang) || strpos($nama_barang, "'") !== false) {
        $errors[] = "Nama barang tidak boleh kosong atau mengandung tanda petik (')";
    }
    if (empty($kategori)) {
        $errors[] = "Kategori tidak boleh kosong.";
    }
    if (empty($tanggal_masuk)) {
        $errors[] = "Tanggal masuk harus diisi.";
    }
    if ($nilai <= 0) {
        $errors[] = "Nilai harus lebih dari 0.";
    }
    if ($jumlah <= 0) {
        $errors[] = "Jumlah harus lebih dari 0.";
    }

    // Jika tidak ada error, masukkan data ke database
    if (empty($errors)) {
        $query = "INSERT INTO inventaris_cafe (nama_barang, kategori, tanggal_masuk, nilai, jumlah, kondisi_saat_ini, lokasi)
                  VALUES ('$nama_barang', '$kategori', '$tanggal_masuk', '$nilai', '$jumlah', '$kondisi_saat_ini', '$lokasi')";

        if ($conn->query($query) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        // Tampilkan notifikasi error
        foreach ($errors as $error) {
            echo "<div class='bg-red-500 text-white p-2 rounded mb-2'>$error</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Tambah Barang</title>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <div class="bg-green-700 text-white py-4 text-center">
        <h1 class="text-3xl font-bold text-white">Pratama Jaya Cafe</h1>
    </div>

    <!-- Form Tambah Barang -->
    <div class="max-w-lg mx-auto bg-white p-8 mt-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl font-bold text-gray-700">Tambah Inventaris</h1>
    </div>
        <form method="POST" action="" class="space-y-6">
            <div>
                <label for="nama_barang" class="block text-gray-700">Nama Barang:</label>
                <input type="text" id="nama_barang" name="nama_barang" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="kategori" class="block text-gray-700">Kategori:</label>
                <input type="text" id="kategori" name="kategori" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="tanggal_masuk" class="block text-gray-700">Tanggal Masuk:</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="nilai" class="block text-gray-700">Nilai (Rp):</label>
                <input type="number" id="nilai" name="nilai" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="jumlah" class="block text-gray-700">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="kondisi_saat_ini" class="block text-gray-700">Kondisi Saat Ini:</label>
                <input type="text" id="kondisi_saat_ini" name="kondisi_saat_ini" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="lokasi" class="block text-gray-700">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Simpan</button>
                <a href="index.php" class="bg-gray-600 text-white py-2 px-6 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">Kembali</a>
            </div>
        </form>
    </div>

</body>
</html>
