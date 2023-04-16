<?php

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

$con = new mysqli("localhost","root","","users");
if($con->connect_error){
    die("Failed to connect : " .$con->connect_error);
}else{
    $stmt = $con->prepare("select * from tb_users where email = ?");
    $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows>0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                $_SESSION['email'] = $email;
                echo "alert(Welcome, )".$_SESSION['email'];
                header("Location: http://localhost:3000/lease/lease.html");
            }else{
                header("Location: invalid.html");
            }
        }else{
            header("Location: invalid.html");
        }
    }
?>