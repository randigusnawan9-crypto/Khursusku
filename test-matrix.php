<?php

declare(strict_types=1);

$siteName = 'KursusKu';
$year = date('Y');

/*
|--------------------------------------------------------------------------
| DATA TEST MATRIX KURSUSKU - PERTEMUAN 6
|--------------------------------------------------------------------------
| Data pengujian berdasarkan Test Matrix Pertemuan 6.
|--------------------------------------------------------------------------
*/

$testMatrix = [

    [
        'no' => 1,
        'scenario' => 'Mahasiswa + Web Dasar + 1 paket',
        'actual' => 'Rp 240.000',
        'expected' => 'Rp 240.000',
        'status' => 'PASS',
    ],

    [
        'no' => 2,
        'scenario' => 'Guru + PHP Dasar + 1 paket',
        'actual' => 'Rp 340.000',
        'expected' => 'Rp 340.000',
        'status' => 'PASS',
    ],

    [
        'no' => 3,
        'scenario' => 'Umum + Laravel Dasar + 1 paket',
        'actual' => 'Rp 500.000',
        'expected' => 'Rp 500.000',
        'status' => 'PASS',
    ],

    [
        'no' => 4,
        'scenario' => 'Mahasiswa + Web Dasar + 2 paket',
        'actual' => 'Rp 480.000',
        'expected' => 'Rp 480.000',
        'status' => 'PASS',
    ],

    [
        'no' => 5,
        'scenario' => 'Nama kosong',
        'actual' => 'Pesan nama wajib diisi',
        'expected' => 'Pesan nama wajib diisi',
        'status' => 'PASS',
    ],

    [
        'no' => 6,
        'scenario' => 'Email tidak valid',
        'actual' => 'Pesan email tidak valid',
        'expected' => 'Pesan email tidak valid',
        'status' => 'PASS',
    ],

    [
        'no' => 7,
        'scenario' => 'Tidak memilih minat',
        'actual' => 'Belum memilih minat, tanpa warning',
        'expected' => 'Belum memilih minat, tanpa warning',
        'status' => 'PASS',
    ],

    [
        'no' => 8,
        'scenario' => 'Pilih 3 minat',
        'actual' => 'Ketiganya tampil',
        'expected' => 'Ketiganya tampil',
        'status' => 'PASS',
    ],

    [
        'no' => 9,
        'scenario' => 'Metode offline',
        'actual' => 'Tatap Muka',
        'expected' => 'Tatap Muka',
        'status' => 'PASS',
    ],

    [
        'no' => 10,
        'scenario' => 'Metode hybrid',
        'actual' => 'Hybrid',
        'expected' => 'Hybrid',
        'status' => 'PASS',
    ],

    [
        'no' => 11,
        'scenario' => 'Buka process.php via GET',
        'actual' => 'Redirect ke register.php',
        'expected' => 'Redirect ke register.php',
        'status' => 'PASS',
    ],

    [
        'no' => 12,
        'scenario' => 'Tambah fasilitas',
        'actual' => 'Item dirender otomatis via foreach',
        'expected' => 'Item dirender otomatis via foreach',
        'status' => 'PASS',
    ],

];


/*
|--------------------------------------------------------------------------
| HELPER
|--------------------------------------------------------------------------
*/

function eTest(string $value): string
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES,
        'UTF-8'
    );
}


/*
|--------------------------------------------------------------------------
| HITUNG HASIL
|--------------------------------------------------------------------------
*/

$totalTest = count($testMatrix);

$totalPass = count(
    array_filter(
        $testMatrix,
        fn(array $test): bool =>
        $test['status'] === 'PASS'
    )
);

$totalFail = count(
    array_filter(
        $testMatrix,
        fn(array $test): bool =>
        $test['status'] === 'FAIL'
    )
);

$percentage = $totalTest > 0
    ? round(($totalPass / $totalTest) * 100)
    : 0;

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Test Matrix - <?= eTest($siteName); ?>
    </title>


    <style>

        /* =====================================================
           KURSUSKU - TEST MATRIX
           STYLE KHUSUS test-matrix.php
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        :root {

            --navy: #2563eb;

            --navy-soft: #17233d;

            --blue: #0284c7;

            --blue-dark: #0369a1;

            --cyan: #38bdf8;

            --cyan-soft: #e0f2fe;

            --background: #f3f8fc;

            --white: #ffffff;

            --text: #24344d;

            --text-soft: #475569;

            --muted: #64748b;

            --border: #d7e2ea;

            --border-soft: #e7eef4;

            --success: #15803d;

            --success-bg: #ecfdf5;

            --danger: #dc2626;

            --danger-bg: #fef2f2;

        }


        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #f4f9fd 0%,
                    #edf7fc 50%,
                    #f7fbfd 100%
                );

            color:
                var(--text);

            line-height:
                1.6;

            min-height:
                100vh;
        }


        a {
            text-decoration: none;
        }


        /* =====================================================
           CONTAINER
        ===================================================== */

        .container {

            width:
                min(
                    1200px,
                    calc(100% - 40px)
                );

            margin:
                0 auto;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {

            background:
                var(--navy);

            border-bottom:
                1px solid rgba(
                    255,
                    255,
                    255,
                    0.08
                );

            box-shadow:
                0 5px 20px rgba(
                    15,
                    23,
                    42,
                    0.12
                );

            position:
                sticky;

            top:
                0;

            z-index:
                100;
        }


        .nav-inner {

            min-height:
                70px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                25px;
        }


        .brand {

            color:
                #ffffff;

            font-size:
                25px;

            font-weight:
                800;

            text-decoration:
                none;

            letter-spacing:
                -0.5px;
        }


        .brand span {

            color:
                var(--cyan);
        }


        .nav-menu {

            display:
                flex;

            align-items:
                center;

            gap:
                28px;
        }


        .nav-menu a {

            color:
                #cbd5e1;

            font-size:
                14px;

            font-weight:
                600;

            padding:
                8px 0;

            position:
                relative;

            transition:
                0.25s;
        }


        .nav-menu a:hover {

            color:
                #ffffff;
        }


        .nav-menu a.active {

            color:
                #ffffff;
        }


        .nav-menu a.active::after {

            content:
                "";

            position:
                absolute;

            left:
                0;

            right:
                0;

            bottom:
                0;

            height:
                2px;

            background:
                var(--cyan);

            border-radius:
                10px;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {

            text-align:
                center;

            padding:
                55px 10px 30px;
        }


        .eyebrow {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            background:
                var(--cyan-soft);

            color:
                var(--blue-dark);

            border:
                1px solid #bae6fd;

            padding:
                7px 15px;

            border-radius:
                999px;

            font-size:
                11px;

            font-weight:
                800;

            letter-spacing:
                0.7px;

            margin-bottom:
                13px;
        }


        .page-header h1 {

            color:
                var(--navy-soft);

            font-size:
                clamp(
                    30px,
                    4vw,
                    40px
                );

            line-height:
                1.2;

            margin-bottom:
                10px;

            letter-spacing:
                -0.5px;
        }


        .page-header p:last-child {

            color:
                var(--muted);

            font-size:
                15px;

            max-width:
                650px;

            margin:
                0 auto;
        }


        /* =====================================================
           TEST CARD
        ===================================================== */

        .test-card {

            width:
                100%;

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.98
                );

            border:
                1px solid
                var(--border-soft);

            border-radius:
                20px;

            padding:
                30px;

            margin:
                0 auto 60px;

            box-shadow:
                0 18px 50px rgba(
                    15,
                    23,
                    42,
                    0.08
                );

            position:
                relative;

            overflow:
                hidden;
        }


        .test-card::before {

            content:
                "";

            position:
                absolute;

            left:
                0;

            right:
                0;

            top:
                0;

            height:
                4px;

            background:
                linear-gradient(
                    90deg,
                    var(--blue-dark),
                    var(--blue),
                    var(--cyan)
                );
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

        .summary {

            display:
                grid;

            grid-template-columns:
                repeat(
                    3,
                    1fr
                );

            gap:
                12px;

            margin-bottom:
                22px;
        }


        .summary-box {

            background:
                #f8fcff;

            border:
                1px solid
                var(--border);

            border-radius:
                12px;

            padding:
                15px;

            text-align:
                center;
        }


        .summary-box span {

            display:
                block;

            color:
                var(--muted);

            font-size:
                11px;

            margin-bottom:
                4px;
        }


        .summary-box strong {

            color:
                var(--blue-dark);

            font-size:
                21px;

            font-weight:
                800;
        }


        .summary-box.pass strong {

            color:
                var(--success);
        }


        .summary-box.fail strong {

            color:
                var(--danger);
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {

            width:
                100%;

            overflow-x:
                auto;

            border:
                1px solid
                var(--border);

            border-radius:
                12px;
        }


        .test-table {

            width:
                100%;

            min-width:
                900px;

            border-collapse:
                collapse;

            font-size:
                13px;
        }


        .test-table th {

            background:
                #ecfaf5;

            color:
                #285c50;

            font-size:
                11px;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                0.4px;

            padding:
                14px 12px;

            text-align:
                left;

            border-bottom:
                1px solid
                #d8ebe5;
        }


        .test-table td {

            padding:
                14px 12px;

            border-bottom:
                1px solid
                #e8eef2;

            color:
                var(--text-soft);

            vertical-align:
                middle;
        }


        .test-table tbody tr:last-child td {

            border-bottom:
                none;
        }


        .test-table tbody tr:hover {

            background:
                #f8fcff;
        }


        .test-table th:first-child,
        .test-table td:first-child {

            width:
                55px;

            text-align:
                center;
        }


        .test-table th:last-child,
        .test-table td:last-child {

            width:
                90px;

            text-align:
                center;
        }


        .scenario {

            font-weight:
                650;

            color:
                #334155;
        }


        .status {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            min-width:
                55px;

            padding:
                5px 11px;

            border-radius:
                999px;

            font-size:
                10px;

            font-weight:
                800;

            letter-spacing:
                0.3px;
        }


        .status-pass {

            background:
                var(--success-bg);

            color:
                var(--success);
        }


        .status-fail {

            background:
                var(--danger-bg);

            color:
                var(--danger);
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .actions {

            display:
                flex;

            justify-content:
                center;

            gap:
                12px;

            margin-top:
                25px;

            flex-wrap:
                wrap;
        }


        .btn {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            min-height:
                45px;

            padding:
                10px 18px;

            border-radius:
                10px;

            font-size:
                13px;

            font-weight:
                750;

            transition:
                0.25s;

            border:
                1px solid
                transparent;
        }


        .btn:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 7px 16px rgba(
                    15,
                    23,
                    42,
                    0.10
                );
        }


        .btn-primary {

            color:
                #ffffff;

            background:
                linear-gradient(
                    135deg,
                    var(--blue-dark),
                    var(--blue)
                );

            border-color:
                var(--blue);
        }


        .btn-secondary {

            color:
                var(--blue-dark);

            background:
                #effaff;

            border-color:
                #8dd8f7;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {

            background:
                var(--navy);

            border-top:
                1px solid rgba(
                    255,
                    255,
                    255,
                    0.06
                );

            color:
                #94a3b8;

            padding:
                24px 0;

            text-align:
                center;
        }


        .footer p {

            font-size:
                12px;
        }


        .footer::before {

            content:
                "";

            display:
                block;

            width:
                50px;

            height:
                2px;

            background:
                var(--cyan);

            margin:
                0 auto 12px;

            border-radius:
                10px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 750px) {

            .container {

                width:
                    calc(100% - 24px);
            }


            .nav-inner {

                min-height:
                    auto;

                padding:
                    16px 0;

                flex-direction:
                    column;

                gap:
                    10px;
            }


            .nav-menu {

                gap:
                    20px;
            }


            .nav-menu a {

                font-size:
                    13px;
            }


            .page-header {

                padding:
                    40px 5px 25px;
            }


            .page-header h1 {

                font-size:
                    29px;
            }


            .test-card {

                padding:
                    18px;

                border-radius:
                    16px;
            }


            .summary {

                grid-template-columns:
                    1fr;
            }


            .actions {

                flex-direction:
                    column;
            }


            .btn {

                width:
                    100%;
            }

        }


        @media (max-width: 380px) {

            .nav-menu {

                gap:
                    14px;
            }


            .nav-menu a {

                font-size:
                    12px;
            }


            .test-card {

                padding:
                    15px;
            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         NAVBAR
    ===================================================== -->

    <header class="navbar">

        <div class="container nav-inner">


            <a
                href="index.php"
                class="brand">

                KursusKu

            </a>


            <nav class="nav-menu">

                <a href="index.php">

                    Beranda

                </a>


                <a href="index.php#katalog">

                    Katalog

                </a>


                <a href="register.php">

                    Daftar

                </a>


                <a
                    href="test-matrix.php"
                    class="active">

                    Test Matrix

                </a>

            </nav>


        </div>

    </header>



    <!-- =====================================================
         MAIN
    ===================================================== -->

    <main class="container">


        <!-- PAGE HEADER -->

        <section class="page-header">

            <p class="eyebrow">

                PERTEMUAN 6 · PENGUJIAN

            </p>


            <h1>

                Test Matrix KursusKu

            </h1>


            <p>

                Pengujian fitur dan fungsi pada website
                pendaftaran kursus KursusKu.

            </p>

        </section>



        <!-- =================================================
             TEST MATRIX
        ================================================= -->

        <section class="test-card">


            <!-- SUMMARY -->

            <div class="summary">


                <div class="summary-box">

                    <span>

                        Total Pengujian

                    </span>


                    <strong>

                        <?= $totalTest; ?>

                    </strong>

                </div>


                <div class="summary-box pass">

                    <span>

                        PASS

                    </span>


                    <strong>

                        <?= $totalPass; ?>

                    </strong>

                </div>


                <div class="summary-box">

                    <span>

                        Persentase Keberhasilan

                    </span>


                    <strong>

                        <?= $percentage; ?>%

                    </strong>

                </div>


            </div>



            <!-- TABLE -->

            <div class="table-wrapper">

                <table class="test-table">


                    <thead>

                        <tr>

                            <th>

                                No

                            </th>


                            <th>

                                Skenario

                            </th>


                            <th>

                                Actual

                            </th>


                            <th>

                                Expected

                            </th>


                            <th>

                                Status

                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <?php foreach ($testMatrix as $test): ?>


                            <tr>


                                <td>

                                    <?= $test['no']; ?>

                                </td>


                                <td class="scenario">

                                    <?= eTest(
                                        $test['scenario']
                                    ); ?>

                                </td>


                                <td>

                                    <?= eTest(
                                        $test['actual']
                                    ); ?>

                                </td>


                                <td>

                                    <?= eTest(
                                        $test['expected']
                                    ); ?>

                                </td>


                                <td>


                                    <span
                                        class="status <?= $test['status'] === 'PASS'
                                            ? 'status-pass'
                                            : 'status-fail'; ?>">

                                        <?= eTest(
                                            $test['status']
                                        ); ?>

                                    </span>


                                </td>


                            </tr>


                        <?php endforeach; ?>


                    </tbody>

                </table>

            </div>



            <!-- ACTION -->

            <div class="actions">


                <a
                    href="index.php"
                    class="btn btn-primary">

                    Kembali ke Beranda

                </a>


                <a
                    href="register.php"
                    class="btn btn-secondary">

                    Buka Pendaftaran

                </a>


            </div>


        </section>


    </main>



    <!-- =====================================================
         FOOTER
    ===================================================== -->

    <footer class="footer">

        <div class="container">


            <p>

                &copy;
                <?= eTest($year); ?>

                <?= eTest($siteName); ?>.

                Belajar Teknologi, Bangun Masa Depan.

            </p>


        </div>

    </footer>


</body>

</html>