<?php
// Connect to the database

$con = mysqli_connect('localhost','root','','mdhh-shop');
if(mysqli_connect_error()){
    echo "<font color= red>Database Can't Connect ❌</font>";
}
// else{
//     echo "Database Connect ✅ 🔒</font>";
// }

// Fetch all items from the database
// $sql = "SELECT * FROM product";
// $result = $conn->query($sql);