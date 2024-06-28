<?php
    include("headerfile.php");
    include("../connection.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />

<div class="container-fluid">
    <h1>Payments</h1>
    
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>EMAIL</th>
                <th>AMOUNT</th>
                <th>DATE</th>
                <th>PAYMENT METHOD</th>
            </tr>
        </thead>
        <?php


        $query  = "SELECT * FROM stripe_payment";
        $data = mysqli_query($conn, $query);
        $total  = mysqli_num_rows($data);

        if ($total != 0) {

        ?>
            <tbody id="tbody">

            <?php
            while ($result  = mysqli_fetch_assoc($data)) {
                echo "<tr>
                                            <td>" . $result['id'] . "</td>
                                            <td>" . $result['email'] . "</td>
                                            <td>" . $result['amount'] . "</td>
                                            <td>" . $result['date'] . "</td>
                                            <td>" . $result['payment_method'] . "</td>
                                        </tr>";
            }
        } else {
            echo "No Records Found";
        }
            ?>

            </tbody>
    </table>

    </body>
</div>

<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    })

    $(document).ready(function() {
        $(".sidebar-link").removeClass("active");
        $('.payment').addClass("active");
    });
</script>