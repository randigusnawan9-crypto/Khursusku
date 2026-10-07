<?php

$history_data = [
    [
        "nama" => "Alya Putri",
        "kursus" => "Web Dasar",
        "total" => 240000
    ],
    [
        "nama" => "Bima Saputra",
        "kursus" => "PHP Dasar",
        "total" => 340000
    ],
    [
        "nama" => "Citra Rahma",
        "kursus" => "Laravel Dasar",
        "total" => 500000
    ],
    [
        "nama" => "Dani Akbar",
        "kursus" => "Web Dasar",
        "total" => 480000
    ]
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>History Pendaftaran - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #1e293b;
            background:
                linear-gradient(
                    135deg,
                    #dbeafe 0%,
                    #eff6ff 50%,
                    #e0f2fe 100%
                );
            min-height: 100vh;
        }

        /* =========================
           HEADER
        ========================== */

        header {
            background: linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );
            color: white;
            padding: 18px 0;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.25);
        }

        .header-container {
            width: min(1100px, 92%);
            margin: auto;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            color: white;
            text-decoration: none;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: 0.3px;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 9px 13px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        nav a:hover {
            background: rgba(255, 255, 255, 0.16);
        }

        nav a.active {
            background: white;
            color: #1d4ed8;
        }

        /* =========================
           CONTAINER
        ========================== */

        .container {
            width: min(1100px, 92%);
            margin: 45px auto;
        }

        /* =========================
           HERO
        ========================== */

        .hero {
            background: white;
            border-radius: 22px;
            padding: 35px;
            margin-bottom: 25px;

            border: 1px solid #dbeafe;

            box-shadow:
                0 15px 35px rgba(30, 64, 175, 0.10);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            background: #dbeafe;
            color: #1d4ed8;

            padding: 7px 13px;
            border-radius: 999px;

            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .hero h1 {
            margin: 16px 0 10px;
            color: #0f172a;
            font-size: 34px;
            line-height: 1.2;
        }

        .hero p {
            margin: 0;
            max-width: 750px;

            color: #64748b;
            line-height: 1.7;
            font-size: 15px;
        }

        /* =========================
           HISTORY CARD
        ========================== */

        .history-card {
            background: white;
            border-radius: 22px;
            padding: 28px;

            border: 1px solid #dbeafe;

            box-shadow:
                0 15px 35px rgba(30, 64, 175, 0.10);
        }

        .card-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;

            margin-bottom: 20px;
        }

        .card-heading h2 {
            margin: 0;
            font-size: 21px;
            color: #0f172a;
        }

        .count {
            background: #eff6ff;
            color: #2563eb;

            border: 1px solid #bfdbfe;

            padding: 7px 12px;
            border-radius: 999px;

            font-size: 12px;
            font-weight: 700;
        }

        /* =========================
           TABLE
        ========================== */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        thead {
            background: #eff6ff;
        }

        th {
            padding: 15px 17px;
            text-align: left;

            color: #1d4ed8;
            font-size: 12px;
            font-weight: 800;

            letter-spacing: 0.5px;
            text-transform: uppercase;

            border-bottom: 1px solid #dbeafe;
        }

        td {
            padding: 16px 17px;

            font-size: 14px;
            color: #475569;

            border-bottom: 1px solid #f1f5f9;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr {
            transition: 0.2s ease;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .number {
            width: 60px;

            color: #2563eb;
            font-weight: 800;
        }

        .name {
            color: #0f172a;
            font-weight: 700;
        }

        .course {
            color: #475569;
        }

        .price {
            color: #15803d;
            font-weight: 800;
            white-space: nowrap;
        }

        /* =========================
           INFO NOTE
        ========================== */

        .info-note {
            margin-top: 22px;

            padding: 17px 18px;

            background: #fffbeb;
            border: 1px solid #fde68a;
            border-left: 5px solid #f59e0b;

            border-radius: 13px;

            color: #92400e;
            font-size: 13px;
            line-height: 1.6;
        }

        .info-note strong {
            color: #78350f;
        }

        /* =========================
           BUTTONS
        ========================== */

        .button-group {
            display: flex;
            justify-content: center;
            gap: 12px;

            margin-top: 28px;

            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            min-width: 160px;

            padding: 12px 20px;

            border-radius: 11px;

            text-decoration: none;

            font-size: 14px;
            font-weight: 700;

            transition: 0.2s ease;
        }

        .btn-primary {
            background: #2563eb;
            color: white;

            box-shadow:
                0 5px 12px rgba(37, 99, 235, 0.22);
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: white;
            color: #2563eb;

            border: 1px solid #bfdbfe;
        }

        .btn-secondary:hover {
            background: #eff6ff;
            transform: translateY(-2px);
        }

        /* =========================
           FOOTER
        ========================== */

        footer {
            text-align: center;

            color: #64748b;
            font-size: 13px;

            padding: 5px 20px 30px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 700px) {

            .header-container {
                flex-direction: column;
                align-items: flex-start;
            }

            nav {
                width: 100%;
            }

            nav a {
                font-size: 13px;
            }

            .container {
                margin: 25px auto;
            }

            .hero {
                padding: 25px 20px;
                border-radius: 18px;
            }

            .hero h1 {
                font-size: 27px;
            }

            .history-card {
                padding: 20px;
                border-radius: 18px;
            }

            .card-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <div class="header-container">

            <a href="index.php" class="brand">
                KursusKu
            </a>

            <nav>
                <a href="index.php">Beranda</a>
                <a href="register.php">Daftar</a>
                <a href="history.php" class="active">History</a>
                <a href="loop-lab.php">Loop Lab</a>
            </nav>

        </div>
    </header>


    <!-- MAIN -->
    <main class="container">

        <!-- HERO -->
        <section class="hero">

            <span class="badge">
                📋 ARRAY + FOREACH
            </span>

            <h1>
                History Pendaftaran Dummy
            </h1>

            <p>
                Halaman ini menampilkan contoh data pendaftaran
                menggunakan array dan perulangan <strong>foreach</strong>.
                Data yang ditampilkan masih berupa data dummy dan
                belum menggunakan database.
            </p>

        </section>


        <!-- HISTORY -->
        <section class="history-card">

            <div class="card-heading">

                <h2>
                    📊 Daftar Pendaftaran
                </h2>

                <span class="count">
                    <?= count($history_data); ?> Data
                </span>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kursus</th>
                            <th>Total Pembayaran</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($history_data as $index => $row): ?>

                            <tr>

                                <td class="number">
                                    <?= $index + 1; ?>
                                </td>

                                <td class="name">
                                    <?= e($row['nama']); ?>
                                </td>

                                <td class="course">
                                    <?= e($row['kursus']); ?>
                                </td>

                                <td class="price">
                                    Rp <?= number_format($row['total'], 0, ',', '.'); ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>


            <!-- NOTE -->
            <div class="info-note">
                <strong>💡 Catatan:</strong>
                Data history di atas merupakan data dummy untuk
                latihan <strong>array dan foreach</strong>.
                Halaman ini tidak menggunakan database dan
                bukan merupakan fitur CRUD.
            </div>


            <!-- BUTTONS -->
            <div class="button-group">

                <a href="register.php" class="btn btn-primary">
                    ✏️ Daftar Kursus
                </a>

                <a href="index.php" class="btn btn-secondary">
                    🏠 Beranda
                </a>

            </div>

        </section>

    </main>


    <!-- FOOTER -->
    <footer>
        © <?= date('Y'); ?> KursusKu · Pertemuan 6
    </footer>

</body>

</html>