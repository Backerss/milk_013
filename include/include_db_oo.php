<?php
$servername = "localhost";
$username = "root";
$hostpassword = "";
$dbname = "cdte_65_013";

$conn = new mysqli($servername, $username, $hostpassword, $dbname);
$conn -> set_charset("utf8");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
function get_data($conn,$sql){
    $result = $conn->query($sql);
    $all = [];
    while($row = $result->fetch_assoc()) {
    $all[] = $row;
    }
    return $all;
                
}
?>