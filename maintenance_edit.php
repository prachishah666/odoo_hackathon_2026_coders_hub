<?php

include("includes/auth_check.php");
include("includes/header.php");
include("config/database.php");

$message="";

if(!isset($_GET['id']))
{
    header("Location: maintenance.php");
    exit();
}

$maintenance_id=(int)$_GET['id'];

$stmt=mysqli_prepare(

$conn,

"SELECT *

FROM maintenance_logs

WHERE maintenance_id=?"

);

mysqli_stmt_bind_param(

$stmt,

"i",

$maintenance_id

);

mysqli_stmt_execute($stmt);

$result=mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result)==0)
{
    header("Location: maintenance.php");
    exit();
}

$maintenance=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{

    $maintenance_type = trim($_POST['maintenance_type']);

    $description = trim($_POST['description']);

    $maintenance_cost = $_POST['maintenance_cost'];

    $start_date = $_POST['start_date'];

    $end_date = $_POST['end_date'];

    $status = $_POST['status'];

    mysqli_begin_transaction($conn);

    try
    {

        // Update maintenance record

        $update = mysqli_prepare(

            $conn,

            "UPDATE maintenance_logs

            SET

            maintenance_type=?,

            description=?,

            maintenance_cost=?,

            start_date=?,

            end_date=?,

            status=?

            WHERE maintenance_id=?"

        );

        mysqli_stmt_bind_param(

            $update,

            "ssdsssi",

            $maintenance_type,

            $description,

            $maintenance_cost,

            $start_date,

            $end_date,

            $status,

            $maintenance_id

        );

        mysqli_stmt_execute($update);

        // Update vehicle status

        if($status=="Completed")
        {
            $vehicleStatus = "Available";
        }
        else
        {
            $vehicleStatus = "In Shop";
        }

        $updateVehicle = mysqli_prepare(

            $conn,

            "UPDATE vehicles

            SET status=?

            WHERE vehicle_id=?"

        );

        mysqli_stmt_bind_param(

            $updateVehicle,

            "si",

            $vehicleStatus,

            $maintenance['vehicle_id']

        );

        mysqli_stmt_execute($updateVehicle);

        mysqli_commit($conn);

        header("Location: maintenance.php?updated=1");

        exit();

    }
    catch(Exception $e)
    {

        mysqli_rollback($conn);

        $message =

        "<div class='alert alert-danger'>

        Unable to update maintenance record.

        </div>";

    }

}

?>
<div class="container">

    <?php include("includes/sidebar.php"); ?>

    <div class="main-content">

        <?php include("includes/navbar.php"); ?>

        <div class="page-title">

            <h1>Edit Maintenance</h1>

            <p>Update maintenance details.</p>

        </div>

        <?php echo $message; ?>

        <div class="recent-trips">

            <form method="POST">

                <div class="form-grid">

                    <?php

                    $vehicleQuery = mysqli_prepare(

                        $conn,

                        "SELECT registration_number, vehicle_name
                         FROM vehicles
                         WHERE vehicle_id=?"

                    );

                    mysqli_stmt_bind_param(
                        $vehicleQuery,
                        "i",
                        $maintenance['vehicle_id']
                    );

                    mysqli_stmt_execute($vehicleQuery);

                    $vehicleResult = mysqli_stmt_get_result($vehicleQuery);

                    $vehicle = mysqli_fetch_assoc($vehicleResult);

                    ?>

                    <div class="form-group">

                        <label>Vehicle</label>

                        <input
                        type="text"
                        value="<?php echo htmlspecialchars($vehicle['registration_number'].' - '.$vehicle['vehicle_name']); ?>"
                        readonly>

                    </div>

                    <div class="form-group">

                        <label>Maintenance Type</label>

                        <select name="maintenance_type" required>

                            <option value="Engine Service" <?php if($maintenance['maintenance_type']=="Engine Service") echo "selected"; ?>>Engine Service</option>

                            <option value="Oil Change" <?php if($maintenance['maintenance_type']=="Oil Change") echo "selected"; ?>>Oil Change</option>

                            <option value="Brake Service" <?php if($maintenance['maintenance_type']=="Brake Service") echo "selected"; ?>>Brake Service</option>

                            <option value="Tyre Replacement" <?php if($maintenance['maintenance_type']=="Tyre Replacement") echo "selected"; ?>>Tyre Replacement</option>

                            <option value="Battery Replacement" <?php if($maintenance['maintenance_type']=="Battery Replacement") echo "selected"; ?>>Battery Replacement</option>

                            <option value="General Service" <?php if($maintenance['maintenance_type']=="General Service") echo "selected"; ?>>General Service</option>

                            <option value="Other" <?php if($maintenance['maintenance_type']=="Other") echo "selected"; ?>>Other</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Maintenance Cost (₹)</label>

                        <input
                        type="number"
                        step="0.01"
                        name="maintenance_cost"
                        value="<?php echo $maintenance['maintenance_cost']; ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Start Date</label>

                        <input
                        type="date"
                        name="start_date"
                        value="<?php echo $maintenance['start_date']; ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>End Date</label>

                        <input
                        type="date"
                        name="end_date"
                        value="<?php echo $maintenance['end_date']; ?>">

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <select name="status" required>

                            <option value="Active"
                            <?php if($maintenance['status']=="Active") echo "selected"; ?>>
                                Active
                            </option>

                            <option value="Completed"
                            <?php if($maintenance['status']=="Completed") echo "selected"; ?>>
                                Completed
                            </option>

                        </select>

                    </div>

                    <div class="form-group" style="grid-column:1/-1;">

                        <label>Description</label>

                        <textarea
                        name="description"
                        rows="5"
                        required><?php echo htmlspecialchars($maintenance['description']); ?></textarea>

                    </div>

                </div>

                <div class="form-buttons">

                    <button
                    type="submit"
                    name="update"
                    class="dispatch-btn">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Update Maintenance

                    </button>

                    <a
                    href="maintenance.php"
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