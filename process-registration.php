<?php

$name = trim($_GET['name'] ?? '');

$email = trim($_GET['email'] ?? '');

$phone = trim($_GET['phone'] ?? '');

$studyProgram = trim($_GET['study_program'] ?? '');

$course = $_GET['course'] ?? '';

$participantType = $_GET['participant_type'] ?? '';

$interests = $_GET['interests'] ?? [];

$note = trim($_GET['note'] ?? '');

$source = $_GET['source'] ?? '';

$interestText = implode(', ', $interests);


function e($value): string
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES,
        'UTF-8'
    );
}

?>


<!doctype html>

<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        Hasil Pendaftaran - KursusKu
    </title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>


<body>


<header class="site-header">

    <div class="container nav-wrap">

        <a
            class="brand"
            href="index.php"
        >
            KursusKu
        </a>


        <nav aria-label="Navigasi utama">

            <a href="index.php">
                Beranda
            </a>

            <a href="index.php#katalog">
                Katalog
            </a>

            <a href="registration.php">
                Daftar
            </a>

        </nav>

    </div>

</header>


<main class="container result-page">


    <section class="alert-success">

        <div class="success-icon">
            ✓
        </div>


        <h1>
            Pendaftaran Berhasil!
        </h1>


        <p>
            Data pendaftaran kamu sudah diterima untuk diproses.
        </p>

    </section>



    <section class="summary-card">


        <div class="summary-header">

            <h2>
                Ringkasan Data Pendaftaran
            </h2>


            <p>
                Silakan periksa kembali data yang telah dikirim.
            </p>

        </div>



        <dl class="summary-list">


            <div class="summary-item">

                <dt>
                    Nama
                </dt>

                <dd>
                    <?= e($name) ?>
                </dd>

            </div>



            <div class="summary-item">

                <dt>
                    Email
                </dt>

                <dd>
                    <?= e($email) ?>
                </dd>

            </div>



            <div class="summary-item">

                <dt>
                    Nomor HP
                </dt>

                <dd>
                    <?= e($phone) ?>
                </dd>

            </div>



            <div class="summary-item">

                <dt>
                    Program Studi
                </dt>

                <dd>
                    <?= e($studyProgram) ?>
                </dd>

            </div>



            <div class="summary-item">

                <dt>
                    Kursus
                </dt>

                <dd>
                    <?= e($course) ?>
                </dd>

            </div>



            <div class="summary-item">

                <dt>
                    Jenis Peserta
                </dt>

                <dd>
                    <?= e($participantType) ?>
                </dd>

            </div>



            <div class="summary-item">

                <dt>
                    Minat Tambahan
                </dt>

                <dd>
                    <?= e($interestText ?: 'Tidak ada') ?>
                </dd>

            </div>



            <div class="summary-item">

                <dt>
                    Catatan
                </dt>

                <dd>
                    <?= e($note ?: 'Tidak ada') ?>
                </dd>

            </div>



            <div class="summary-item">

                <dt>
                    Sumber
                </dt>

                <dd>
                    <?= e($source) ?>
                </dd>

            </div>


        </dl>



        <div class="result-actions">


            <a
                class="btn-link"
                href="registration.php"
            >
                ← Kembali ke Form
            </a>


            <a
                class="btn-secondary"
                href="index.php"
            >
                🏠 Ke Beranda
            </a>


        </div>


    </section>


</main>



<footer class="site-footer">

    <p>
        © 2026 KursusKu - Sistem Pendaftaran Kursus
    </p>

</footer>


</body>

</html>