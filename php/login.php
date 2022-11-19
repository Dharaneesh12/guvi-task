<?php
$password = $_POST['password'];
$email = $_POST['email'];
$conn = mysqli_connect('localhost', 'root', '', 'guvi');
if ($conn->connect_error) {
    die("Connection failure: "
        . $conn->connect_error);
} else {
    $select = "select * from register where emailid='$email' and password='$password'";
    $result = mysqli_query($conn, $select);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        // header('location:/guvi/profile.html');
        echo json_encode("Account found");
    } else {
        echo json_encode("Account Not found");
    }
}
