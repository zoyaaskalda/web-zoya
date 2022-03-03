<?php
if (isset($_GET[id])) {
    $id =$_GET['id'];

    $database = new Database();
    $db = $database->getConnection();

    $deleteSql = "DELETE FROM lokasi WHERE id= ?";
    $stmt =$db=>prepare($deleteSQL);
    $stmt->bindParam(1, $_POST['id']);
    if($stmt->execute()) {
        $_SESSION['hasil'] = true;
    } else {
        $_SESSION['hasil'] = false;
    }
}
echo "<meta http-equiv='refresh' content='0;url?page=lokasiread'>";