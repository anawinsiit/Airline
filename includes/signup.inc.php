<?php

//between function.. elenxei an oi xaraktires einai mesa sta oria p thetoume
function between($val, $x, $y){
    $val_len = strlen($val);
    return ($val_len >= $x && $val_len <= $y)?TRUE:FALSE;
}

if(isset($_POST['signup-submit'])) {//elenxw an exei bei sti selida mesw tou submit

    
    require 'dbh.inc.php';
    
    $first = $_POST['first'];
    $last = $_POST['last'];
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    $gender = $_POST['gender'];
    $telnum = $_POST['telnum'];
    $justNums = preg_replace("/[^0-9]/", '', $telnum);
        //eliminate leading 1 if its there
        // if (strlen($justNums) == 11) $justNums = preg_replace("/^1/", '',$justNums);
        //if we have 10 digits left, it's probably valid.
    if (strlen($justNums) == 10) $isPhoneNum = true;
    
    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../index.php?error=invalidemailusername");
        exit();  
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=invalidemail");
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username) || !between($username,4,20)) {
        header("Location: ../index.php?error=invalidusername");
        exit();
    }
    else if(!between($password,6,20)) {
        header("Location: ../index.php?error=invalidpassword");
        exit();
    }
    else if($password !== $passwordRepeat){
       header("Location: ../index.php?error=passworddontmatch");
       exit();
    }
    else if (!$isPhoneNum){
        header("Location: ../index.php?error=phonenumbererror");
        exit();
    }
   else {
       
       $sql = "SELECT username, email FROM customer WHERE username=? OR email=?";
       $stmt = mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt, $sql)){
           header("Location: ../index.php?error=error1");
           exit();
       }
       else {
           mysqli_stmt_bind_param($stmt, "ss", $username, $email);     //elenxos an uparxei email kai username idi
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $resultCheck = mysqli_stmt_num_rows($stmt);
             if($resultCheck != 0){
                header("Location: ../index.php?error=usernameemailtaken");
                exit();
           }
          
           
           else {
            $sql = "INSERT INTO customer(username, email, password, fname, lname,gender, telnum) VALUES(?, ?, ?, ?, ?, ?,?)";
            $stmt = mysqli_stmt_init($conn);
                 if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../index.php?error=error2");
                    exit();
                }
                else {
                    // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);    //encrypting password
                    $hashedPwd = $password;
                    mysqli_stmt_bind_param($stmt, "sssssss", $username, $email, $hashedPwd, $first, $last, $gender, $telnum);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?signup=success");
                    exit();
                }
                
           }
           
       }
   } 
   //kleinw to connection
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
   
}
else{
    header("Location: ../index.php");
    exit();
    
}

