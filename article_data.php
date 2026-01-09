<?php
include "koneksi.php";

$limit = 3;
$hlm = (isset($_POST['hlm']) && $_POST['hlm'] > 0) ? $_POST['hlm'] : 1;
$limit_start = ($hlm - 1) * $limit;

$sql_article = "SELECT * FROM article ORDER BY tanggal DESC LIMIT $limit_start, $limit";
$result_article = $conn->query($sql_article);

$sql_total = "SELECT * FROM article";
$result_total = $conn->query($sql_total);
$total_data = $result_total->num_rows;
$total_halaman = ceil($total_data / $limit);
?>

<table class="table table-striped table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th class="w-25">Judul</th>
            <th class="w-50">Isi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if ($result_article && $result_article->num_rows > 0) {
            $no = $limit_start + 1;
            while ($row = $result_article->fetch_assoc()) {
                $ringkasan_isi = substr(strip_tags($row['isi']), 0, 100) . (strlen($row['isi']) > 100 ? '...' : '');
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>
                <strong><?= htmlspecialchars($row['judul']) ?></strong>
                <br><small class="text-muted"><?= $row['tanggal'] ?></small>
            </td>
            <td><?= htmlspecialchars($ringkasan_isi) ?></td>
            <td>
                <?php if (!empty($row['gambar'])): ?>
                    <img src="img/<?= htmlspecialchars($row['gambar']) ?>" width="80" class="img-thumbnail">
                <?php endif; ?>
            </td>
            <td>
                <a href="#" class="badge rounded-pill text-bg-success" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>"><i class="bi bi-pencil"></i></a>
                <a href="#" class="badge rounded-pill text-bg-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row["id"] ?>"><i class="bi bi-x-circle"></i></a>

                <div class="modal fade" id="modalEdit<?= $row["id"] ?>" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Article</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="modal-body text-start">
                                    <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Judul</label>
                                        <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($row["judul"]) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Isi</label>
                                        <textarea class="form-control" name="isi" rows="5" required><?= htmlspecialchars($row["isi"]) ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Gambar</label>
                                        <?php if (!empty($row['gambar'])): ?>
                                            <div class="mb-2"><img src="img/<?= htmlspecialchars($row['gambar']) ?>" width="100"></div>
                                        <?php endif; ?>
                                        <input type="file" class="form-control" name="gambar">
                                        <input type="hidden" name="gambar_lama" value="<?= $row["gambar"] ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" value="update" name="update" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalHapus<?= $row["id"] ?>" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form method="post" action="">
                                <div class="modal-body text-start">
                                    <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                    <input type="hidden" name="gambar" value="<?= $row["gambar"] ?>">
                                    <p>Yakin ingin menghapus artikel <strong>"<?= htmlspecialchars($row["judul"]) ?>"</strong>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <input type="submit" value="hapus" name="hapus" class="btn btn-danger">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="5" class="text-center">Belum ada data.</td></tr>';
        }
        ?>
    </tbody>
</table>

<div class="d-flex justify-content-between align-items-center mt-3">
    <div>
        <p class="mb-0 text-muted small">Menampilkan <?= $limit_start + 1 ?> sampai <?= min($limit_start + $limit, $total_data) ?> dari <?= $total_data ?> data</p>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-sm mb-0">
            <?php
            if ($hlm > 1) {
                $prev = $hlm - 1;
                echo "<li class='page-item'><a class='page-link halaman' id='1' href='#'>Awal</a></li>";
                echo "<li class='page-item'><a class='page-link halaman' id='$prev' href='#'>&laquo;</a></li>";
            }

            for ($i = 1; $i <= $total_halaman; $i++) {
                $active = ($hlm == $i) ? "active" : "";
                echo "<li class='page-item $active'><a class='page-link halaman' id='$i' href='#'>$i</a></li>";
            }

            if ($hlm < $total_halaman) {
                $next = $hlm + 1;
                echo "<li class='page-item'><a class='page-link halaman' id='$next' href='#'>&raquo;</a></li>";
                echo "<li class='page-item'><a class='page-link halaman' id='$total_halaman' href='#'>Akhir</a></li>";
            }
            ?>
        </ul>
    </nav>
</div>