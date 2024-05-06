<?php
include("connection.php");

$Id = $_GET['id'];
$sql = "delete from authors where id = $Id";
$result = mysqli_query($conn, $sql);

echo "<script>
            alert('category Has Been Deleted');
            window.location.href = 'author_show.php'
        </script>";
?>