<?php
$showError = "false";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    //Check whether this email exists
    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);

    if($numRows > 0){
        $showError = "Username already in use";
    }
    else{
        if($pass == $cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`)
             VALUES ('$user_email', '$hash', current_timestamp())";

            $result = mysqli_query($conn, $sql);
            // echo $result;
            if($result){
                $showAlert = true;
                header("Location: https://idiscuss-coding-forum07.000webhostapp.com/?signupsuccess=true");
                exit();
            }
            
        }
        else{
            $showError = "Passwords do not match";
        }
    }
    header("Location: https://idiscuss-coding-forum07.000webhostapp.com/?signupsuccess=false&error=$showError");
}
?>