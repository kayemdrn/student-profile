<?php
include "db_connection.php";
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

    <title>Student Profile - Create Student Profile</title>
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
            $('#region').on('change', function(){
                var region_id = $(this).val();
                if(region_id){
                    $.ajax({
                        type:'POST',
                        url:'region_city.php',
                        data:'region_id='+region_id,
                        success:function(html){
                            $('#city').html(html);
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
                <h3>Create Student Profile</h3>
            </div>
            <div class="col text-right">
                <button class="btn btn-sm btn-back" data-toggle="tooltip" data-placement="top" title="Back" onclick="window.location.href='index.php'"><i data-feather="arrow-left-circle"></i></button>
            </div>
        </div>    
    </div>
    <div class="card-body">
    <div class="container">
        <form action="create.php" method="post" id="cform">
        <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="firstName">First Name: </label>
                <input type="text" class="form-control" name="first_name" id="firstName" required>
            </div>
            </div>
            <div class="col">
            <div class="form-group"> 
                <label for="middleName">Middle Name: </label>
                <input type="text" class="form-control" name="middle_name" id="middleName">
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="lastName">Last Name: </label>
                <input type="text" class="form-control" name="last_name" id="lastName" required>
            </div>
            </div>
        
        <!-- for setting of max date in datepicker for birthday--> 
        <?php $dateToday = date('Y-m-d'); ?> 
               
            <div class="col-3"> 
            <div class="form-group">
                <label for="birthday">Birthday: </label>
                <input type="date" class="form-control" name="birthday" id="birthday" onchange = "computeAge()" max="<?php echo $dateToday; ?>" required> &nbsp;
            </div>
            </div>
            <div class="col-2">
            <div class="form-group">
                <label for="age">Age: </label>
                <input type="text" class="form-control" name="age" id="age" readonly>
            </div>
            </div>
        </div>
        <div class="row">          
            <div class="col"> 
            <div class="form-group">
                <label for="address1">Address 1: </label>
                <input type="text" class="form-control" name="address_1" id="address1" required>
            </div>
            </div>
            <div class="col"> 
            <div class="form-group">
                <label for="address2">Address 2: </label>
                <input type="text" class="form-control" name="address_2" id="address2">
            </div>
            </div>

            <div class="col"> 
            <div class="form-group">
                <label for="region">Region:</label>
                <select required class="form-control" name="region" id="region"/>
                    
                    <!-- Get regions in the database -->
                    <?php
                        $sql_getregion = "SELECT * FROM region;";
                        $result = mysqli_query($conn,$sql_getregion);
                        
                        if(mysqli_num_rows($result) > 0)
                        {
                            echo '<option selected="" disabled="">-- Select Region first to Select City --</option>';
                            while($data = mysqli_fetch_assoc($result))
                            {
                                echo '<option id = "' . $data['region_id'] . '" value= "' . $data['region_id'] . '">'. $data['region_name'] . '</option>';
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
                <label for="city">City: </label>
                <select required class="form-control" name="city" id="city" />
                    <option disabled="">-- Select Region first to Select City --</option>
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
                    <input type="submit" class="btn text-monospace btn-create" value="Create Student">
                </div>
            </div>
        </div>
        </form>
    
    </div>
    </div>
</div>
</div>

<script>
    feather.replace()
</script>

<script>
    const tooltips = document.querySelectorAll('.btn')
    tooltips.forEach(t=>{
        new bootstrap.Tooltip(t)
    })
</script>

</body>
</html>
