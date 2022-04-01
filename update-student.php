<?php
include "db_connection.php";
if (isset($_GET['student_id'])) 
{

    $student_id = $_GET['student_id'];
    $sql_find = "SELECT * FROM student WHERE student_id=$student_id";
    $row = mysqli_query($conn, $sql_find);
    
    if(mysqli_num_rows($row) > 0 ) 
    {
        $data = mysqli_fetch_array($row);
        $studentid = $data['student_id'];
        $firstname = $data['first_name'];
        $middlename = $data['middle_name'];
        $lastname = $data['last_name'];
        $birthday = $data['birthday'];
        $address1 = $data['address_1'];
        $address2 = $data['address_2'];
        $region = $data['region_id'];
        $city = $data['city_id'];
    }
}
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

    <!-- Sweet alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <title>Student Profile - Update Student Profile</title>
    <link rel="icon" href="images/user.svg" type="image/icon type">


<style>
    body
    {
        background-color: #C8A2C8;
        margin-top: 4%;
    }
    label
    {
        font-family: monospace;
    }
    .btn-back
    {
        background-color: #C8A2C8;
        color: white;
    }
    .btn-create
    {
        background-color: #C8A2C8;
        color: white;
    }
    .row
    {
        padding-top:10px;
        padding-bottom:10px;
    }
</style>

    <script type="text/javascript">
        function computeAge() 
        {
            var userinput = document.getElementById("birthday").value;
            var dob = new Date(userinput);
            if(userinput==null || userinput=='') 
            {
                document.getElementById("message").innerHTML = "**Choose a date please!";  
                return false; 
            } 
            else 
            {
                //calculate month difference from current date in time
                var month_diff = Date.now() - dob.getTime();

                //convert the calculated difference in date format
                var age_dt = new Date(month_diff); 

                //extract year from date    
                var year = age_dt.getUTCFullYear();

                //now calculate the age of the user
                var age = Math.abs(year - 1970);

                //display the calculated age
                return document.getElementById("age").value = age;
            }
        }
    </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#region_id').on('change', function(){
                var region_id = $(this).val();
                if(region_id){
                    $.ajax({
                        type:'POST',
                        url:'region_city.php',
                        data:'region_id='+region_id,
                        success:function(html){
                            $('#city_id').html(html);
                        }
                    }); 
                }
            });
        });
                
    </script>
</head>

<body>

<div class="container">
<div class="card shadow-lg">
    <div class="card-header">
        <div class="row">
            <div class="col-8">
                <h3>Update Student Profile</h3>
            </div>
            <div class="col text-right">
                <button type="button" class="btn btn-sm btn-back" data-toggle="tooltip" data-placement="top" title="Back" onclick="window.location.href='index.php'"><i data-feather="arrow-left-circle"></i></button>
            </div>
        </div>    
    </div>
    <div class="card-body">
    <div class="container">
        <form action="update.php" method="post" id="cform">
        <div class="row">
            <div class="col">
            <div class="form-group">
                
                <!-- <label for="student_id">Student Id: </label> -->
                <input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id; ?>" readonly>

                <label for="firstName">First Name: </label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $firstname; ?>" required>
            </div>
            </div>
            <div class="col">
            <div class="form-group"> 
                <label for="middleName">Middle Name: </label>
                <input type="text" class="form-control" name="middle_name" id="middle_name" value="<?php echo $middlename; ?>">
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="lastName">Last Name: </label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $lastname; ?>" required>
            </div>
            </div>
        
        <!-- for setting of max date in datepicker for birthday--> 
        <?php $dateToday = date('Y-m-d'); ?> 
               
            <div class="col-3"> 
            <div class="form-group">
                <label for="birthday">Birthday: </label>
                <input type="date" class="form-control" name="birthday" id="birthday" value="<?php echo $birthday; ?>" onchange = "computeAge()" max="<?php echo $dateToday; ?>" required> &nbsp;
            </div>
            </div>
            <div class="col-2">
            <div class="form-group">

                    <?php 
                        $currentDOB = $birthday;
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($currentDOB), date_create($today));
                        $currentAge = $diff->format('%y');
                    ?>

                <label for="age">Age: </label>
                <input type="text" class="form-control" name="age" id="age" value="<?php echo $currentAge; ?>" readonly>
            </div>
            </div>
        </div>
        <div class="row">          
            <div class="col"> 
            <div class="form-group">
                <label for="address_1">Address 1: </label>
                <input type="text" class="form-control" name="address_1" id="address_1" value="<?php echo $address1; ?>">
            </div>
            </div>
            <div class="col"> 
            <div class="form-group">
                <label for="address_2">Address 2: </label>
                <input type="text" class="form-control" name="address_2" id="address_2" value="<?php echo $address2; ?>">
            </div>
            </div>

            <div class="col"> 
            <div class="form-group">
                <label for="region">Region:</label>
                <select required class="form-control" name="region_id" id="region_id"/>
                    
                    <!-- Get regions in the database -->
                    <?php
                        
                        $sql_getregion = "SELECT * FROM region;";
                        $result = mysqli_query($conn,$sql_getregion);

                        if(mysqli_num_rows($result) > 0)
                        {
                            echo '<option disabled="">-- Select Region first to Select City --</option>';
                            while($data = mysqli_fetch_assoc($result))
                            {
                                if($data['region_id']==$region)
                                {
                                    echo '<option selected="" id = "' . $data['region_id'] . '" value= "' . $data['region_id'] . '">'. $data['region_name'] . '</option>';
                                }
                                else{
                                    echo '<option id = "' . $data['region_id'] . '" value= "' . $data['region_id'] . '">'. $data['region_name'] . '</option>';
                                }
                            }   
                        }
                        else{
                            echo "<option>No region found. :( ". mysqli_error($conn) . "</option>";
                        }
                    ?>
                </select>
            </div>
            </div>

            <div class="col">
            <div class="form-group">
                <label for="city_id">City: </label>
                <select required class="form-control" name="city_id" id="city_id"/>
                    <option disabled="">-- Select Region first to Select City --</option>
                    <?php
                        $sql_getcity = "SELECT * FROM city WHERE region_id = $region";
                        $result = mysqli_query($conn,$sql_getcity);

                        if(mysqli_num_rows($result) > 0)
                        {
                            while($data = mysqli_fetch_assoc($result))
                            {
                                if($data['city_id']==$city)
                                {
                                    echo '<option selected="" id = "' . $data['city_id'] . '" value= "' . $data['city_id'] . '">'. $data['city_name'] . '</option>';
                                }
                                else{
                                    echo '<option id = "' . $data['city_id'] . '" value= "' . $data['city_id'] . '">'. $data['city_name'] . '</option>';
                                }
                            }
                        }
                    ?>
                </select>
                
            </div>
            </div>
        </div>
        <div class="row">
        </div>
        <hr>
        <div class="row">
            <div class="col text-right">
                <div class="form-group">
                    <input type="submit" class="btn text-monospace btn-create" value="Update Student">
                </div>
            </div>
        </div>
        </form>
    
    </div>
    </div>
</div>
</div>

<script>
    feather.replace();
</script>

<script>
    const tooltips = document.querySelectorAll('.btn')
    tooltips.forEach(t=>{
        new bootstrap.Tooltip(t)
    })
</script>

</body>
</html>
