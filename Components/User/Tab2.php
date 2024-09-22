<div class="tab-pane fade" id="daftar" role="tabpanel" aria-labelledby="daftar">
    <div class="card">
        <div class="card-header">
            <div class="header-title text-center">
                <span class="blue">Formulir</span> <span class="red">Pendaftaran</span>
            </div>
        </div>
        <div class="card-body">
        <?php
            function generateFormattedIPK() {
                // Generate random IPK range 2.00 sampai 4.00
                $ipk = rand(200, 400) / 100;
                $formatipk = number_format($ipk, 2);
                return $formatipk;
            }
            // Memanggil prosedur dan menampilkan hasil
            $formattedIPK = generateFormattedIPK();
            ?>
            <!-- Form untuk daftar peserta -->
            <form action="Controllers/User/proses_pendaftaran.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_lengkap" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nomor_hp" class="form-label">Nomor HP:</label>
                        <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="semester" class="form-label">Semester Saat Ini:</label>
                        <select class="form-select" id="semester" name="semester" required>
                            <?php
                            // Loop for semesters
                            for ($i = 1; $i <= 8; $i++) {
                                echo "<option value=\"$i\">Semester $i</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="ipk" class="form-label">IPK Terakhir:</label>
                        <div class="input-group">
                            <input value="<?php echo $formattedIPK; ?>" type="text" class="form-control" id="ipk" name="ipk" readonly>
                            <button type="button" class="btn btn-secondary" onclick="resetIPK()">Reset</button>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pilihan_beasiswa" class="form-label">Pilihan Beasiswa:</label>
                        <select class="form-select" id="pilihan_beasiswa" name="pilihan_beasiswa" <?php echo ($ipk < 3) ? 'disabled' : ''; ?> required>
                            <option value="" selected disabled>Pilih Beasiswa</option>
                            <?php
                            // Query for beasiswa options
                            $query = "SELECT nama_beasiswa FROM tabel_beasiswa";
                            $result = mysqli_query($koneksi, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $nama_beasiswa = $row["nama_beasiswa"];
                                echo "<option value=\"$nama_beasiswa\">$nama_beasiswa</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="berkas_syarat" class="form-label">Upload Berkas Syarat:</label>
                    <input type="file" class="form-control" id="berkas_syarat" name="berkas_syarat" accept=".pdf,.jpg,.jpeg,.png,.zip" <?php echo ($formattedIPK < 3) ? 'disabled' : ''; ?> required>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary" <?php echo ($formattedIPK < 3) ? 'disabled' : ''; ?>><i class="fas fa-paper-plane me-2"></i>Daftar</button>
                    <button type="reset" class="btn btn-secondary"><i class="fas fa-undo me-2"></i>Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function resetIPK() {
        // Generate random IPK range 2.00 sampai 4.00
        let newIpk = (Math.random() * (4.00 - 2.00) + 2.00).toFixed(2);
        
        // menampilkan angka IPK ke form
        document.getElementById('ipk').value = newIpk;
        // Enable atau disable form 
        if (newIpk >= 3.00) {
            document.getElementById('pilihan_beasiswa').disabled = false;
            document.getElementById('berkas_syarat').disabled = false;
            document.querySelector('button[type="submit"]').disabled = false;
        } else {
            document.getElementById('pilihan_beasiswa').disabled = true;
            document.getElementById('berkas_syarat').disabled = true;
            document.querySelector('button[type="submit"]').disabled = true;
        }
    }
</script>
