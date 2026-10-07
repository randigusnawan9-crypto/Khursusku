<?php
require_once 'data.php';

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pendaftaran Kursus - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* =====================================================
           REGISTER PAGE
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

        .register-header {
            background: linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );

            color: white;

            box-shadow:
                0 4px 15px rgba(30, 64, 175, 0.18);
        }

        .register-header-inner {
            width: min(1100px, 92%);
            min-height: 75px;

            margin: auto;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 25px;
        }

        .register-brand {
            color: white;
            text-decoration: none;

            font-size: 1.45rem;
            font-weight: 800;
        }

        .register-nav {
            display: flex;
            align-items: center;

            gap: 8px;
            flex-wrap: wrap;
        }

        .register-nav a {
            color: white;
            text-decoration: none;

            padding: 9px 14px;

            border-radius: 8px;

            font-weight: 600;

            transition: 0.2s ease;
        }

        .register-nav a:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        /* =====================================================
           HALAMAN
        ===================================================== */

        .register-page {
            width: min(1000px, 92%);

            margin: 45px auto 60px;
        }

        /* =====================================================
           HERO
        ===================================================== */

        .register-hero {
            background: white;

            padding: 35px 30px;

            border-radius: 18px;

            border: 1px solid #bfdbfe;

            box-shadow:
                0 10px 30px rgba(30, 64, 175, 0.08);

            margin-bottom: 25px;
        }

        .register-badge {
            display: inline-block;

            padding: 7px 13px;

            border-radius: 999px;

            background: #dbeafe;
            color: #1d4ed8;

            font-size: 0.82rem;
            font-weight: 800;

            margin-bottom: 12px;
        }

        .register-hero h1 {
            margin: 0 0 10px;

            color: #1e3a8a;

            font-size: 2rem;
        }

        .register-hero p {
            margin: 0;

            color: #64748b;

            line-height: 1.7;
        }

        /* =====================================================
           FORM CARD
        ===================================================== */

        .register-card {
            background: white;

            padding: 30px;

            border-radius: 18px;

            border: 1px solid #dbeafe;

            box-shadow:
                0 10px 30px rgba(30, 64, 175, 0.08);
        }

        /* =====================================================
           FORM GROUP
        ===================================================== */

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label,
        .form-label {
            display: block;

            margin-bottom: 8px;

            color: #1e3a8a;

            font-size: 0.95rem;
            font-weight: 700;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group select,
        .form-group textarea {
            width: 100%;

            box-sizing: border-box;

            padding: 12px 14px;

            border: 1px solid #cbd5e1;

            border-radius: 10px;

            background: white;

            color: #0f172a;

            font-size: 0.95rem;

            outline: none;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .form-group textarea {
            min-height: 120px;

            resize: vertical;
        }

        .form-help {
            margin: 7px 0 0;

            color: #64748b;

            font-size: 0.85rem;

            line-height: 1.5;
        }

        /* =====================================================
           RADIO & CHECKBOX
        ===================================================== */

        .choice-group {
            display: flex;

            flex-wrap: wrap;

            gap: 10px;
        }

        .choice-item {
            display: flex;
            align-items: center;

            gap: 8px;

            padding: 10px 14px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;

            border-radius: 9px;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .choice-item:hover {
            background: #eff6ff;

            border-color: #93c5fd;
        }

        .choice-item input {
            accent-color: #2563eb;
        }

        .choice-item span {
            color: #334155;

            font-weight: 600;

            font-size: 0.92rem;
        }

        /* =====================================================
           FASILITAS
        ===================================================== */

        .facility-card {
            background: #eff6ff;

            border: 1px solid #bfdbfe;

            border-left: 5px solid #2563eb;

            border-radius: 12px;

            padding: 20px;

            margin-top: 5px;
        }

        .facility-card h3 {
            margin: 0 0 12px;

            color: #1e3a8a;

            font-size: 1rem;
        }

        .facility-list {
            margin: 0;

            padding-left: 20px;

            color: #334155;

            line-height: 1.9;
        }

        /* =====================================================
           TOMBOL
        ===================================================== */

        .register-actions {
            margin-top: 30px;

            padding-top: 25px;

            border-top: 1px solid #dbeafe;

            display: flex;

            flex-direction: column;

            align-items: center;

            gap: 15px;
        }

        .register-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 48px;

            padding: 12px 22px;

            box-sizing: border-box;

            border-radius: 10px;

            text-decoration: none;

            font-size: 0.95rem;

            font-weight: 700;

            cursor: pointer;

            transition: all 0.2s ease;
        }

        /* Tombol utama */

        .register-btn-primary {
            width: 100%;

            max-width: 420px;

            border: none;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #1d4ed8
                );

            color: white;

            box-shadow:
                0 5px 14px rgba(37, 99, 235, 0.22);
        }

        .register-btn-primary:hover {
            transform: translateY(-2px);

            box-shadow:
                0 8px 18px rgba(37, 99, 235, 0.30);
        }

        /* Tombol sekunder */

        .secondary-actions {
            display: flex;

            justify-content: center;
            align-items: center;

            gap: 12px;

            flex-wrap: wrap;

            width: 100%;
        }

        .register-btn-secondary {
            min-width: 175px;

            background: white;

            color: #1d4ed8;

            border: 2px solid #2563eb;
        }

        .register-btn-secondary:hover {
            background: #eff6ff;

            transform: translateY(-2px);
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        .register-footer {
            margin-top: 50px;

            padding: 25px 0;

            background: #1e3a8a;

            color: white;

            text-align: center;
        }

        .register-footer p {
            margin: 0;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 768px) {

            .register-header-inner {
                flex-direction: column;

                justify-content: center;

                padding: 18px 0;
            }

            .register-nav {
                justify-content: center;
            }

            .register-page {
                margin-top: 25px;
            }

            .register-hero {
                padding: 28px 20px;
            }

            .register-hero h1 {
                font-size: 1.6rem;
            }

            .register-card {
                padding: 20px;
            }
        }

        @media (max-width: 600px) {

            .choice-group {
                flex-direction: column;
            }

            .choice-item {
                width: 100%;

                box-sizing: border-box;
            }

            .register-btn-primary {
                max-width: none;
            }

            .secondary-actions {
                flex-direction: column;

                gap: 10px;
            }

            .register-btn-secondary {
                width: 100%;

                min-width: 0;
            }
        }

        @media (max-width: 480px) {

            .register-nav a {
                padding: 7px 9px;

                font-size: 0.88rem;
            }

            .register-hero h1 {
                font-size: 1.4rem;
            }
        }
    </style>
</head>

<body>

<!-- =====================================================
     HEADER
===================================================== -->

<header class="register-header">

    <div class="register-header-inner">

        <a href="index.php" class="register-brand">
            KursusKu
        </a>

        <nav class="register-nav">

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

<main class="register-page">

    <!-- HERO -->

    <section class="register-hero">

        <span class="register-badge">
            Pendaftaran Kursus
        </span>

        <h1>
            Mulai belajar bersama KursusKu
        </h1>

        <p>
            Lengkapi data berikut untuk melakukan pendaftaran kursus.
        </p>

    </section>


    <!-- FORM -->

    <section class="register-card">

        <form action="process.php" method="POST">

            <!-- NAMA -->

            <div class="form-group">

                <label for="name">
                    Nama lengkap
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Masukkan nama lengkap"
                    required
                    minlength="3"
                >

            </div>


            <!-- EMAIL -->

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


            <!-- KURSUS -->

            <div class="form-group">

                <label for="course">
                    Pilih kursus
                </label>

                <select
                    id="course"
                    name="course"
                    required
                >

                    <option value="">
                        -- Pilih kursus --
                    </option>

                    <?php foreach ($courses as $code => $course): ?>

                        <option value="<?= e($code) ?>">

                            <?= e($course['title']) ?>
                            -
                            Rp<?= number_format($course['price'], 0, ',', '.') ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <!-- TIPE PESERTA -->

            <div class="form-group">

                <span class="form-label">
                    Tipe peserta
                </span>

                <div class="choice-group">

                    <label class="choice-item">

                        <input
                            type="radio"
                            name="participant_type"
                            value="mahasiswa"
                            required
                        >

                        <span>
                            Mahasiswa
                        </span>

                    </label>


                    <label class="choice-item">

                        <input
                            type="radio"
                            name="participant_type"
                            value="guru"
                        >

                        <span>
                            Guru
                        </span>

                    </label>


                    <label class="choice-item">

                        <input
                            type="radio"
                            name="participant_type"
                            value="umum"
                        >

                        <span>
                            Umum
                        </span>

                    </label>

                </div>

            </div>


            <!-- MINAT -->

            <div class="form-group">

                <span class="form-label">
                    Minat belajar
                </span>

                <p class="form-help">
                    Pilih satu atau beberapa minat. Boleh dikosongkan.
                </p>

                <div class="choice-group">

                    <?php foreach ($interests_list as $code => $label): ?>

                        <label class="choice-item">

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="<?= e($code) ?>"
                            >

                            <span>
                                <?= e($label) ?>
                            </span>

                        </label>

                    <?php endforeach; ?>

                </div>

            </div>


            <!-- METODE -->

            <div class="form-group">

                <label for="method">
                    Metode belajar
                </label>

                <select
                    id="method"
                    name="method"
                    required
                >

                    <option value="">
                        -- Pilih metode --
                    </option>

                    <?php foreach ($methods_list as $code => $label): ?>

                        <option value="<?= e($code) ?>">
                            <?= e($label) ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <!-- JUMLAH PAKET -->

            <div class="form-group">

                <label for="package_count">
                    Jumlah paket
                </label>

                <select
                    id="package_count"
                    name="package_count"
                    required
                >

                    <?php foreach ($packages_list as $value => $label): ?>

                        <option value="<?= e($value) ?>">
                            <?= e($label) ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <!-- CATATAN -->

            <div class="form-group">

                <label for="note">
                    Catatan tambahan
                </label>

                <textarea
                    id="note"
                    name="note"
                    placeholder="Tulis catatan tambahan jika ada..."
                ></textarea>

            </div>


            <!-- FASILITAS -->

            <div class="form-group">

                <span class="form-label">
                    Fasilitas yang didapat
                </span>

                <div class="facility-card">

                    <h3>
                        ✨ Fasilitas peserta
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


            <!-- SOURCE -->

            <input
                type="hidden"
                name="source"
                value="week-06"
            >


            <!-- =================================================
                 TOMBOL
            ================================================= -->

            <div class="register-actions">

                <button
                    type="submit"
                    class="register-btn register-btn-primary"
                >
                    ✓ Proses Pendaftaran
                </button>


                <div class="secondary-actions">

                    <a
                        href="history.php"
                        class="register-btn register-btn-secondary"
                    >
                        📋 History Dummy
                    </a>


                    <a
                        href="loop-lab.php"
                        class="register-btn register-btn-secondary"
                    >
                        🔄 Loop Lab
                    </a>

                </div>

            </div>

        </form>

    </section>

</main>


<!-- =====================================================
     FOOTER
===================================================== -->

<footer class="register-footer">

    <p>
        &copy; <?= date('Y') ?> KursusKu. Semua hak dilindungi.
    </p>

</footer>

</body>

</html>