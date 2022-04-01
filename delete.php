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

if(!mysqli_query($conn,"DELETE FROM student WHERE student_id =" . $_GET['student_id'] .""))
{
    echo
    "
        <script type='text/javascript'>
            
            $( document ).ready(function() {

                Swal.fire
                ({
                    title: 'Failed to delete profile x_x',
                    text: 'Contact your admin if the error keeps reappearing',
                    icon: 'error',
                    willClose: () => {
                        window.location = 'index.php';
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
                    'Deleted Successfully!',
                    'Student Profile has been deleted :)',
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