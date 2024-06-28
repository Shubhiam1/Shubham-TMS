<?php
include("../connection.php");
include("headerfile.php");



?>


<title>Manage Package</title>


<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />


<!-- Begin Page Content -->
<div class="container-fluid">
<h1>Manage Package</h1>
    <div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Feature</th>
                    <th>Images</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <?php


            $query  = "SELECT * FROM package_tb";
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
                                                    <td>" . $result['type'] . "</td>
                                                    <td>" . $result['location'] . "</td>
                                                    <td>" . $result['price'] . " <b>$</b></td>
                                                    <td>" . $result['feature'] . "</td>
                                                    <td><img src='" . $result['image'] . "' alt='Package Image' style='width: 80px; height: 50px;'></td>
                                                    <td>
                                                    <a href='manage_package_update_form.php?id=" . $result['id'] . "' ><button  style='border:none; background: none;'> <svg xmlns='http://www.w3.org/2000/svg' width='24' viewBox='0 0 24 24' fill='rgba(70,146,221,1)'><path d='M16.7574 2.99677L9.29145 10.4627L9.29886 14.7098L13.537 14.7024L21 7.23941V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99677C3 3.44448 3.44772 2.99677 4 2.99677H16.7574ZM20.4853 2.09727L21.8995 3.51149L12.7071 12.7039L11.2954 12.7063L11.2929 11.2897L20.4853 2.09727Z'></path></svg></button></a>   
                                                    <button class='btn-delete' data-id='" . $result['id'] . "' style='border:none; background: none;'><svg xmlns='http://www.w3.org/2000/svg' width='24' viewBox='0 0 24 24' fill='rgba(245,69,69,1)'><path d='M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM9 11V17H11V11H9ZM13 11V17H15V11H13ZM9 4V6H15V4H9Z'></path></svg></button>
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

        $('.btn-edit').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                url: 'manage_package_update_form.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    window.location.href = "manage_package_update_form.php";
                }
            });
        });


        $('.btn-delete').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.isConfirmed) {
                 
                    $.ajax({
                        url: 'manage_package_delete_backend.php',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            console.log(response);
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            }).then((result) => {
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
        $('.manage-pak').addClass("active");
	});
</script>