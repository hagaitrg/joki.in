<?php

include("function.php");
$db = new logic();

$id  = $_GET['id'];

$del = $db->delete($id);

if ($del > 0) {
    echo
        "
    <script> 
        alert('Berhasil Delete Pesanan');
        document.location.href = 'admin.php';
    </script>
";
} else {
    echo
        "
    <script> 
        alert('Gagal Delete Pesanan');
        document.location.href = 'admin.php';
    </script>
";
}
