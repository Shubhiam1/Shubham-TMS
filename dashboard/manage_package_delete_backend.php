<?php
    include("../connection.php");

    $id = $_POST['id'];
    $query = "DELETE FROM package_tb WHERE id = '$id' ";
    $result = mysqli_query($conn,$query);
    
    if($result)
    {
        return true;

    }else{
        echo "NO Records Found";
    }

?>