<?php
session_start();

include("../config/database.php");

$error = "";

if(isset($_POST['login']))
{
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];

    if(empty($email) || empty($password) || empty($role))
    {
        $error = "Please fill all fields.";
    }
    else
    {
        $stmt = mysqli_prepare($conn,"SELECT users.*, roles.role_name
                                      FROM users
                                      JOIN roles ON users.role_id = roles.role_id
                                      WHERE email=?");

        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result)==1)
        {
            $row = mysqli_fetch_assoc($result);

            if(password_verify($password,$row['password']))
            {
                if($row['role_name']==$role)
                {
                    $_SESSION['user_id']=$row['user_id'];
                    $_SESSION['name']=$row['full_name'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['role']=$row['role_name'];

                    header("Location: ../dashboard.php");
                    exit();
                }
                else
                {
                    $error="Incorrect role selected.";
                }
            }
            else
            {
                $error="Invalid Password.";
            }
        }
        else
        {
            $error="Email not registered.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>TransitOps Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

    body{

    background:#f7f7f7;

    height:100vh;

    overflow:hidden;

    font-family:'Segoe UI',sans-serif;

    }

    .left{

    background:#1F252B;

    height:100vh;

    color:white;

    padding:45px;

    }

    .logo{

    font-size:32px;

    font-weight:bold;

    margin-bottom:5px;

    }

    .subtitle{

    font-size:14px;

    color:#bdbdbd;

    margin-bottom:50px;

    }

    .role-list{

    margin-top:40px;

    }

    .role-list li{

    padding:8px;

    }

    .right{

    display:flex;

    justify-content:center;

    align-items:center;

    height:100vh;

    }

    .login-box{

    background:white;

    padding:45px;

    width:420px;

    border-radius:15px;

    box-shadow:0px 0px 15px rgba(0,0,0,.1);

    }

    .btn-login{

    background:#f4a300;

    border:none;

    color:white;

    font-weight:bold;

    }

    .btn-login:hover{

    background:#d78d00;

    }

    .error{

    background:#ffe5e5;

    padding:10px;

    border-radius:8px;

    margin-bottom:15px;

    color:red;

    }

</style>

</head>

<body>

<div class="container-fluid">

<div class="row">

<div class="col-md-3 left">

<div class="logo">

<i class="fa-solid fa-truck-fast"></i>

TransitOps

</div>

<div class="subtitle">

Smart Transport Operations Platform

</div>

<h6>Main User Roles</h6>

<ul class="role-list">

<li>Fleet Manager</li>

<li>Driver</li>

<li>Safety Officer</li>

<li>Financial Analyst</li>

</ul>

</div>

<div class="col-md-9 right">

<div class="login-box">

<h3>Sign In</h3>

<p class="text-muted">Sign in to your account</p>

<?php

if($error!="")

{

echo "<div class='error'>$error</div>";

}
?>

<form method="POST">

<div class="mb-3">

<label>Email</label>

<input
type="email"
class="form-control"
name="email"
required>

</div>

<div class="mb-3">

<label>Password</label>

<div class="input-group">

<input
type="password"
class="form-control"
id="password"
name="password"
required>

<button
type="button"
class="btn btn-outline-secondary"
onclick="togglePassword()">

<i class="fa-solid fa-eye"></i>

</button>

</div>

</div>

<div class="mb-3">

<label>Role</label>

<select class="form-select" name="role" required>

<option value="">Select Role</option>

<option>Fleet Manager</option>

<option>Driver</option>

<option>Safety Officer</option>

<option>Financial Analyst</option>

</select>

</div>

<div class="mb-3 form-check">

<input
class="form-check-input"
type="checkbox">

<label class="form-check-label">

Remember Me

</label>

</div>

<button
class="btn btn-login w-100"
name="login">

Sign In

</button>

<div class="text-center mt-3">

<a href="signup.php">

Create New Account

</a>

</div>

</form>

</div>

</div>

</div>

</div>

<script>

function togglePassword(){

var x=document.getElementById("password");

if(x.type==="password")

{

x.type="text";

}

else

{

x.type="password";

}

}

</script>

</body>

</html>