<div class="table-responsive">
<table class="table table-bordered">
<thead class="text-monospace">
    <tr>
        <th scope="col">Student ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Middle Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Birthday</th>
        <th scope="col">Age</th>
        <th scope="col">Address 1</th>
        <th scope="col">Address 2</th>
        <th scope="col">Region</th>
        <th scope="col">City</th>
        <th scope="col" colspan="2" class="text-center">Actions</th>
    </tr>
</thead>
<tbody>

<?php 

include('db_connection.php');

$limit = 3;  
if (isset($_GET["page"]))
{ 
    $page_number  = $_GET["page"]; 
} 
else 
{ 
    $page_number=1; 
};  

$initial_page = ($page_number-1) * $limit;  
$sql = "SELECT *
        FROM ((`student` INNER JOIN `region` ON `student`.`region_id` = `region`.`region_id`)
        INNER JOIN `city` ON `student`.`city_id` = `city`.`city_id`)
        LIMIT ".$initial_page.", ".$limit.";";  
$result = mysqli_query($conn, $sql);  

    if(mysqli_num_rows($result) > 0)
    {
        while($data = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<th scope='row'>" . $data['student_id'] . "</th>";
            echo "<td>" . $data['first_name'] . "</td>";
            echo "<td>" . $data['middle_name'] . "</td>";
            echo "<td>" . $data['last_name'] . "</td>";
            echo "<td>" . $data['birthday'] . "</td>";

            // computation for age
            $birthDay = $data['birthday'];
            $today = date("Y-m-d");
            $diff = date_diff(date_create($birthDay), date_create($today));
            $age = $diff->format('%y');
            
            echo "<td> ". $age ."</td>";
            echo "<td>" . $data['address_1'] . "</td>";
            echo "<td>" . $data['address_2'] . "</td>";
            echo "<td>" . $data['region_name'] . "</td>";
            echo "<td>" . $data['city_name'] . "</td>";
            echo '<td><button type="button" class="btn btn-info btn-sm btn-ed" data-toggle="tooltip" data-placement="top" title="Edit" onclick="window.location.href=\'update-student.php?student_id='. $data['student_id'].'\'"><i data-feather="edit" id="edit"></i></button></td>';
            echo '<td><button type="button" class="btn btn-danger btn-sm btn-del" data-toggle="tooltip" data-placement="top" title="Delete" data-id="'. $data['student_id'] .'"><i data-feather="trash-2" id="trash-2"></i></button></td>';
            echo "<tr>";
        }
    }
    else
    {
        echo 
        "<tr>
            <th scope='row' colspan='1'>No student profile found.<br>". mysqli_error($conn) . "</th>
            <td colspan='11' style='background-color:#C8A2C8;'></td>
        </tr>";
    }

?>

</tbody>
</table>


<script>
    feather.replace();
</script>

<script>
    const tooltips = document.querySelectorAll('.btn')
    tooltips.forEach(t=>{
        new bootstrap.Tooltip(t)
    })
</script>

