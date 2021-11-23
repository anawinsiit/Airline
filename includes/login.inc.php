<?php
if (isset($_POST['login-submit'])) {
    
    require 'dbh.inc.php';
    
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    $staff_admin = $_POST['staff_admin'];
    
    
    if(empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error1=emptyfields");
        exit();
    }
    else {
        if($staff_admin == 3){ $sql = "SELECT * FROM customer WHERE username=? OR email=?";}
        else if($staff_admin == 1){ $sql = "SELECT * FROM staff WHERE username=? OR email=?";}
        else if($staff_admin == 2){ $sql = "SELECT * FROM admin WHERE username=? OR email=?";}
        
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error1=error");
        exit();
        }
        else {
            
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                if ($password = $row['password']){
                    $pwdCheck = true;
                }
                else{
                    $pwdCheck = false;
                }
                if($pwdCheck == false){
                    header("Location: ../index.php?error1=wrongpwd");
                    exit();   
                }
                else if($pwdCheck == true) {
                    session_start();                                //create of sessions
                    if($staff_admin == 3)
                        {$_SESSION['user_id'] = $row['customer_id'];}
                    else if($staff_admin == 1)
                        {$_SESSION['user_id'] = $row['staff_id'];}
                    else if($staff_admin == 2)
                        {$_SESSION['user_id'] = $row['admin_id'];}
                    // $_SESSION['user_id'] = $row['customer_id'];
                    $_SESSION['username'] = $row['username'];
                    if($staff_admin == 3){$_SESSION['role'] = 'customer';}
                    else if($staff_admin == 1){$_SESSION['role'] = 'staff';}
                    else if($staff_admin == 2){$_SESSION['role'] = 'admin';}

                    
                    header("Location: ../index.php?login=success");
                    exit();
                }
                else {
                    header("Location: ../index.php?error1=error2");
                    exit();    
                }
            }
            else{
                header("Location: ../index.php?error1=nouser");
                exit();
            }
        }
    }
    
}
else{
    header("Location: ../index.php");
    exit();
}
