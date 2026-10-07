<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}

$name = trim($_POST['name'] ?? '');

$email = trim($_POST['email'] ?? '');

$phone = trim($_POST['phone'] ?? '');

$studyProgram = trim($_POST['study_program'] ?? '');

$course = $_POST['course'] ?? '';

$participantType = $_POST['participant_type'] ?? '';

$interests = $_POST['interests'] ?? [];

$note = trim($_POST['note'] ?? '');

$source = $_POST['source'] ?? '';


if (!is_array($interests)) {
    $interests = [];
}


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


    <!-- Pesan berhasil -->

    <section class="alert-success">

        <div class="success-icon">
            ✓
        </div>

        <h1>
            Pendaftaran Berhasil!
        </h1>

        <p>
            Data pendaftaran Anda telah berhasil diterima.
        </p>

    </section>


    <!-- Ringkasan -->

    <section class="summary-card">

        <h2>
            Ringkasan Pendaftaran
        </h2>


        <dl class="summary-list">


            <!-- Nama -->

            <div class="summary-item">

                <dt>
                    Nama Lengkap
                </dt>

                <dd>
                    <?= e($name) ?>
                </dd>

            </div>


            <!-- Email -->

            <div class="summary-item">

                <dt>
                    Email
                </dt>

                <dd>
                    <?= e($email) ?>
                </dd>

            </div>


            <!-- Nomor HP -->

            <div class="summary-item">

                <dt>
                    Nomor HP
                </dt>

                <dd>
                    <?= e($phone) ?>
                </dd>

            </div>


            <!-- Program Studi -->

            <div class="summary-item">

                <dt>
                    Program Studi
                </dt>

                <dd>
                    <?= e($studyProgram) ?>
                </dd>

            </div>


            <!-- Kursus -->

            <div class="summary-item">

                <dt>
                    Kursus
                </dt>

                <dd>
                    <?= e($course) ?>
                </dd>

            </div>


            <!-- Jenis Peserta -->

            <div class="summary-item">

                <dt>
                    Jenis Peserta
                </dt>

                <dd>
                    <?= e($participantType) ?>
                </dd>

            </div>


            <!-- Minat -->

            <div class="summary-item">

                <dt>
                    Minat Tambahan
                </dt>

                <dd>
                    <?= e($interestText ?: '-') ?>
                </dd>

            </div>


            <!-- Catatan -->

            <div class="summary-item">

                <dt>
                    Catatan
                </dt>

                <dd>
                    <?= e($note ?: '-') ?>
                </dd>

            </div>


            <!-- Source -->

            <div class="summary-item">

                <dt>
                    Source
                </dt>

                <dd>
                    <?= e($source) ?>
                </dd>

            </div>


        </dl>

    </section>


    <!-- Tombol -->

    <div class="result-actions">

        <a
            href="registration.php"
            class="btn-primary"
        >
            Daftar Lagi
        </a>


        <a
            href="index.php"
            class="btn-secondary"
        >
            Kembali ke Beranda
        </a>

    </div>


</main>


<footer class="site-footer">

    <div class="container">

        <p>
            &copy; <?= date('Y') ?> KursusKu.
            Semua hak dilindungi.
        </p>

    </div>

</footer>


</body>

</html>