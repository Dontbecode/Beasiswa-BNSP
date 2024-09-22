<?php
// Sertakan koneksi ke database
require_once '../../Connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim dari form
    $statusAjuan = $_POST['status_ajuan'];
    $idPendaftaran = $_POST['id_pendaftaran'];
    // Query untuk memperbarui status di database
    $sql = "UPDATE tabel_pendaftaran SET status_ajuan = ? WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $statusAjuan, $idPendaftaran);
    if (mysqli_stmt_execute($stmt)) {
        // Jika status diperbarui dan berhasil, arahkan ke DashboardAdmin.php dengan tab #hasil aktif
        echo "<script>alert('Status berhasil diperbarui!'); window.location.href='../../DashboardAdmin.php?tab=hasil';</script>";
    } else {
        // Jika terjadi error, tampilkan pesan error
        echo "<script>alert('Error: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
    }
    mysqli_stmt_close($stmt);
}
?>
