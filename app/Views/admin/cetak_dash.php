<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css'); ?>">
    <title>PJB UBJOM PLTMG ARUN</title>
    <style>
        /* General styles */
        @media print {
            .print {
                display: none;
            }
        }

        figure {
            margin: 0;
        }

        .table img {
            width: 90px;
            height: 85px;
            padding: 2px
        }

        img {
            width: 100%;
            display: block;
            margin: 0 auto;
        }

        .page p {
            text-align: justify;
            font-size: 14px;
        }

        .page p:first-child {
            margin-top: 0;
        }

        table, th, td{
            border: 1px solid black;
        }
        th, td{
            padding: 10px;
        }
        

        .header {
            width: 100%;
            margin-bottom: 20px;
        }

        .header td {
            width: 40%;
        }

        .table table {
            width: 100%;
        }

        .table td,
        .table th {
            border: 2px solid black;
            padding: 0 10px 0 10px;
        }

        .table th {
            text-align: center;
            font-size: 14px;
        }

        .table td {
            font-size: 12px;
        }

        h1,
        h2,
        h4,
        h4,
        h5 {
            font-weight: bold;
            font-size: 20px;
        }


        /* Printing styles */
        @page {
            size: A4;
        }
    </style>
</head>

<body onload="window.print()">
    <h1 style="margin-bottom: 80px;text-align:center;font-weight: bold;font-size: 40px;">Laporan Pembuatan Dokumen<br>Instruksi Kerja</h1>
    <!-- <div style="page-break-after: always;"></div> -->
    <table border="1" style="width:100%;">
        <thead class="header">
            <tr>
                <th scope="col">
                    <h2>No</h2>
                </th>
                <th scope="col">
                    <h2>No Dokumen</h2>
                </th>
                <th scope="col">
                    <h2>
                        Judul
                    </h2>
                </th>
                <th scope="col">
                    <h2>Tanggal Ditetapkan</h2>
                </th>
                <th scope="col">
                    <h2>Penulis</h2>
                </th>

            </tr>
        </thead>
        <tbody class="page">
            <?php foreach ($data as $key => $ik) : ?>
                <tr>
                    <th scope="row">
                        <h2><?= $key + 1 ?></h2>
                    </th>
                    <td>
                        <h2>&ensp;<?= $ik['no_ik']; ?></h2>
                    </td>
                    <td>
                        <h2 style="margin-top: -15px;">&ensp;<?= $ik['judul']; ?></h2>
                    </td>
                    <td>
                        <h2>&ensp;<?= $ik['tgl_ditetapkan']; ?></h2>
                    </td>
                    <td>
                        <h2>&ensp;<?= $ik['disusun']; ?></h2>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>