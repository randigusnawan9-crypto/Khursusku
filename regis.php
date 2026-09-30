<?php

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama = $_POST["nama"] ?? "";
    $email = $_POST["email"] ?? "";
    $nim = $_POST["nim"] ?? "";
    $jurusan = $_POST["jurusan"] ?? "";
    $peserta = $_POST["peserta"] ?? "";
    $minat = $_POST["minat"] ?? "";
    $catatan = $_POST["catatan"] ?? "";

    $pesan = "Registrasi berhasil! Terima kasih, " . $nama . ".";
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

    <title>Registration | randi-kursusku</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #dbeafe;
            color: #222;
        }

        header {
            background: #2563eb;
            color: white;
            padding: 20px 8%;
        }

        header h1 {
            margin: 0;
        }

        .container {
            width: 90%;
            max-width: 750px;
            margin: 40px auto;
        }

        .form-box {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        h2 {
            text-align: center;
            color: #2563eb;
            margin-top: 0;
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
            border-radius: 8px;
            font-size: 15px;
            font-family: Arial, sans-serif;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 14px;
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
            margin-top: 20px;
            text-align: center;
            color: #2563eb;
            text-decoration: none;
        }

        .back:hover {
            text-decoration: underline;
        }

        footer {
            margin-top: 30px;
            background: #111827;
            color: white;
            text-align: center;
            padding: 20px;
        }

        @media (max-width: 600px) {

            .container {
                width: 94%;
                margin: 25px auto;
            }

            .form-box {
                padding: 25px;
            }

            header {
                padding: 18px 6%;
            }

        }

    </style>

</head>

<body>

<header>

    <h1>randi-kursusku</h1>

</header>

<div class="container">

    <div class="form-box">

        <h2>Registration Peserta</h2>

        <p class="description">
            Silakan isi data berikut untuk mendaftar
            sebagai peserta kursus.
        </p>

        <?php if ($pesan !== ""): ?>

            <div class="success">
                <?= htmlspecialchars($pesan) ?>
            </div>

        <?php endif; ?>

        <form method="POST" action="">

            <div class="form-group">

                <label for="nama">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    placeholder="Masukkan nama lengkap"
                    required
                >

            </div>

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="contoh@email.com"
                    required
                >

            </div>

            <div class="form-group">

                <label for="nim">
                    NIM
                </label>

                <input
                    type="text"
                    id="nim"
                    name="nim"
                    placeholder="Masukkan NIM"
                    required
                >

            </div>

            <div class="form-group">

                <label for="jurusan">
                    Jurusan
                </label>

                <input
                    type="text"
                    id="jurusan"
                    name="jurusan"
                    placeholder="Contoh: Teknik Informatika"
                    required
                >

            </div>

            <div class="form-group">

                <label for="peserta">
                    Peserta
                </label>

                <select
                    id="peserta"
                    name="peserta"
                    required
                >

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

                <label for="minat">
                    Minat Lain
                </label>

                <input
                    type="text"
                    id="minat"
                    name="minat"
                    placeholder="Contoh: Web Development, AI, Database"
                >

            </div>

            <div class="form-group">

                <label for="catatan">
                    Catatan
                </label>

                <textarea
                    id="catatan"
                    name="catatan"
                    placeholder="Tuliskan catatan atau kebutuhan belajar..."
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

<footer>

    &copy; <?= date("Y") ?> randi-kursusku

</footer>

</body>

</html>