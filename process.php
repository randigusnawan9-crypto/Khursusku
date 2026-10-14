<?php
require_once 'data.php';

// Pastikan halaman diakses menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

// Ambil dan validasi data wajib
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$course = $_POST['course'] ?? '';

if (
    $name === '' ||
    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    $course === ''
) {
    http_response_code(422);
    exit('Data pendaftaran tidak valid. Periksa nama, email, dan kursus.');
}

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}


$participantType = $_POST['participant_type'] ?? '';
$interests = $_POST['interests'] ?? [];
$method = $_POST['method'] ?? '';
$packageCount = (int) ($_POST['package_count'] ?? 1);
$note = trim($_POST['note'] ?? '');

if (!is_array($interests)) {
    $interests = [];
}

/* =========================
   DATA KURSUS
========================= */

$courseData = $courses[$course] ?? null;

if ($courseData === null) {
    die('Kursus tidak ditemukan.');
}

$courseTitle = $courseData['title'];
$coursePrice = (int) $courseData['price'];

/* =========================
   PERHITUNGAN
========================= */

$subtotal = $coursePrice * $packageCount;

/* =========================
   DISKON PESERTA
========================= */

$discountPercent = 0;

if ($participantType === 'mahasiswa') {
    $discountPercent = 20;
} elseif ($participantType === 'guru') {
    $discountPercent = 15;
} elseif ($participantType === 'umum') {
    $discountPercent = 0;
}

$discountAmount = $subtotal * ($discountPercent / 100);

$totalPayment = $subtotal - $discountAmount;

/* =========================
   LABEL PESERTA
========================= */

$participantLabels = [
    'mahasiswa' => 'Mahasiswa',
    'guru' => 'Guru',
    'umum' => 'Umum'
];

$participantLabel =
    $participantLabels[$participantType]
    ?? 'Tidak diketahui';

/* =========================
   LABEL METODE
========================= */

$methodLabel =
    $methods_list[$method]
    ?? 'Tidak diketahui';

/* =========================
   MINAT BELAJAR
========================= */

$interestLabels = [];

foreach ($interests as $interest) {

    if (isset($interests_list[$interest])) {

        $interestLabels[] =
            $interests_list[$interest];
    }
}

$interestText = !empty($interestLabels)
    ? implode(', ', $interestLabels)
    : 'Tidak ada minat yang dipilih';

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Hasil Pendaftaran - KursusKu</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

    <style>

        /* =====================================================
           BACKGROUND
        ===================================================== */

        body {
            background:
                linear-gradient(
                    135deg,
                    #dbeafe 0%,
                    #eff6ff 50%,
                    #e0f2fe 100%
                );
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .result-header {
            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #1d4ed8
                );

            color: white;

            box-shadow:
                0 4px 15px rgba(30, 64, 175, 0.18);
        }


        .result-header-inner {
            width: min(1100px, 92%);

            min-height: 75px;

            margin: auto;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;
        }


        .result-brand {
            color: white;

            text-decoration: none;

            font-size: 1.45rem;

            font-weight: 800;
        }


        .result-nav {
            display: flex;

            align-items: center;

            gap: 8px;

            flex-wrap: wrap;
        }


        .result-nav a {
            color: white;

            text-decoration: none;

            padding: 9px 14px;

            border-radius: 8px;

            font-weight: 600;

            transition: 0.2s ease;
        }


        .result-nav a:hover {
            background:
                rgba(255, 255, 255, 0.15);
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .result-page {
            width: min(1050px, 92%);

            margin: 45px auto 60px;
        }


        /* =====================================================
           SUCCESS
        ===================================================== */

        .result-success {
            background: white;

            border-radius: 18px;

            padding: 35px 30px;

            text-align: center;

            border: 1px solid #bfdbfe;

            box-shadow:
                0 12px 35px
                rgba(30, 64, 175, 0.10);

            margin-bottom: 25px;
        }


        .success-icon {
            width: 65px;

            height: 65px;

            margin:
                0 auto 15px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #dcfce7;

            color: #16a34a;

            font-size: 2rem;

            font-weight: 800;
        }


        .result-success h1 {
            margin: 0 0 8px;

            color: #1e3a8a;

            font-size: 2rem;
        }


        .result-success p {
            margin: 0;

            color: #64748b;

            line-height: 1.6;
        }


        /* =====================================================
           CARD
        ===================================================== */

        .result-card {
            background: white;

            border-radius: 18px;

            padding: 28px;

            border: 1px solid #dbeafe;

            box-shadow:
                0 10px 30px
                rgba(30, 64, 175, 0.08);

            margin-bottom: 25px;
        }


        .result-card h2 {
            margin: 0 0 22px;

            color: #1e3a8a;

            font-size: 1.35rem;
        }


        /* =====================================================
           GRID
        ===================================================== */

        .result-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 18px;
        }


        .info-box {
            background: #f8fafc;

            border: 1px solid #e2e8f0;

            border-radius: 12px;

            padding: 18px;
        }


        .info-label {
            display: block;

            margin-bottom: 7px;

            color: #64748b;

            font-size: 0.82rem;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 0.04em;
        }


        .info-value {
            color: #0f172a;

            font-size: 1rem;

            font-weight: 700;

            word-break: break-word;
        }


        /* =====================================================
           MINAT & FASILITAS
        ===================================================== */

        .interest-box {
            background: #eff6ff;

            border: 1px solid #bfdbfe;

            border-left: 5px solid #2563eb;

            border-radius: 12px;

            padding: 18px;
        }


        .interest-box h3 {
            margin: 0 0 10px;

            color: #1e3a8a;

            font-size: 1rem;
        }


        .interest-box p {
            margin: 0;

            color: #334155;

            line-height: 1.7;
        }


        .facility-list {
            margin: 0;

            padding-left: 20px;

            color: #334155;

            line-height: 1.9;
        }


        /* =====================================================
           PEMBAYARAN
        ===================================================== */

        .payment-card {
            background: white;

            border-radius: 18px;

            padding: 28px;

            border: 1px solid #bfdbfe;

            box-shadow:
                0 10px 30px
                rgba(30, 64, 175, 0.08);

            margin-bottom: 25px;
        }


        .payment-card h2 {
            margin: 0 0 20px;

            color: #1e3a8a;

            font-size: 1.35rem;
        }


        .payment-list {
            display: flex;

            flex-direction: column;

            gap: 0;
        }


        .payment-row {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            padding: 15px 0;

            border-bottom:
                1px solid #e2e8f0;
        }


        .payment-label {
            color: #64748b;

            font-weight: 600;
        }


        .payment-value {
            color: #0f172a;

            font-weight: 700;

            text-align: right;
        }


        .discount-value {
            color: #16a34a;
        }


        /* =====================================================
           TOTAL
        ===================================================== */

        .total-row {
            margin-top: 12px;

            padding: 20px;

            border:
                1px solid #bfdbfe;

            border-radius: 12px;

            background: #eff6ff;
        }


        .total-row .payment-label {
            color: #1e3a8a;

            font-size: 1.05rem;

            font-weight: 800;
        }


        .total-row .payment-value {
            color: #1d4ed8;

            font-size: 1.35rem;

            font-weight: 800;
        }


        /* =====================================================
           CATATAN
        ===================================================== */

        .note-card {
            background: #fffbeb;

            border:
                1px solid #fde68a;

            border-left:
                5px solid #f59e0b;

            border-radius: 14px;

            padding: 20px;

            margin-bottom: 30px;
        }


        .note-card h3 {
            margin: 0 0 8px;

            color: #92400e;

            font-size: 1rem;
        }


        .note-card p {
            margin: 0;

            color: #78350f;

            line-height: 1.7;

            white-space: pre-wrap;
        }


        /* =====================================================
           BUTTON AREA
        ===================================================== */

        .result-actions {
            display: flex;

            justify-content: center;

            align-items: stretch;

            gap: 12px;

            flex-wrap: wrap;

            margin-top: 30px;
        }


        .result-btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-width: 190px;

            min-height: 48px;

            padding: 12px 20px;

            box-sizing: border-box;

            border-radius: 10px;

            text-decoration: none;

            font-size: 0.93rem;

            font-weight: 700;

            transition: all 0.2s ease;
        }


        /* =====================================================
           DAFTAR LAGI
        ===================================================== */

        .result-btn-primary {
            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #1d4ed8
                );

            color: white;

            border:
                2px solid #2563eb;

            box-shadow:
                0 5px 14px
                rgba(37, 99, 235, 0.22);
        }


        .result-btn-primary:hover {
            transform:
                translateY(-2px);

            box-shadow:
                0 8px 18px
                rgba(37, 99, 235, 0.30);
        }


        /* =====================================================
           HISTORY
        ===================================================== */

        .result-btn-history {
            background: white;

            color: #475569;

            border:
                2px solid #94a3b8;
        }


        .result-btn-history:hover {
            background: #f1f5f9;

            border-color: #64748b;

            transform:
                translateY(-2px);
        }


        /* =====================================================
           BERANDA
        ===================================================== */

        .result-btn-secondary {
            background: white;

            color: #1d4ed8;

            border:
                2px solid #2563eb;
        }


        .result-btn-secondary:hover {
            background: #eff6ff;

            transform:
                translateY(-2px);
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .result-footer {
            margin-top: 50px;

            padding: 25px 0;

            background: #1e3a8a;

            color: white;

            text-align: center;
        }


        .result-footer p {
            margin: 0;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 850px) {

            .result-actions {
                flex-direction: column;

                align-items: stretch;
            }


            .result-btn {
                width: 100%;

                min-width: 0;
            }
        }


        @media (max-width: 768px) {

            .result-header-inner {
                flex-direction: column;

                justify-content: center;

                padding: 18px 0;
            }


            .result-nav {
                justify-content: center;
            }


            .result-page {
                margin-top: 25px;
            }


            .result-success {
                padding: 28px 20px;
            }


            .result-success h1 {
                font-size: 1.6rem;
            }


            .result-card,
            .payment-card {
                padding: 20px;
            }


            .result-grid {
                grid-template-columns: 1fr;
            }


            .payment-row {
                align-items: flex-start;

                flex-direction: column;

                gap: 6px;
            }


            .payment-value {
                text-align: left;
            }


            .total-row {
                flex-direction: row;

                align-items: center;
            }
        }


        @media (max-width: 480px) {

            .result-nav a {
                padding: 7px 9px;

                font-size: 0.88rem;
            }


            .result-success h1 {
                font-size: 1.4rem;
            }


            .success-icon {
                width: 55px;

                height: 55px;

                font-size: 1.7rem;
            }


            .total-row {
                flex-direction: column;

                align-items: flex-start;

                gap: 8px;
            }
        }

    </style>

</head>


<body>


<!-- =====================================================
     HEADER
===================================================== -->

<header class="result-header">

    <div class="result-header-inner">

        <a
            href="index.php"
            class="result-brand"
        >
            KursusKu
        </a>


        <nav class="result-nav">

            <a href="index.php">
                Beranda
            </a>

            <a href="register.php">
                Daftar
            </a>

            <a href="history.php">
                History
            </a>

            <a href="loop-lab.php">
                Loop Lab
            </a>

        </nav>

    </div>

</header>


<!-- =====================================================
     MAIN
===================================================== -->

<main class="result-page">


    <!-- =================================================
         SUCCESS
    ================================================== -->

    <section class="result-success">

        <div class="success-icon">
            ✓
        </div>


        <h1>
            Pendaftaran Berhasil!
        </h1>


        <p>
            Berikut adalah ringkasan data pendaftaran kamu.
        </p>

    </section>


    <!-- =================================================
         DATA PESERTA
    ================================================== -->

    <section class="result-card">

        <h2>
            👤 Data Peserta
        </h2>


        <div class="result-grid">


            <div class="info-box">

                <span class="info-label">
                    Nama
                </span>

                <div class="info-value">
                    <?= e($name) ?>
                </div>

            </div>


            <div class="info-box">

                <span class="info-label">
                    Email
                </span>

                <div class="info-value">
                    <?= e($email) ?>
                </div>

            </div>


            <div class="info-box">

                <span class="info-label">
                    Tipe Peserta
                </span>

                <div class="info-value">
                    <?= e($participantLabel) ?>
                </div>

            </div>


        </div>

    </section>


    <!-- =================================================
         DETAIL KURSUS
    ================================================== -->

    <section class="result-card">

        <h2>
            📚 Detail Kursus
        </h2>


        <div class="result-grid">


            <div class="info-box">

                <span class="info-label">
                    Kursus
                </span>

                <div class="info-value">
                    <?= e($courseTitle) ?>
                </div>

            </div>


            <div class="info-box">

                <span class="info-label">
                    Harga per paket
                </span>

                <div class="info-value">
                    Rp<?= number_format(
                        $coursePrice,
                        0,
                        ',',
                        '.'
                    ) ?>
                </div>

            </div>


            <div class="info-box">

                <span class="info-label">
                    Jumlah paket
                </span>

                <div class="info-value">
                    <?= e($packageCount) ?>
                </div>

            </div>


            <div class="info-box">

                <span class="info-label">
                    Metode belajar
                </span>

                <div class="info-value">
                    <?= e($methodLabel) ?>
                </div>

            </div>


        </div>

    </section>


    <!-- =================================================
         MINAT & FASILITAS
    ================================================== -->

    <section class="result-card">

        <h2>
            ⭐ Minat & Fasilitas
        </h2>


        <div class="result-grid">


            <div class="interest-box">

                <h3>
                    Minat Belajar
                </h3>


                <p>
                    <?= e($interestText) ?>
                </p>

            </div>


            <div class="interest-box">

                <h3>
                    Fasilitas
                </h3>


                <ul class="facility-list">

                    <?php foreach ($facilities_list as $facility): ?>

                        <li>
                            <?= e($facility) ?>
                        </li>

                    <?php endforeach; ?>

                </ul>

            </div>


        </div>

    </section>


    <!-- =================================================
         PEMBAYARAN
    ================================================== -->

    <section class="payment-card">

        <h2>
            💰 Rincian Pembayaran
        </h2>


        <div class="payment-list">


            <div class="payment-row">

                <span class="payment-label">
                    Harga per paket
                </span>

                <span class="payment-value">
                    Rp<?= number_format(
                        $coursePrice,
                        0,
                        ',',
                        '.'
                    ) ?>
                </span>

            </div>


            <div class="payment-row">

                <span class="payment-label">
                    Jumlah paket
                </span>

                <span class="payment-value">
                    <?= e($packageCount) ?>
                </span>

            </div>


            <div class="payment-row">

                <span class="payment-label">
                    Subtotal
                </span>

                <span class="payment-value">
                    Rp<?= number_format(
                        $subtotal,
                        0,
                        ',',
                        '.'
                    ) ?>
                </span>

            </div>


            <div class="payment-row">

                <span class="payment-label">
                    Diskon
                </span>

                <span class="payment-value discount-value">

                    <?= $discountPercent ?>%

                    (Rp<?= number_format(
                        $discountAmount,
                        0,
                        ',',
                        '.'
                    ) ?>)

                </span>

            </div>


            <div class="payment-row total-row">

                <span class="payment-label">
                    Total Pembayaran
                </span>

                <span class="payment-value">

                    Rp<?= number_format(
                        $totalPayment,
                        0,
                        ',',
                        '.'
                    ) ?>

                </span>

            </div>


        </div>

    </section>


    <!-- =================================================
         CATATAN
    ================================================== -->

    <section class="note-card">

        <h3>
            📝 Catatan
        </h3>


        <p><?= e(
            $note ?: 'Tidak ada catatan.'
        ) ?></p>

    </section>


    <!-- =================================================
         TOMBOL NAVIGASI
    ================================================== -->

    <div class="result-actions">


        <!-- DAFTAR LAGI -->

        <a
            href="register.php"
            class="result-btn result-btn-primary"
        >
            ← Daftar Lagi
        </a>


        <!-- HISTORY DUMMY -->

        <a
            href="history.php"
            class="result-btn result-btn-history"
        >
            📋 Lihat History Dummy
        </a>


        <!-- BERANDA -->

        <a
            href="index.php"
            class="result-btn result-btn-secondary"
        >
            🏠 Kembali ke Beranda
        </a>


    </div>


</main>


<!-- =====================================================
     FOOTER
===================================================== -->

<footer class="result-footer">

    <p>
        &copy; <?= date('Y') ?> KursusKu. Semua hak dilindungi.
    </p>

</footer>


</body>

</html>