<?php

include("includes/auth_check.php");
include("includes/header.php");
include("config/database.php");

$message="";

if(isset($_POST['save']))
{

    $full_name = trim($_POST['full_name']);

    $email = trim($_POST['email']);

    $phone = trim($_POST['phone']);

    $password = $_POST['password'];

    $license_number = trim($_POST['license_number']);

    $license_category = trim($_POST['license_category']);

    $license_expiry = $_POST['license_expiry'];

    $safety_score = $_POST['safety_score'];

    $driver_status = $_POST['driver_status'];

    $user_status = $_POST['user_status'];

    $role_id = 2;
    // Check if email already exists

    $checkEmail = mysqli_prepare(

        $conn,

        "SELECT user_id
         FROM users
         WHERE email=?"

    );

    mysqli_stmt_bind_param(

        $checkEmail,

        "s",

        $email

    );

    mysqli_stmt_execute($checkEmail);

    mysqli_stmt_store_result($checkEmail);

    if(mysqli_stmt_num_rows($checkEmail)>0)
    {

        $message="<div class='alert alert-danger'>
        Email already exists.
        </div>";

    }

    else
    {

        // Check if License Number already exists

        $checkLicense = mysqli_prepare(

            $conn,

            "SELECT driver_id
             FROM drivers
             WHERE license_number=?"

        );

        mysqli_stmt_bind_param(

            $checkLicense,

            "s",

            $license_number

        );

        mysqli_stmt_execute($checkLicense);

        mysqli_stmt_store_result($checkLicense);

        if(mysqli_stmt_num_rows($checkLicense)>0)
        {

            $message="<div class='alert alert-danger'>
            License Number already exists.
            </div>";

        }

        else
        {

            // Password Hashing

            $hashedPassword = password_hash(

                $password,

                PASSWORD_DEFAULT

            );
                        // Insert into users table

            $insertUser = mysqli_prepare(

                $conn,

                "INSERT INTO users
                (
                    role_id,
                    full_name,
                    email,
                    password,
                    phone,
                    status
                )

                VALUES
                (
                    ?,?,?,?,?,?
                )"

            );

            mysqli_stmt_bind_param(

                $insertUser,

                "isssss",

                $role_id,

                $full_name,

                $email,

                $hashedPassword,

                $phone,

                $user_status

            );

            if(mysqli_stmt_execute($insertUser))
            {

                $user_id = mysqli_insert_id($conn);

                // Insert into drivers table

                $insertDriver = mysqli_prepare(

                    $conn,

                    "INSERT INTO drivers
                    (
                        user_id,
                        license_number,
                        license_category,
                        license_expiry,
                        safety_score,
                        status
                    )

                    VALUES
                    (
                        ?,?,?,?,?,?
                    )"

                );

                mysqli_stmt_bind_param(

                    $insertDriver,

                    "isssds",

                    $user_id,

                    $license_number,

                    $license_category,

                    $license_expiry,

                    $safety_score,

                    $driver_status

                );

                if(mysqli_stmt_execute($insertDriver))
                {

                    header("Location: drivers.php?added=1");

                    exit();

                }
                else
                {

                    $message="<div class='alert alert-danger'>
                    Unable to create driver record.
                    </div>";

                }

            }
            else
            {

                $message="<div class='alert alert-danger'>
                Unable to create user.
                </div>";

            }

        }

    }

}

?>
<div class="container">

    <?php include("includes/sidebar.php"); ?>

    <div class="main-content">

        <?php include("includes/navbar.php"); ?>

        <div class="page-title">

            <h1>Add Driver</h1>

            <p>Register a new driver.</p>

        </div>

        <?php echo $message; ?>

        <div class="recent-trips">

            <form method="POST">

                <div class="form-grid">

                    <div class="form-group">

                        <label>Full Name</label>

                        <input
                        type="text"
                        name="full_name"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Email</label>

                        <input
                        type="email"
                        name="email"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Phone</label>

                        <input
                        type="text"
                        name="phone"
                        maxlength="15"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Password</label>

                        <input
                        type="password"
                        name="password"
                        required>

                    </div>

                    <div class="form-group">

                        <label>License Number</label>

                        <input
                        type="text"
                        name="license_number"
                        required>

                    </div>

                    <div class="form-group">

                        <label>License Category</label>

                        <select
                        name="license_category"
                        required>

                            <option value="">Select</option>

                            <option>LMV</option>

                            <option>HMV</option>

                            <option>MCWG</option>

                            <option>Transport</option>

                        </select>

                    </div>
                                        <div class="form-group">

                        <label>License Expiry</label>

                        <input
                        type="date"
                        name="license_expiry"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Safety Score</label>

                        <input
                        type="number"
                        step="0.01"
                        min="0"
                        max="100"
                        name="safety_score"
                        value="100"
                        required>

                    </div>

                    <div class="form-group">

                        <label>User Status</label>

                        <select
                        name="user_status"
                        required>

                            <option value="Active" selected>Active</option>

                            <option value="Inactive">Inactive</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Driver Status</label>

                        <select
                        name="driver_status"
                        required>

                            <option value="Available" selected>Available</option>

                            <option value="On Trip">On Trip</option>

                            <option value="Off Duty">Off Duty</option>

                            <option value="Suspended">Suspended</option>

                        </select>

                    </div>

                </div>

                <div class="form-buttons">

                    <button
                    type="submit"
                    name="save"
                    class="dispatch-btn">

                        <i class="fa-solid fa-user-plus"></i>

                        Save Driver

                    </button>

                    <a
                    href="drivers.php"
                    class="cancel-btn"
                    style="text-decoration:none;display:inline-flex;align-items:center;justify-content:center;">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<?php include("includes/footer.php"); ?>