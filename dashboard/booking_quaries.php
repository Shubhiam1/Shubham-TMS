<?php
include("../connection.php");
include("headerfile.php");



?>


<title>Booking Quaries</title>


<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />


<!-- Begin Page Content -->
<div class="container-fluid">
            <h1>Booking Quaries</h1>
                <div>
                    <!-- Bootstrap Modal -->
            <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="replyModalLabel">Reply</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" id="replyInput">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="sendReply">Send</button>
                        </div>
                    </div>
                </div>
            </div>

        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Query</th>
                </tr>
            </thead>

            <?php


            $query  = "SELECT * FROM booking_quaries";
            $data = mysqli_query($conn, $query);
            $total  = mysqli_num_rows($data);

            if ($total != 0) {

            ?>
                <tbody id="tbody">

                <?php
                while ($result  = mysqli_fetch_assoc($data)) {
                    echo "  <tr>
                                <td>" . $result['id'] . "</td>
                                <td>" . $result['name'] . "</td>
                                <td>" . $result['email'] . "</td>
                                <td>" . $result['query'] . "</td>
                                <td><button class='btn btn-primary' data-toggle='modal' data-target='#replyModal' data-query='" . $result['id'] . "'>Reply</button></td>
                            </tr>";
                }
            } else {
                echo "No Records Found";
            }
                ?>

                </tbody>
        </table>
    </div>



</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();

        $("#reply-btn").click(function(){
            
        });

    });

    
    $(document).ready(function() {
        $(".sidebar-link").removeClass("active");
        $('.booking-quaries').addClass("active");
	});
</script>