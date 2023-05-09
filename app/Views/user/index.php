<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-size: 12px;
        text-align: center;
        margin: 10px 0;
        font-weight: bold;
    }

    .table th,
    .table td {
        border: 1px solid black;
        font-size: 7px;
    }

    @page {
        size: A4;
    }
</style>

<div class="home-content">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif ?>

    <?php
    $tes = count($data);
    $dataPoints = array(
        array("y" => $tdk_disetujui, "label" => "Belum Disetujui"),
        array("y" => $disetujui, "label" => "Disetujui"),
    );

    ?>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>

    <body onload="window.print()">
        <table class="table">
            <thead>
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
                    <th scope="col">
                        <h2>Action</h2>
                    </th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
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
                        <td>
                            <div class="d-flex mt-2">
                                <a href="javascript:;" data-slug="<?php echo $ik['slug'] ?>" data-judul="<?php echo strip_tags($ik['judul']) ?>" data-no_ik="<?php echo $ik['no_ik'] ?>" data-tgl_ditetapkan="<?php echo $ik['tgl_ditetapkan'] ?>" data-tgl_diperbarui="<?php echo $ik['tgl_diperbarui'] ?>" data-tgl_terbit="<?php echo $ik['tgl_terbit'] ?>" data-no_revisi="<?php echo $ik['no_revisi'] ?>" data-revisi="<?php echo htmlentities($ik['revisi']) ?>" data-disusun="<?php echo $ik['disusun'] ?>" data-manajer="<?php echo 'Manajer ', $ik['nama'] ?>" data-tujuan="<?php echo htmlentities($ik['tujuan']) ?>" data-lingkup="<?php echo htmlentities($ik['ruang_lingkup']) ?>" data-definisi="<?php echo htmlentities($ik['definisi']) ?>" data-pendukung="<?php echo htmlentities($ik['terkait_pendukung']) ?>" data-referensi="<?php echo htmlentities($ik['terkait_referensi']) ?>" data-perizinan="<?php echo htmlentities($ik['terkait_perizinan']) ?>" data-teknik="<?php echo htmlentities($ik['terkait_teknik']) ?>" data-sdm="<?php echo htmlentities($ik['sumber_sdm']) ?>" data-tools="<?php echo htmlentities($ik['sumber_tools']) ?>" data-material="<?php echo htmlentities($ik['sumber_material']) ?>" data-identifikasi="<?php echo htmlentities($ik['risiko_identifikasi']) ?>" data-mitigasi="<?php echo htmlentities($ik['risiko_mitigasi']) ?>" data-parameter="<?php echo htmlentities($ik['parameter']) ?>" data-aktivitas="<?php echo htmlentities($ik['detail_aktivitas']) ?>" data-formulir="<?php echo htmlentities($ik['formulir']) ?>" data-lampiran="<?php echo htmlentities($ik['lampiran']) ?>" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class='bx bx-file fs-6'></i></a>
                                <?php if (in_groups('admin')) : ?>
                                    <form action="<?= base_url('deleteik/' . $ik['id']); ?>" method="POST" class="flex-column d-flex ms-3" role="group" style="width:100%;">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="border border-0 bg-transparent" type="submit" onclick="return confirm('Apakah Anda Yakin?');">
                                            <i class='bx bx-trash fs-6 text-danger'></i></button>
                                    </form>
                                <?php endif; ?>
                            </div>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <?php if (in_groups('admin')) : ?>
            <div class="modal-footer">
                <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                    <form action="<?= base_url('user/cetak2'); ?>" method="POST" class="me-md-2">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="slug" id="cetak">
                        <button type="submit" class="btn btn-secondary">Cetak</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </body>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Dokumen Instruksi Kerja"
                },
                axisY: {
                    title: "Jumlah Dokumen"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## tonnes",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
    <?= $this->include('user/preview'); ?>
    <?= $this->endSection(); ?>