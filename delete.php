<?php
include('conn.php');
$eid = $_GET['eid'];

$sql = "delete from emp where eid = $eid";

$data = mysqli_query($conn, $sql);

if ($data) {
    echo
    "<script>
        alert('Data Deleted');
        window.location.href('view.php');
    </script>";
} else {
    die(mysqli_error($conn));
}
