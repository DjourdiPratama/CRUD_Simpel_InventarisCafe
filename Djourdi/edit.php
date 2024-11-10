<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM inventaris_cafe WHERE id = $id";
    $result = $conn->query($query);
    $barang = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $nilai = $_POST['nilai'];
    $jumlah = $_POST['jumlah'];
    $kondisi_saat_ini = $_POST['kondisi_saat_ini'];
    $lokasi = $_POST['lokasi'];

    $query = "UPDATE inventaris_cafe SET 
              nama_barang='$nama_barang',
              kategori='$kategori',
              tanggal_masuk='$tanggal_masuk',
              nilai='$nilai',
              jumlah='$jumlah',
              kondisi_saat_ini='$kondisi_saat_ini',
              lokasi='$lokasi'
              WHERE id=$id";

    if ($conn->query($query) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Edit Barang</title>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <div class="bg-green-700 text-white py-4 text-center">
        <h1 class="text-3xl font-bold">Pratama Jaya Cafe</h1>
    </div>

    <!-- Form Edit Barang -->
    <div class="max-w-lg mx-auto bg-white p-8 mt-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl font-bold text-gray-700">Edit Inventaris</h1>
    </div>
        <form method="POST" action="" class="space-y-6">
            <input type="hidden" name="id" value="<?php echo $barang['id']; ?>">

            <div>
                <label for="nama_barang" class="block text-gray-700">Nama Barang:</label>
                <input type="text" id="nama_barang" name="nama_barang" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $barang['nama_barang']; ?>" required>
            </div>

            <div>
                <label for="kategori" class="block text-gray-700">Kategori:</label>
                <input type="text" id="kategori" name="kategori" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $barang['kategori']; ?>" required>
            </div>

            <div>
                <label for="tanggal_masuk" class="block text-gray-700">Tanggal Masuk:</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $barang['tanggal_masuk']; ?>" required>
            </div>

            <div>
                <label for="nilai" class="block text-gray-700">Nilai:</label>
                <input type="number" id="nilai" name="nilai" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $barang['nilai']; ?>" required>
            </div>

            <div>
                <label for="jumlah" class="block text-gray-700">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $barang['jumlah']; ?>" required>
            </div>

            <div>
                <label for="kondisi_saat_ini" class="block text-gray-700">Kondisi Saat Ini:</label>
                <input type="text" id="kondisi_saat_ini" name="kondisi_saat_ini" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $barang['kondisi_saat_ini']; ?>" required>
            </div>

            <div>
                <label for="lokasi" class="block text-gray-700">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $barang['lokasi']; ?>" required>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Simpan Perubahan</button>
                <a href="index.php" class="bg-gray-600 text-white py-2 px-6 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">Kembali</a>
            </div>
        </form>
    </div>

</body>
</html>
