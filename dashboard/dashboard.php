<?php
include("../connection.php");
include("headerfile.php");
?>
<div class="container-fluid">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-2 mb-3"> 
                    <div class="bg-primary p-3 text-white">
                        <?php
                        $query = "SELECT * FROM new_tb ";
                        $query_insert = mysqli_query($conn, $query);
                        $row  = mysqli_num_rows($query_insert);
                        ?>
                        <h3>Total users</h3>
                        <h1><?php echo $row ?></h1> 
                    </div>
                </div>
                <div class="col-sm-2 mb-3"> 
                    <div class="bg-danger p-3 text-white">
                        <?php
                        $query = "SELECT * FROM contact_us ";
                        $query_insert = mysqli_query($conn, $query);
                        $row  = mysqli_num_rows($query_insert);
                        ?>
                        <h3>Total Contact</h3>
                        <h1><?php echo $row ?></h1>
                    </div>
                </div>
                <div class="col-sm-2 mb-3"> 
                    <div class="bg-success p-3 text-white">
                        <?php
                        $query = "SELECT * FROM package_tb ";
                        $query_insert = mysqli_query($conn, $query);
                        $row  = mysqli_num_rows($query_insert);
                        ?>
                        <h3>Total Package</h3>
                        <h1><?php echo $row ?></h1> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footerfile.php"); ?>
