<?php
if (isset($_POST['button_create'])) {

    $database = new Database();
    $db = $database->getConnection();

    $insertSQL = "INSERT INTO lokasi SET nama_lokasi = '" . $_POST['nama_lokasi'] ."'";
    $stmt = $db->prepare($insertSql);
    if ($stmt->execute()) {
        echo "Simpan Berhasil";
    } else {
        echo "Simpan Gagal";
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

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Lokasi</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="nama_lokasi">Nama Lokasi</label>
                    <input type="text" class="form-control" name="nama_lokasi">
                </div>
                <a href="?page=lokasiread" class="btn btn-danger btn-sm float-right">
                    <i class="fa fa-times"></i> Simpan
                </button>
            </form>
    </div>
</section>

<?php include_once "partials/scripts.php" ?>

