<?php

require_once "helpers.php";

// Informasi kursus
$namaKursus = "Dasar Pemrograman PHP";

// Data perhitungan biaya
$hargaAwal = 350000;
$jumlahPeserta = 2;
$persenDiskon = 10;
$biayaAdmin = 25000;

// Hitung subtotal sebelum diskon
$subtotal = $hargaAwal * $jumlahPeserta;

// Hitung harga setelah diskon
$hargaSetelahDiskon = hitungDiskon(
    $subtotal,
    $persenDiskon
);

// Hitung jumlah diskon
$jumlahDiskon = $subtotal - $hargaSetelahDiskon;

// Hitung total akhir setelah biaya admin
$totalAkhir = $hargaSetelahDiskon + $biayaAdmin;

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Kalkulator Biaya - randi-kursusku</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
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
            max-width: 650px;
            margin: 50px auto;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #2563eb;
            margin-top: 0;
        }

        .kursus {
            background: #dbeafe;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .kursus p {
            margin-bottom: 0;
        }

        .baris {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .label {
            color: #555;
        }

        .nilai {
            font-weight: bold;
            text-align: right;
        }

        .diskon {
            color: #16a34a;
        }

        .total {
            margin-top: 20px;
            padding: 20px;
            background: #eff6ff;
            border-radius: 10px;
            text-align: center;
        }

        .total p {
            margin: 0 0 10px;
            color: #555;
        }

        .total h3 {
            margin: 0;
            color: #2563eb;
            font-size: 30px;
        }

        .kembali {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .kembali:hover {
            background: #1d4ed8;
        }

        @media (max-width: 480px) {
            .container {
                margin: 20px auto;
                padding: 15px;
            }

            .card {
                padding: 22px;
            }

            .total h3 {
                font-size: 26px;
            }
        }

    </style>

</head>

<body>

    <header>
        <h1>randi-kursusku</h1>
    </header>

    <div class="container">

        <div class="card">

            <h2>Kalkulator Biaya Kursus</h2>

            <div class="kursus">

                <strong>
                    <?= htmlspecialchars(
                        $namaKursus,
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </strong>

                <p>
                    Jumlah Peserta: <?= $jumlahPeserta ?>
                </p>

            </div>

            <div class="baris">

                <span class="label">
                    Harga per Peserta
                </span>

                <span class="nilai">
                    <?= formatRupiah($hargaAwal) ?>
                </span>

            </div>

            <div class="baris">

                <span class="label">
                    Subtotal
                </span>

                <span class="nilai">
                    <?= formatRupiah($subtotal) ?>
                </span>

            </div>

            <div class="baris">

                <span class="label">
                    Diskon (<?= $persenDiskon ?>%)
                </span>

                <span class="nilai diskon">
                    - <?= formatRupiah($jumlahDiskon) ?>
                </span>

            </div>

            <div class="baris">

                <span class="label">
                    Harga Setelah Diskon
                </span>

                <span class="nilai">
                    <?= formatRupiah($hargaSetelahDiskon) ?>
                </span>

            </div>

            <div class="baris">

                <span class="label">
                    Biaya Admin
                </span>

                <span class="nilai">
                    <?= formatRupiah($biayaAdmin) ?>
                </span>

            </div>

            <div class="total">

                <p>
                    Total Akhir
                </p>

                <h3>
                    <?= formatRupiah($totalAkhir) ?>
                </h3>

            </div>

            <a href="index.php" class="kembali">
                ← Kembali ke Katalog
            </a>

        </div>

    </div>

</body>

</html>