<?php
session_start();
include("../config/database.php");

$error="";
$success="";

if(isset($_POST['signup'])){
    $full_name=trim($_POST['full_name']);
    $email=trim($_POST['email']);
    $phone=trim($_POST['phone']);
    $license=trim($_POST['license_number']);
    $expiry=$_POST['license_expiry'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm_password'];

    if(empty($full_name)||empty($email)||empty($phone)||empty($license)||empty($expiry)||empty($password)||empty($confirm)){
        $error="Please fill all fields.";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error="Invalid email.";
    }elseif($password!=$confirm){
        $error="Passwords do not match.";
    }else{

        $stmt=mysqli_prepare($conn,"SELECT user_id FROM users WHERE email=?");
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_num_rows($stmt)>0){
            $error="Email already exists.";
        }else{

            $stmt=mysqli_prepare($conn,"SELECT driver_id FROM drivers WHERE license_number=?");
            mysqli_stmt_bind_param($stmt,"s",$license);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt)>0){
                $error="License number already exists.";
            }else{

                $role=mysqli_query($conn,"SELECT role_id FROM roles WHERE role_name='Driver'");
                $role=mysqli_fetch_assoc($role);
                $role_id=$role['role_id'];

                $hash=password_hash($password,PASSWORD_DEFAULT);

                $stmt=mysqli_prepare($conn,"INSERT INTO users(role_id,full_name,email,password,phone,status)
                VALUES(?,?,?,?,?,'Active')");
                mysqli_stmt_bind_param($stmt,"issss",$role_id,$full_name,$email,$hash,$phone);

                if(mysqli_stmt_execute($stmt)){
                    $uid=mysqli_insert_id($conn);

                    $stmt=mysqli_prepare($conn,"INSERT INTO drivers(user_id,license_number,license_expiry,safety_score,status)
                    VALUES(?,?,?,100,'Available')");
                    mysqli_stmt_bind_param($stmt,"iss",$uid,$license,$expiry);

                    if(mysqli_stmt_execute($stmt)){
                        $success="Account created successfully!";
                        header("refresh:2;url=login.php");
                    }else{
                        $error="Unable to create driver profile.";
                    }
                }else{
                    $error="Unable to create account.";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Signup</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{background:#f4f4f4}
.left{background:#1f252b;color:#fff;min-height:100vh;padding:40px}
.right{display:flex;align-items:center;justify-content:center;min-height:100vh}
.box{background:#fff;padding:35px;border-radius:15px;box-shadow:0 0 15px rgba(0,0,0,.1);width:520px}
.btn-main{background:#f4a300;color:#fff}
</style>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-3 left">
<h2>TransitOps</h2>
<p>Smart Transport Operations Platform</p>
</div>
<div class="col-md-9 right">
<div class="box">
<h3>Create Driver Account</h3>

<?php if($error!=""){?><div class="alert alert-danger"><?=$error?></div><?php }?>
<?php if($success!=""){?><div class="alert alert-success"><?=$success?></div><?php }?>

<form method="post">
<input class="form-control mb-3" name="full_name" placeholder="Full Name" required>
<input class="form-control mb-3" type="email" name="email" placeholder="Email" required>
<input class="form-control mb-3" name="phone" placeholder="Phone Number" required>
<input class="form-control mb-3" name="license_number" placeholder="License Number" required>
<label>License Expiry</label>
<input class="form-control mb-3" type="date" name="license_expiry" required>
<input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
<input class="form-control mb-3" type="password" name="confirm_password" placeholder="Confirm Password" required>

<button class="btn btn-main w-100" name="signup">Create Account</button>

<div class="text-center mt-3">
Already have an account?
<a href="login.php">Login</a>
</div>
</form>

</div>
</div>
</div>
</div>
</body>
</html>