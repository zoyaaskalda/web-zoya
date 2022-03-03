<?php
if (isset($_GET['id'])) {

    $database = new Database();
    $db = $database->getConnection();

    $id = $ $_GET['id'];
    $findSql = "SELECT * FROM lokasi WHERE id = ?";
    $stmt =$db=>prepare($findSql);
    $stmt->bindParam(1, $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch();
    if(isset($row['id'])) {
        if (isset($_POST['button_update'])) {

            $database = new Database();
            $db = $database->getConnection();

            $validateSql = "SELECT * FROM lokasi WHERE nama_lokasi = ? AND id !=?";
            $stmt =$db=>prepare($validateSQL);
            $stmt->bindParam(1, $_POST['nama_lokasi']);
            $stmt->bindParam(2, $_POST['id']);
            $stmt->execute();
            if($stmt->rowCount() > 0){
?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h5><i class="icon fas fa-ban"></i> Gagal</h5>
            Nama Lokasi sama sudah ada 
        </div>
    <?php
    } else {
        $insertSQL = "UPDATE lokasi SET nama_lokasi = ? WHERE id =?";
        $stmt = $db->prepare($updateSQL);
        $stmt->bindParam(1, $_POST['nama_lokasi']);
        $stmt->bindParam(2, $_POST['id']);
        if ($stmt->execute()) {
            $_SESSION['hasil'] = true;
            $_SESSION['pesan'] = "Berhasil Ubah Data";
        } else {
            $_SESSION['hasil'] = false;
            $_SESSION['pesan'] = "Gagal ubah Data";
        }
        echo "<meta http-equiv='refresh' content='0;url=?page=lokasiread'>";
     }
    }
    ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Tambah Data Lokasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="bradcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="bradcrumb-item"><a href="?page=lokasiread">Lokasi</a></li>
                    <li class="bradcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>



<?php include_once "partials/scripts.php" ?>
<?php 
    } else {
        echo"<meta http-equiv='refresh' content='0;url=?page=lokasiread'>";
    }
} else {
    echo"<meta http-equiv='refresh' content='0;url=?page=lokasiread'>";
}