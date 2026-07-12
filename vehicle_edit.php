<?php

include("includes/auth_check.php");
include("includes/header.php");
include("config/database.php");

$message="";

if(!isset($_GET['id']))
{
    header("Location: vehicles.php");
    exit();
}

$vehicle_id=(int)$_GET['id'];

$stmt=mysqli_prepare(

$conn,

"SELECT *

FROM vehicles

WHERE vehicle_id=?"

);

mysqli_stmt_bind_param(

$stmt,

"i",

$vehicle_id

);

mysqli_stmt_execute($stmt);

$result=mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result)==0)
{
    header("Location: vehicles.php");
    exit();
}

$vehicle=mysqli_fetch_assoc($result);
if(isset($_POST['update']))
{

    $registration_number = trim($_POST['registration_number']);

    $vehicle_name = trim($_POST['vehicle_name']);

    $vehicle_type = trim($_POST['vehicle_type']);

    $max_load_capacity = $_POST['max_load_capacity'];

    $odometer = $_POST['odometer'];

    $acquisition_cost = $_POST['acquisition_cost'];

    $status = $_POST['status'];

    // Check duplicate registration number
    $check = mysqli_prepare(

        $conn,

        "SELECT vehicle_id
         FROM vehicles
         WHERE registration_number=?
         AND vehicle_id<>?"

    );

    mysqli_stmt_bind_param(

        $check,

        "si",

        $registration_number,

        $vehicle_id

    );

    mysqli_stmt_execute($check);

    mysqli_stmt_store_result($check);

    if(mysqli_stmt_num_rows($check)>0)
    {

        $message =

        "<div class='alert alert-danger'>

        Registration Number already exists.

        </div>";

    }

    else
    {

        $update = mysqli_prepare(

            $conn,

            "UPDATE vehicles

            SET

            registration_number=?,

            vehicle_name=?,

            vehicle_type=?,

            max_load_capacity=?,

            odometer=?,

            acquisition_cost=?,

            status=?

            WHERE vehicle_id=?"

        );

        mysqli_stmt_bind_param(

            $update,

            "sssiddsi",

            $registration_number,

            $vehicle_name,

            $vehicle_type,

            $max_load_capacity,

            $odometer,

            $acquisition_cost,

            $status,

            $vehicle_id

        );

        if(mysqli_stmt_execute($update))
        {

            header("Location: vehicles.php?updated=1");

            exit();

        }

        else
        {

            $message =

            "<div class='alert alert-danger'>

            Unable to update vehicle.

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

            <h1>Edit Vehicle</h1>

            <p>Update vehicle information.</p>

        </div>

        <?php echo $message; ?>

        <div class="recent-trips">

            <form method="POST">

                <div class="form-grid">

                    <div class="form-group">

                        <label>Registration Number</label>

                        <input
                        type="text"
                        name="registration_number"
                        value="<?php echo htmlspecialchars($vehicle['registration_number']); ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Vehicle Name</label>

                        <input
                        type="text"
                        name="vehicle_name"
                        value="<?php echo htmlspecialchars($vehicle['vehicle_name']); ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Vehicle Type</label>

                        <select name="vehicle_type" required>

                            <option value="Truck" <?php if($vehicle['vehicle_type']=="Truck") echo "selected"; ?>>Truck</option>

                            <option value="Mini Truck" <?php if($vehicle['vehicle_type']=="Mini Truck") echo "selected"; ?>>Mini Truck</option>

                            <option value="Van" <?php if($vehicle['vehicle_type']=="Van") echo "selected"; ?>>Van</option>

                            <option value="Bus" <?php if($vehicle['vehicle_type']=="Bus") echo "selected"; ?>>Bus</option>

                            <option value="Trailer" <?php if($vehicle['vehicle_type']=="Trailer") echo "selected"; ?>>Trailer</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Maximum Load Capacity (KG)</label>

                        <input
                        type="number"
                        name="max_load_capacity"
                        value="<?php echo $vehicle['max_load_capacity']; ?>"
                        required>

                    </div>
                                        <div class="form-group">

                        <label>Current Odometer (KM)</label>

                        <input
                        type="number"
                        name="odometer"
                        value="<?php echo $vehicle['odometer']; ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Acquisition Cost (₹)</label>

                        <input
                        type="number"
                        step="0.01"
                        name="acquisition_cost"
                        value="<?php echo $vehicle['acquisition_cost']; ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <select name="status" required>

                            <option value="Available"
                            <?php if($vehicle['status']=="Available") echo "selected"; ?>>
                                Available
                            </option>

                            <option value="On Trip"
                            <?php if($vehicle['status']=="On Trip") echo "selected"; ?>>
                                On Trip
                            </option>

                            <option value="In Shop"
                            <?php if($vehicle['status']=="In Shop") echo "selected"; ?>>
                                In Shop
                            </option>

                            <option value="Retired"
                            <?php if($vehicle['status']=="Retired") echo "selected"; ?>>
                                Retired
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

                        Update Vehicle

                    </button>

                    <a
                    href="vehicles.php"
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
