<?php

include("includes/auth_check.php");
include("includes/header.php");
include("config/database.php");

$message="";

if(!isset($_GET['id']))
{
    header("Location: drivers.php");
    exit();
}

$driver_id=(int)$_GET['id'];

$stmt=mysqli_prepare(

$conn,

"SELECT

d.driver_id,
d.user_id,
d.license_number,
d.license_category,
d.license_expiry,
d.safety_score,
d.status AS driver_status,

u.full_name,
u.email,
u.phone,
u.status AS user_status

FROM drivers d

INNER JOIN users u

ON d.user_id=u.user_id

WHERE d.driver_id=?"

);

mysqli_stmt_bind_param(

$stmt,

"i",

$driver_id

);

mysqli_stmt_execute($stmt);

$result=mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result)==0)
{
    header("Location: drivers.php");
    exit();
}

$driver=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{

    $full_name = trim($_POST['full_name']);

    $email = trim($_POST['email']);

    $phone = trim($_POST['phone']);

    $license_number = trim($_POST['license_number']);

    $license_category = trim($_POST['license_category']);

    $license_expiry = $_POST['license_expiry'];

    $safety_score = $_POST['safety_score'];

    $driver_status = $_POST['driver_status'];

    $user_status = $_POST['user_status'];

    // Check duplicate email (ignore current user)

    $checkEmail = mysqli_prepare(

        $conn,

        "SELECT user_id
         FROM users
         WHERE email=?
         AND user_id<>?"

    );

    mysqli_stmt_bind_param(

        $checkEmail,

        "si",

        $email,

        $driver['user_id']

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

        mysqli_begin_transaction($conn);

        try
        {

            // Update users table

            $updateUser = mysqli_prepare(

                $conn,

                "UPDATE users

                SET

                full_name=?,

                email=?,

                phone=?,

                status=?

                WHERE user_id=?"

            );

            mysqli_stmt_bind_param(

                $updateUser,

                "ssssi",

                $full_name,

                $email,

                $phone,

                $user_status,

                $driver['user_id']

            );

            mysqli_stmt_execute($updateUser);

            // Update drivers table

            $updateDriver = mysqli_prepare(

                $conn,

                "UPDATE drivers

                SET

                license_number=?,

                license_category=?,

                license_expiry=?,

                safety_score=?,

                status=?

                WHERE driver_id=?"

            );

            mysqli_stmt_bind_param(

                $updateDriver,

                "sssdsi",

                $license_number,

                $license_category,

                $license_expiry,

                $safety_score,

                $driver_status,

                $driver_id

            );

            mysqli_stmt_execute($updateDriver);

            mysqli_commit($conn);

            header("Location: drivers.php?updated=1");

            exit();

        }
        catch(Exception $e)
        {

            mysqli_rollback($conn);

            $message="<div class='alert alert-danger'>
            Unable to update driver.
            </div>";

        }

    }

}

?>
<div class="container">

    <?php include("includes/sidebar.php"); ?>

    <div class="main-content">

        <?php include("includes/navbar.php"); ?>

        <div class="page-title">

            <h1>Edit Driver</h1>

            <p>Update driver details.</p>

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
                        value="<?php echo htmlspecialchars($driver['full_name']); ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Email</label>

                        <input
                        type="email"
                        name="email"
                        value="<?php echo htmlspecialchars($driver['email']); ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Phone</label>

                        <input
                        type="text"
                        name="phone"
                        value="<?php echo htmlspecialchars($driver['phone'] ?? ''); ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>License Number</label>

                        <input
                        type="text"
                        name="license_number"
                        value="<?php echo htmlspecialchars($driver['license_number']); ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>License Category</label>

                        <select name="license_category" required>

                            <option value="LMV" <?php if($driver['license_category']=="LMV") echo "selected"; ?>>LMV</option>

                            <option value="HMV" <?php if($driver['license_category']=="HMV") echo "selected"; ?>>HMV</option>

                            <option value="MCWG" <?php if($driver['license_category']=="MCWG") echo "selected"; ?>>MCWG</option>

                            <option value="Transport" <?php if($driver['license_category']=="Transport") echo "selected"; ?>>Transport</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>License Expiry</label>

                        <input
                        type="date"
                        name="license_expiry"
                        value="<?php echo $driver['license_expiry']; ?>"
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
                        value="<?php echo $driver['safety_score']; ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>User Status</label>

                        <select name="user_status" required>

                            <option value="Active"
                            <?php if($driver['user_status']=="Active") echo "selected"; ?>>
                                Active
                            </option>

                            <option value="Inactive"
                            <?php if($driver['user_status']=="Inactive") echo "selected"; ?>>
                                Inactive
                            </option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Driver Status</label>

                        <select name="driver_status" required>

                            <option value="Available"
                            <?php if($driver['driver_status']=="Available") echo "selected"; ?>>
                                Available
                            </option>

                            <option value="On Trip"
                            <?php if($driver['driver_status']=="On Trip") echo "selected"; ?>>
                                On Trip
                            </option>

                            <option value="Off Duty"
                            <?php if($driver['driver_status']=="Off Duty") echo "selected"; ?>>
                                Off Duty
                            </option>

                            <option value="Suspended"
                            <?php if($driver['driver_status']=="Suspended") echo "selected"; ?>>
                                Suspended
                            </option>

                        </select>

                    </div>

                </div>

                <div class="form-buttons">

                    <button
                    type="submit"
                    name="update"
                    class="dispatch-btn">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Update Driver

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