<?php
include("../connection.php");
include("headerfile.php");



?>


<title>Manage Package</title>
<style>
    .btn-confirm,.btn-unconfirm {
    border: white;
    background-color: transparent;  
   }


   .sidebar-nav ul .sidebar-item .sidebar-link.active{
			background: #27a9e3;
		}
</style>


<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />


<!-- Begin Page Content -->
<div class="container-fluid">
<h1>Booking Details</h1>
    <div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Starting Date</th>
                    <th>Ending Date</th>
                    <th>Comments</th>
                    <th>Status</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <?php


            $query  = "SELECT * FROM booking_details";
            $data = mysqli_query($conn, $query);
            $total  = mysqli_num_rows($data);

            if ($total != 0) {

            ?>
                <tbody id="tbody">

                <?php
                while ($result  = mysqli_fetch_assoc($data)) {
                    echo "<tr>
                                                    <td>" . $result['id'] . "</td>
                                                    <td>" . $result['package_start_date'] . "</td>
                                                    <td>" . $result['package_end_date'] . "</td>
                                                    <td>" . $result['comment'] . "</td>
                                                    <td>" . $result['status'] . " </td>
                                                    <td>
                                                        <button class='btn-confirm' data-id='" . $result['id'] . "' '><svg width='24' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z'></path></svg></button>
                                                        <button class='btn-unconfirm' data-id='" . $result['id'] . "' '><svg width='24' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z'></path></svg></button>
                                                    </td>
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

        $('.btn-confirm').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var confirm = "confirmed";
            console.log(id);
            Swal.fire({
                title: "Are you sure?",
                text: "You want to confirm this Booking",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, confirm it!"
            }).then(function(result) {
                if (result.isConfirmed) {
                  
                    $.ajax({
                        url: 'package_booking_details_backend.php',
                        type: 'POST',
                        data: {
                            id: id,
                            confirm: confirm
                        },
                        success: function(response) {
                            console.log(response);

                            sweetAlert("success", "Booking Confirmed", "success").then((result) => {

                                location.reload();

                            });
                        }
                    });
                }
            });
        });


        $('.btn-unconfirm').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var unconfirm = "unconfirmed";
            console.log(id);
            Swal.fire({
                title: "Are you sure?",
                text: "You want to unconfirm this Booking",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, unconfirm it!"
            }).then(function(result) {
                if (result.isConfirmed) {
                  
                    $.ajax({
                        url: 'package_booking_details_backend.php',
                        type: 'POST',
                        data: {
                            id: id,
                            unconfirm : unconfirm
                        },
                        success: function(response) {
                            console.log(response);

                            sweetAlert("success", "Booking Unconfirmed", "success").then((result) => {

                                location.reload();

                            });
                        }
                    });
                }
            });
        });

    });

    
    $(document).ready(function() {
        $(".sidebar-link").removeClass("active");
        $('.booking-details').addClass("active");
	});
</script>