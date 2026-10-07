<?php

$courses = [
    'Web Dasar',
    'PHP Dasar',
    'Laravel Dasar'
];

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
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

    <title>Loop Lab - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>

        /* =====================================================
           LOOP LAB - DESAIN KHUSUS
        ===================================================== */

        body {
            background: linear-gradient(
                135deg,
                #dbeafe 0%,
                #eff6ff 50%,
                #e0f2fe 100%
            );
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .loop-header {
            background: linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );

            color: white;

            padding: 16px 0;

            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.25);
        }

        .loop-header-inner {
            width: min(1100px, 92%);
            margin: 0 auto;

            display: flex;
            justify-content: space-between;
            align-items: center;

            gap: 20px;
        }

        .loop-brand {
            color: white;
            text-decoration: none;

            font-size: 23px;
            font-weight: 800;
        }

        .loop-nav {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .loop-nav a {
            color: white;
            text-decoration: none;

            padding: 8px 13px;

            border-radius: 7px;

            font-size: 14px;
            font-weight: 600;
        }

        .loop-nav a:hover {
            background: rgba(255, 255, 255, 0.18);
        }


        /* =====================================================
           CONTAINER
        ===================================================== */

        .loop-page {
            width: min(1100px, 92%);
            margin: 0 auto;

            padding: 45px 0 55px;
        }


        /* =====================================================
           HERO
        ===================================================== */

        .loop-hero {
            background: white;

            padding: 32px;

            border-radius: 18px;

            border: 1px solid #dbeafe;

            box-shadow:
                0 10px 30px rgba(30, 64, 175, 0.10);

            margin-bottom: 28px;
        }

        .loop-badge {
            display: inline-block;

            padding: 6px 12px;

            border-radius: 999px;

            background: #dbeafe;
            color: #1d4ed8;

            font-size: 12px;
            font-weight: 800;

            letter-spacing: 0.5px;
        }

        .loop-hero h1 {
            margin: 13px 0 8px;

            color: #1e3a8a;

            font-size: 36px;
            line-height: 1.2;
        }

        .loop-hero p {
            margin: 0;

            color: #475569;

            font-size: 16px;
            line-height: 1.7;
        }


        /* =====================================================
           LOOP CARD
        ===================================================== */

        .loop-card {
            display: grid;

            grid-template-columns: 65px 1fr;

            gap: 22px;

            background: white;

            padding: 28px;

            margin-bottom: 22px;

            border: 1px solid #dbeafe;

            border-radius: 18px;

            box-shadow:
                0 8px 24px rgba(30, 64, 175, 0.08);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .loop-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 14px 32px rgba(30, 64, 175, 0.13);
        }


        /* =====================================================
           NOMOR
        ===================================================== */

        .loop-number {
            width: 55px;
            height: 55px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 15px;

            background: linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );

            color: white;

            font-size: 21px;
            font-weight: 800;

            box-shadow:
                0 6px 15px rgba(37, 99, 235, 0.25);
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .loop-content h2 {
            margin: 0 0 8px;

            color: #1e3a8a;

            font-size: 24px;
        }

        .loop-description {
            margin: 0 0 18px;

            color: #64748b;

            font-size: 15px;

            line-height: 1.7;
        }


        /* =====================================================
           HASIL LOOP
        ===================================================== */

        .loop-result {
            background: #f8fafc;

            border: 1px solid #dbeafe;

            border-left: 4px solid #2563eb;

            border-radius: 12px;

            padding: 20px;
        }

        .loop-result h3 {
            margin: 0 0 13px;

            color: #1e40af;

            font-size: 16px;
        }

        .loop-result ol {
            margin: 0;

            padding-left: 25px;
        }

        .loop-result li {
            padding: 6px 0;

            color: #334155;

            font-size: 15px;
        }


        /* =====================================================
           KESIMPULAN
        ===================================================== */

        .loop-conclusion {
            background: #fffbeb;

            border: 1px solid #fde68a;

            border-left: 5px solid #f59e0b;

            border-radius: 16px;

            padding: 26px 28px;

            margin-top: 28px;
        }

        .loop-conclusion h2 {
            margin: 0 0 15px;

            color: #92400e;

            font-size: 23px;
        }

        .loop-conclusion ul {
            margin: 0;

            padding-left: 24px;
        }

        .loop-conclusion li {
            margin-bottom: 9px;

            color: #78350f;

            font-size: 15px;

            line-height: 1.6;
        }

        .loop-conclusion li:last-child {
            margin-bottom: 0;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .loop-buttons {
            display: flex;

            justify-content: center;

            align-items: center;

            gap: 14px;

            margin-top: 28px;
        }

        .loop-buttons a {
            min-width: 190px;

            padding: 13px 22px;

            border-radius: 9px;

            text-align: center;

            text-decoration: none;

            font-weight: 700;

            box-sizing: border-box;

            transition:
                transform 0.2s ease,
                opacity 0.2s ease;
        }

        .loop-buttons a:hover {
            transform: translateY(-2px);

            opacity: 0.92;
        }

        .loop-btn-primary {
            background: linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );

            color: white;

            box-shadow:
                0 5px 15px rgba(37, 99, 235, 0.25);
        }

        .loop-btn-secondary {
            background: white;

            color: #1d4ed8;

            border: 2px solid #2563eb;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .loop-footer {
            text-align: center;

            padding: 22px 15px;

            color: #64748b;

            font-size: 14px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 768px) {

            .loop-header-inner {
                flex-direction: column;

                text-align: center;
            }

            .loop-nav {
                justify-content: center;
            }

            .loop-page {
                width: 92%;

                padding-top: 30px;
            }

            .loop-hero {
                padding: 25px;
            }

            .loop-hero h1 {
                font-size: 30px;
            }

            .loop-card {
                grid-template-columns: 1fr;

                padding: 22px;

                gap: 16px;
            }

            .loop-number {
                width: 48px;
                height: 48px;
            }

            .loop-buttons {
                flex-direction: column;
            }

            .loop-buttons a {
                width: 100%;
            }

        }


        @media (max-width: 480px) {

            .loop-nav {
                gap: 3px;
            }

            .loop-nav a {
                padding: 7px 8px;

                font-size: 12px;
            }

            .loop-hero h1 {
                font-size: 27px;
            }

            .loop-card {
                padding: 18px;
            }

            .loop-content h2 {
                font-size: 21px;
            }

            .loop-result {
                padding: 16px;
            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         HEADER
    ===================================================== -->

    <header class="loop-header">

        <div class="loop-header-inner">

            <a
                href="index.php"
                class="loop-brand"
            >
                KursusKu
            </a>


            <nav class="loop-nav">

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

    <main class="loop-page">


        <!-- HERO -->

        <section class="loop-hero">

            <span class="loop-badge">
                PERTEMUAN 6
            </span>

            <h1>
                Loop Lab
            </h1>

            <p>
                Perbandingan perulangan
                <strong>for</strong>,
                <strong>while</strong>,
                dan <strong>do-while</strong>.
            </p>

        </section>


        <!-- =================================================
             FOR
        ================================================= -->

        <section class="loop-card">

            <div class="loop-number">
                1
            </div>

            <div class="loop-content">

                <h2>
                    Perulangan for
                </h2>

                <p class="loop-description">
                    Digunakan ketika jumlah pengulangan
                    sudah diketahui.
                </p>

                <div class="loop-result">

                    <h3>
                        Hasil perulangan for
                    </h3>

                    <ol>

                        <?php

                        for (
                            $i = 0;
                            $i < count($courses);
                            $i++
                        ):

                        ?>

                            <li>
                                <?= e($courses[$i]) ?>
                            </li>

                        <?php endfor; ?>

                    </ol>

                </div>

            </div>

        </section>


        <!-- =================================================
             WHILE
        ================================================= -->

        <section class="loop-card">

            <div class="loop-number">
                2
            </div>

            <div class="loop-content">

                <h2>
                    Perulangan while
                </h2>

                <p class="loop-description">
                    Perulangan berjalan selama kondisi
                    bernilai benar.
                </p>

                <div class="loop-result">

                    <h3>
                        Hasil perulangan while
                    </h3>

                    <ol>

                        <?php

                        $i = 0;

                        while ($i < count($courses)):

                        ?>

                            <li>
                                <?= e($courses[$i]) ?>
                            </li>

                        <?php

                            $i++;

                        endwhile;

                        ?>

                    </ol>

                </div>

            </div>

        </section>


        <!-- =================================================
             DO-WHILE
        ================================================= -->

        <section class="loop-card">

            <div class="loop-number">
                3
            </div>

            <div class="loop-content">

                <h2>
                    Perulangan do-while
                </h2>

                <p class="loop-description">
                    Blok kode dijalankan minimal satu kali
                    sebelum kondisi diperiksa.
                </p>

                <div class="loop-result">

                    <h3>
                        Hasil perulangan do-while
                    </h3>

                    <ol>

                        <?php

                        $i = 0;

                        if (count($courses) > 0) {

                            do {

                        ?>

                                <li>
                                    <?= e($courses[$i]) ?>
                                </li>

                        <?php

                                $i++;

                            } while ($i < count($courses));

                        }

                        ?>

                    </ol>

                </div>

            </div>

        </section>


        <!-- =================================================
             KESIMPULAN
        ================================================= -->

        <section class="loop-conclusion">

            <h2>
                Kesimpulan
            </h2>

            <ul>

                <li>
                    <strong>for</strong>
                    cocok ketika jumlah perulangan
                    sudah diketahui.
                </li>

                <li>
                    <strong>while</strong>
                    mengecek kondisi sebelum
                    menjalankan perulangan.
                </li>

                <li>
                    <strong>do-while</strong>
                    menjalankan blok minimal satu kali
                    sebelum mengecek kondisi.
                </li>

            </ul>

        </section>


        <!-- =================================================
             BUTTON
        ================================================= -->

        <div class="loop-buttons">

            <a
                href="register.php"
                class="loop-btn-primary"
            >
                Daftar Kursus
            </a>

            <a
                href="index.php"
                class="loop-btn-secondary"
            >
                Kembali ke Beranda
            </a>

        </div>


    </main>


    <!-- =====================================================
         FOOTER
    ===================================================== -->

    <footer class="loop-footer">

        <p>
            &copy; 2026 KursusKu
        </p>

    </footer>


</body>

</html>