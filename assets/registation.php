<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "registration"
);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama       = $_POST["nama"];
    $email      = $_POST["email"];
    $nim        = $_POST["nim"];
    $jurusan    = $_POST["jurusan"];
    $peserta    = $_POST["peserta"];
    $minat_lain = $_POST["minat_lain"];
    $catatan    = $_POST["catatan"];

    $query = "INSERT INTO peserta
              (nama, email, nim, jurusan, peserta, minat_lain, catatan)
              VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param(
        $stmt,
        "sssssss",
        $nama,
        $email,
        $nim,
        $jurusan,
        $peserta,
        $minat_lain,
        $catatan
    );

    if (mysqli_stmt_execute($stmt)) {
        $pesan = "Registrasi berhasil!";
    } else {
        $pesan = "Registrasi gagal!";
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Registration - randi-kursusku</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #dbeafe;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 50px auto;
        }

        .form-box {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #2563eb;
            margin-bottom: 10px;
        }

        .description {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 15px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #2563eb;
            text-decoration: none;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="form-box">

        <h1>Registration Peserta</h1>

        <p class="description">
            Silakan isi data untuk mendaftar
            di randi-kursusku.
        </p>

        <?php if ($pesan != ""): ?>

            <div class="success">
                <?= htmlspecialchars($pesan) ?>
            </div>

        <?php endif; ?>


        <form method="POST">

            <div class="form-group">

                <label>Nama Lengkap</label>

                <input
                    type="text"
                    name="nama"
                    placeholder="Masukkan nama lengkap"
                    required
                >

            </div>


            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email"
                    required
                >

            </div>


            <div class="form-group">

                <label>NIM</label>

                <input
                    type="text"
                    name="nim"
                    placeholder="Masukkan NIM"
                    required
                >

            </div>


            <div class="form-group">

                <label>Jurusan</label>

                <input
                    type="text"
                    name="jurusan"
                    placeholder="Contoh: Teknik Informatika"
                    required
                >

            </div>


            <div class="form-group">

                <label>Peserta</label>

                <select name="peserta" required>

                    <option value="">
                        -- Pilih Peserta --
                    </option>

                    <option value="Mahasiswa">
                        Mahasiswa
                    </option>

                    <option value="Pelajar">
                        Pelajar
                    </option>

                    <option value="Umum">
                        Umum
                    </option>

                </select>

            </div>


            <div class="form-group">

                <label>Minat Lain</label>

                <input
                    type="text"
                    name="minat_lain"
                    placeholder="Contoh: Web, AI, Database"
                >

            </div>


            <div class="form-group">

                <label>Catatan</label>

                <textarea
                    name="catatan"
                    placeholder="Masukkan catatan..."
                ></textarea>

            </div>


            <button type="submit">
                📝 Daftar Sekarang
            </button>

        </form>


        <a
            href="index.php"
            class="back"
        >
            ← Kembali ke Halaman Utama
        </a>

    </div>

</div>

</body>

</html>
