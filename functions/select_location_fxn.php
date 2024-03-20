<?php
include '../settings/connection.php';

$query = "SELECT * FROM location";
$result = mysqli_query($conn, $query);
if(!$result){
    die("Query failed: ". mysqli_error($conn));
}

$locations=array();
while($row = mysqli_fetch_assoc($result)){
    $locations[] = $row;
}
// echo'<select name="familyRole">';
// echo '<option value="">Select a family role</option>';
// foreach ($familyRoles as $role) {
//     echo '<option value="'. $role['id']. '">'. $role['name']. '</option>';
// }
// echo'</select>';

mysqli_close($conn)
?>