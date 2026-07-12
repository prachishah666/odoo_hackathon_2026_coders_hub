<?php
include("includes/auth_check.php");
include("includes/header.php");
include("config/database.php");

$message = "";

if(isset($_POST['save']))
{
    $registration_number = trim($_POST['registration_number']);
    $vehicle_name = trim($_POST['vehicle_name']);
    $vehicle_type = trim($_POST['vehicle_type']);
    $max_load_capacity = trim($_POST['max_load_capacity']);
    $odometer = trim($_POST['odometer']);
    $acquisition_cost = trim($_POST['acquisition_cost']);
    $status = $_POST['status'];

    // Duplicate Registration Check
    $check = mysqli_prepare($conn,
    "SELECT vehicle_id
    FROM vehicles
    WHERE registration_number=?");

    mysqli_stmt_bind_param(
    $check,
    "s",
    $registration_number);

    mysqli_stmt_execute($check);

    mysqli_stmt_store_result($check);

    if(mysqli_stmt_num_rows($check)>0)
    {
        $message="<div class='alert alert-danger'>
        Registration Number already exists.
        </div>";
    }
    else
    {
        $insert = mysqli_prepare(
        $conn,

        "INSERT INTO vehicles
        (
            registration_number,
            vehicle_name,
            vehicle_type,
            max_load_capacity,
            odometer,
            acquisition_cost,
            status
        )

        VALUES

        (?,?,?,?,?,?,?)"

        );

        mysqli_stmt_bind_param(

        $insert,

        "sssidds",

        $registration_number,
        $vehicle_name,
        $vehicle_type,
        $max_load_capacity,
        $odometer,
        $acquisition_cost,
        $status

        );

        if(mysqli_stmt_execute($insert))
        {

            header("Location: vehicles.php?added=1");

            exit();

        }

        else
        {

            $message =

            "<div class='alert alert-danger'>

            Unable to add vehicle.

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

            <h1>Add Vehicle</h1>

            <p>Register a new vehicle into the fleet.</p>

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
                        placeholder="GJ01AB1234"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Vehicle Name</label>

                        <input
                        type="text"
                        name="vehicle_name"
                        placeholder="Ashok Leyland Truck"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Vehicle Type</label>

                        <select
                        name="vehicle_type"
                        required>

                            <option value="">Select Vehicle</option>

                            <option>Truck</option>

                            <option>Mini Truck</option>

                            <option>Bus</option>

                            <option>Van</option>

                            <option>Trailer</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Maximum Load Capacity (KG)</label>

                        <input
                        type="number"
                        name="max_load_capacity"
                        placeholder="5000"
                        required>

                    </div>
                                        <div class="form-group">

                        <label>Current Odometer (KM)</label>

                        <input
                        type="number"
                        name="odometer"
                        placeholder="25000"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Acquisition Cost (₹)</label>

                        <input
                        type="number"
                        step="0.01"
                        name="acquisition_cost"
                        placeholder="1800000"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <select
                        name="status"
                        required>

                            <option value="">Select Status</option>

                            <option value="Available">Available</option>

                            <option value="On Trip">On Trip</option>

                            <option value="In Shop">In Shop</option>

                            <option value="Retired">Retired</option>

                        </select>

                    </div>

                </div>

                <div class="form-buttons">

                    <button
                    type="submit"
                    name="save"
                    class="dispatch-btn">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Save Vehicle

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