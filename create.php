<!DOCTYPE html>
<html lang="en">
<head>
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>    

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Sweet alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <title>Student Profile - Delete Student Profile</title>
    <link rel="icon" href="images/user.svg" type="image/icon type">

    <style>
        body
        {
            background-color: #C8A2C8;
            margin-top: 2%;
        }
    </style>

</head>
<body>

<?php

include "db_connection.php";

$firstName =  $_REQUEST['first_name'];
$middleName =  $_REQUEST['middle_name'];
$lastName = $_REQUEST['last_name'];
$birthday =  $_REQUEST['birthday'];
$address1 = $_REQUEST['address_1'];
$address2 = $_REQUEST['address_2'];
$region = $_REQUEST['region'];
$city = $_REQUEST['city'];

if(!mysqli_query($conn, "INSERT INTO `student`(`first_name`,`middle_name`,`last_name`,`birthday`,`address_1`,`address_2`,`region_id`,`city_id`)  VALUES ('$firstName','$middleName','$lastName','$birthday','$address1','$address2','$region','$city')"))
{
    echo
    "
        <script type='text/javascript'>
                
            $( document ).ready(function() {

                Swal.fire
                ({
                    title: 'Failed to create profile x_x',
                    text: 'Contact your admin if the error keeps reappearing',
                    icon: 'error',
                    willClose: () => {
                        window.history.go(-1);
                    }
                })
                
            });

        </script>
    ";
} 
else
{
    echo
    "
        <script type='text/javascript'>
            
            $( document ).ready(function() {
                
                Swal.fire(
                    'Created Successfully!',
                    'Student Profile has been created :)',
                    'success'
                ).then(function(){ 
                    window.location = 'index.php';
                })

            });

        </script>

    ";

}

?>

</body>
</html>