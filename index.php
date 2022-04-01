<?php

include "db_connection.php";

$limit = 3;
$query = "SELECT COUNT(*) FROM student";  
$result = mysqli_query($conn, $query);  
$row = mysqli_fetch_row($result);  
$total_rows = $row[0];  
$total_pages = ceil($total_rows/$limit); 

?>

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
    
    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Sweet alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <title>Student Profile</title>
    <link rel="icon" href="images/user.svg" type="image/icon type">

    <style>
        body
        {
            background-color: #C8A2C8;
            margin-top: 2%;
        }
        th
        {
            background-color: #C8A2C8;
            color: white;
            font-size: 14px;
        }
        td
        {
            font-size: 14px;
        }
        .btn-create
        {
            background-color: #C8A2C8;
            color: white;
        }
        .btn-ed
        {
            color: white;
        }
        .btn-del
        {
            color: white;
        }
        table
        {
            text-align: left;
        }
        .row
        {
            padding-top:10px;
            padding-bottom:10px;
        }
        .pagination > li > a
        {
            background-color: white;
            color: #704270;
        }
        .pagination > li > a:focus,
        .pagination > li > a:hover
        {
            color: #704270;
            background-color: #eee;
            border-color: #ddd;
        }
        .pagination > .active > a
        {
            color: white;
            background-color: #704270 !Important;
            border: solid 1px #704270 !Important;
        }
        .pagination > .active > a:hover
        {
            background-color: #704270 !Important;
            border: solid 1px #704270;
        }

    </style>
    
</head>

<body>

<div class="container">
<div class="card shadow">
    <div class="card-header">
        <div class="row">
            <div class="col-8">
                <h3>Student Profile</h3>
            </div>
            <div class="col text-right">
                <button class="btn text-monospace btn-create" onclick="window.location.href='create-student.php'">Create student profile <i data-feather="user-plus"></i></button>
            </div>
        </div>   
    </div>
    <div class="card-body">
    <div class="container">
        <div id="target-content">Student Profile Table</div>
        <div class="row justify-content-center">
        <div class="clearfix">
            <ul class="pagination">
            <?php 
                if(!empty($total_pages))
                {
                    for($i=1; $i<=$total_pages; $i++)
                    {
                        if($i == 1)
                        {
                            echo '<li class="page-item active" aria-current="page" id="'.$i.'"><a href="JavaScript:Void(0);" data-id="'.$i.'" class="page-link" >'.$i.'</a></li>';                                                        
                        }    
                        else
                        {
                            echo '<li class="page-item" id="'.$i.'"><a href="JavaScript:Void(0);" class="page-link" data-id="'.$i.'">'.$i.'</a></li>';
                        }
                    }
                }
            ?>
            </ul>
        </div>
        </div>
    </div>
    </div>
</div>
</div>

<script>
    feather.replace();
</script>

<script>
    $(document).ready(function()
    {   
        $("#target-content").load("pagination.php?page=1");
        $(".page-link").click(function()
        {
            var id = $(this).attr("data-id");
            var select_id = $(this).parent().attr("id");

            $.ajax({

                url: "pagination.php",
                type: "GET",
                data: 
                {
                    page : id
                },
                cache: false,
                success: function(dataResult)
                {
                    $("#target-content").html(dataResult);
                    $(".pageitem").removeClass("active");
                    $("#"+select_id).addClass("active");
                }
            });
        });
    });
</script>

<script type="text/javascript">

    $(document).on('click', '.btn-del', function () 
    {
        var id = $(this).data('id');
        
        Swal.fire
        ({
            title: 'Delete Student-'+id+'\'s Profile?',
            text: "You will not be able to recover this",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
        })
        .then((result) => {
            if (result.isConfirmed) 
            {   
                window.location.href = "delete.php?student_id=" + id;
            }
            
        });

    });

</script>


</body>
</html>

