<!-- Halaman Data Penerima Beasiswa ... -->
<div class="tab-pane fade " id="hasil" role="tabpanel" aria-labelledby="hasil">
                <div class="card">
                    <div class="card-header">
                        <div class="header-title text-center">
                            <span class="blue">Data</span> <span class="red">Penerima</span> <span class="yellow">Beasiswa</span>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor HP</th>
                                <th>Semester</th>
                                <th>IPK</th>
                                <th>Beasiswa</th>
                                <th>Berkas</th>
                                <th>Status</th>
                                <th>Tanggal Daftar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <!-- Menampilkan data dari database -->
                        <?php
                            $query = "SELECT * FROM tabel_pendaftaran ORDER BY created_at DESC;";
                            $result = mysqli_query($koneksi, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["nama_lengkap"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["nomor_hp"] . "</td>";
                                echo "<td>" . $row["semester"] . "</td>";
                                echo "<td>" . $row["ipk"] . "</td>";
                                echo "<td>" . $row["pilihan_beasiswa"] . "</td>";
                                echo "<td><img src='Doc/" . $row['berkas_syarat'] . "' alt='' class='img-thumbnail' width='100' height='100'></td>";
                                if ($row["status_ajuan"] == "Belum Terverifikasi") {
                                    echo "<td style='color: blue;'>" . $row["status_ajuan"] . "</td>";
                                } elseif ($row["status_ajuan"] == "Diterima") {
                                    echo "<td style='color: green;'>" . $row["status_ajuan"] . "</td>";
                                } elseif ($row["status_ajuan"] == "Ditolak") {
                                    echo "<td style='color: red;'>" . $row["status_ajuan"] . "</td>";
                                }elseif ($row["status_ajuan"] == "Selesai") {
                                    echo "<td style='color: blue;'>" . $row["status_ajuan"] . "</td>";
                                }
                                echo "<td>" . $row["created_at"] . "</td>";
                                // Form untuk mengubah status
                                echo "<td>
                                        <form method='POST' action='Controllers/Admin/ubah_status.php'>
                                            <div class='dropdown'>
                                                <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                                    Ubah Status
                                                </button>
                                                <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                                                    <li><button class='dropdown-item' type='submit' name='status_ajuan' value='Diterima' style='color: green;'>Diterima</button></li>
                                                    <li><button class='dropdown-item' type='submit' name='status_ajuan' value='Ditolak' style='color: red;'>Ditolak</button></li>
                                                    <li><button class='dropdown-item' type='submit' name='status_ajuan' value='Selesai' style='color: blue;'>Selesai</button></li>
                                                </ul>
                                                <input type='hidden' name='id_pendaftaran' value='" . $row['id'] . "'>
                                            </div>
                                        </form>
                                    </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                        </div>                  
                    </div>
                </div>
            </div>