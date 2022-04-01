<?php 

include 'db_connection.php'; 
 
if(!empty($_POST["region_id"]))
{ 
  
    $query = "SELECT * FROM city WHERE region_id = ".$_POST['region_id']."; "; 
    $result = mysqli_query($conn,$query);     
                         
    if(mysqli_num_rows($result) > 0)
    {
        while($data = mysqli_fetch_assoc($result))
        {
            echo '<option id = "' . $data['city_id'] . '" value= "' . $data['city_id'] . '">'. $data['city_name'] . '</option>';
        }   
    }
    else{
        echo "<option>No city found. :( ". mysqli_error($conn) . "</option>";
    }
}

?>