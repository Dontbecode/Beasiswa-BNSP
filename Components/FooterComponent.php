<!-- Inisialisasi Library Javascript  -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- Bootstrap JavaScript Bundle dengan Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Configurasi Tampilan Tabel dari datatables-->
    <script>
        $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive: true,
            pageLength: 10,
            language: {
                search: "<i class='fas fa-search'></i>",
                searchPlaceholder: "Cari...",
                paginate: {
                    next: "<i class='fas fa-chevron-right'></i>",
                    previous: "<i class='fas fa-chevron-left'></i>"
                }
            }
        });
    });
    </script>
<!--Configurasi Chart pie dari library Chart.js -->
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            $('#dataTable').DataTable();
            // Data untuk chart
            let statusData = {
                labels: ["Belum Terverifikasi", "Diterima", "Ditolak", "Selesai"],
                datasets: [{
                    label: 'Status Ajuan',
                    data: [0, 0, 0, 0], // Inisialisasi data
                    backgroundColor: ['blue', 'green', 'red', 'orange'],
                }]
            };
            // Ambil data dari tabel
            $('#dataTable tbody tr').each(function() {
                let status = $(this).find('td:eq(7)').text();
                if (status == 'Belum Terverifikasi') {
                    statusData.datasets[0].data[0]++;
                } else if (status == 'Diterima') {
                    statusData.datasets[0].data[1]++;
                } else if (status == 'Ditolak') {
                    statusData.datasets[0].data[2]++;
                } else if (status == 'Selesai') {
                    statusData.datasets[0].data[3]++;
                }
            });
            // Inisialisasi Chart.js
            var ctx = document.getElementById('statusChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: statusData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Grafik Status'
                        }
                    }
                }
            });
        });
        </script>
        
<!--Configurasi Chart pie dari library Chart.js -->
        <script>
            $(document).ready(function() {
                // Inisialisasi DataTables
                $('#dataTable').DataTable();
                // Data untuk chart
                let beasiswaData = {
                    labels: [], // Nama beasiswa akan diisi disini
                    datasets: [{
                        label: 'Jumlah Pendaftar',
                        data: [], // Jumlah pendaftar akan diisi disini
                        backgroundColor: [], // Warna latar belakang akan diisi disini
                    }]
                };
                // Ambil data dari tabel
                $('#dataTable tbody tr').each(function() {
                    let namaBeasiswa = $(this).find('td:eq(5)').text(); // Ambil nama beasiswa dari tabel
                    let status = $(this).find('td:eq(7)').text();
                    // Cek apakah nama beasiswa sudah ada di labels
                    if (!beasiswaData.labels.includes(namaBeasiswa)) {
                        beasiswaData.labels.push(namaBeasiswa);
                        beasiswaData.datasets[0].data.push(0);
                        beasiswaData.datasets[0].backgroundColor.push(getRandomColor()); // Tambahkan warna latar belakang secara acak
                    }
                    // Cari index nama beasiswa di labels
                    let index = beasiswaData.labels.indexOf(namaBeasiswa);
                    // Tambahkan jumlah pendaftar
                    if (status == 'Belum Terverifikasi' || status == 'Diterima' || status == 'Ditolak' || status == 'Selesai') {
                        beasiswaData.datasets[0].data[index]++;
                    }
                });
                // Inisialisasi Chart.js
                var ctx = document.getElementById('beasiswaChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: beasiswaData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Grafik Nama Beasiswa'
                            }
                        }
                    }
                });
            });
            // Fungsi untuk menghasilkan warna latar belakang secara acak
            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
            </script>
            </body>
</html>
