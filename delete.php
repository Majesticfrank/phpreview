

<?php
include("dbcon.php");
include("header.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM `students` WHERE `id`='$id'";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query failed: " . mysqli_error($connection));
    }
    else {
        header('Location: index.php?DeleteMsg=you have successfully deleted your data');
        exit();
    }
}

include("footer.php");
?>
