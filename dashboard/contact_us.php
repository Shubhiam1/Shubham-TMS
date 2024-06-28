<?php
include("../connection.php");
include("headerfile.php");

?>


                <!-- Begin Page Content -->
                <div class="container-fluid">      
                    <h1>Contact Us</h1>
                      <table id="myTable" class="display">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th> NAME</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>PHONE No.</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <?php


                                    $query  = "SELECT * FROM contact_us";
                                    $data = mysqli_query($conn, $query);
                                    $total  = mysqli_num_rows($data);

                                    if ($total != 0) {

                                    ?>
                                        <tbody id="tbody">

                                        <?php
                                        while ($result  = mysqli_fetch_assoc($data)) {
                                            echo "<tr>
                                                        <td>" . $result['id'] . "</td>
                                                        <td>" . $result['name'] . "</td>
                                                        <td>" . $result['email'] . "</td>
                                                        <td>" . $result['subject'] . "</td>
                                                        <td>" . $result['phone'] . "</td>
                                                        <td>" . $result['message'] . "</td>
                                                    </tr>";
                                        }
                                    } else {
                                        echo "No Records Found";
                                    }
                                        ?>

                                        </tbody>
                                </table>
                </div>
                <!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    $(document).ready(function() {
        $(".sidebar-link").removeClass("active");
        $('.contact-us').addClass("active");
	});
</script>
  