<!-- Tab Content -->
<div class="tab-content" id="myTabContent">
<!-- Dashboard Tab -->
<div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard">
    <div class="card">
        <div class="card-header">
            <div class="header-title text-center">
            <span class="blue">Beasiswa</span> <span class="red">BootCamp</span> <span class="yellow">FullStack</span> Dev;
            </div>
            </div>
            <div class="card-body">
                <div class="code-box">
                    &gt; Hello Admin ;
                </div>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <canvas id="statusChart" style="max-width: 400px; max-height: 400px;"></canvas>
                    </div>
                    <div class="col-md-6">
                    <canvas id="beasiswaChart" style="max-width: 400px; max-height: 400px;"></canvas>
                </div>
            </div>
            </div>
        </div>
    </div>
<!-- Halaman Daftar Peserta ... -->
<div class="tab-pane fade" id="daftar" role="tabpanel" aria-labelledby="daftar">
    <div class="card">
        <div class="card-header">
            <div class="header-title text-center">
                <span class="blue">Data</span> <span class="red">Beasiswa</span>
            </div>
            </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Beasiswa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $query = "SELECT * FROM tabel_beasiswa";
                            $result = mysqli_query($koneksi, $query);
                            $no = 1; // Tambahkan variabel untuk nomor
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $no . "</td>"; // Tampilkan nomor
                                echo "<td>" . $row["nama_beasiswa"] . "</td>";
                                $no++; // Tambahkan 1 untuk nomor berikutnya
                            }
                    ?>
                    </tbody>
            </table>
        <form action="Controllers/Admin/beasiswa.php" method="post" class="mt-4">
                <div class="mb-3">
                    <label for="nama_beasiswa" class="form-label">Nama Beasiswa Baru:</label>
                    <input type="text" class="form-control" id="nama_beasiswa" name="nama_beasiswa" required>
                </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Tambah Beasiswa</button>
            </form>
            </div>
        </div>
    </div>