<?php

session_start();
include("connection.php");



$sql = "DELETE FROM inventory WHERE items_id='" . $_GET["items_id"] . "'";
if (mysqli_query($con, $sql)) {
    header("Location: inventory-list.php");         
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);


?>



