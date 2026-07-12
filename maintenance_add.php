<?php

include("includes/auth_check.php");
include("includes/header.php");
include("config/database.php");

$message="";

if(isset($_POST['save']))
{

    $vehicle_id = $_POST['vehicle_id'];

    $maintenance_type = trim($_POST['maintenance_type']);

    $description = trim($_POST['description']);

    $maintenance_cost = $_POST['maintenance_cost'];

    $start_date = $_POST['start_date'];

    $end_date = $_POST['end_date'];

    $status = $_POST['status'];
        mysqli_begin_transaction($conn);

    try
    {

        // Insert into maintenance_logs

        $insert = mysqli_prepare(

            $conn,

            "INSERT INTO maintenance_logs
            (
                vehicle_id,
                maintenance_type,
                description,
                maintenance_cost,
                start_date,
                end_date,
                status
            )

            VALUES
            (
                ?,?,?,?,?,?,?
            )"

        );

        mysqli_stmt_bind_param(

            $insert,

            "issdsss",

            $vehicle_id,

            $maintenance_type,

            $description,

            $maintenance_cost,

            $start_date,

            $end_date,

            $status

        );

        mysqli_stmt_execute($insert);

        // Change vehicle status to In Shop

        $vehicleStatus = "In Shop";

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

            $vehicle_id

        );

        mysqli_stmt_execute($updateVehicle);

        mysqli_commit($conn);

        header("Location: maintenance.php?added=1");

        exit();

    }
    catch(Exception $e)
    {

        mysqli_rollback($conn);

        $message="<div class='alert alert-danger'>
        Unable to save maintenance record.
        </div>";

    }

}

?>
<div class="container">

    <?php include("includes/sidebar.php"); ?>

    <div class="main-content">

        <?php include("includes/navbar.php"); ?>

        <div class="page-title">

            <h1>Add Maintenance</h1>

            <p>Create a new maintenance record.</p>

        </div>

        <?php echo $message; ?>

        <div class="recent-trips">

            <form method="POST">

                <div class="form-grid">

                    <div class="form-group">

                        <label>Select Vehicle</label>

                        <select name="vehicle_id" required>

                            <option value="">Select Vehicle</option>

                            <?php

                            $vehicles = mysqli_query(

                                $conn,

                                "SELECT
                                    vehicle_id,
                                    registration_number,
                                    vehicle_name
                                 FROM vehicles
                                 WHERE status='Available'
                                 ORDER BY vehicle_name ASC"

                            );

                            while($vehicle = mysqli_fetch_assoc($vehicles))
                            {

                            ?>

                            <option value="<?php echo $vehicle['vehicle_id']; ?>">

                                <?php

                                echo $vehicle['registration_number'];

                                echo " - ";

                                echo $vehicle['vehicle_name'];

                                ?>

                            </option>

                            <?php

                            }

                            ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Maintenance Type</label>

                        <select
                        name="maintenance_type"
                        required>

                            <option value="">Select</option>

                            <option>Engine Service</option>

                            <option>Oil Change</option>

                            <option>Brake Service</option>

                            <option>Tyre Replacement</option>

                            <option>Battery Replacement</option>

                            <option>General Service</option>

                            <option>Other</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Maintenance Cost (₹)</label>

                        <input
                        type="number"
                        step="0.01"
                        name="maintenance_cost"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Start Date</label>

                        <input
                        type="date"
                        name="start_date"
                        required>

                    </div>

                    <div class="form-group">

                        <label>End Date</label>

                        <input
                        type="date"
                        name="end_date">

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <select
                        name="status"
                        required>

                            <option value="Active">Active</option>

                            <option value="Completed">Completed</option>

                        </select>

                    </div>

                    <div class="form-group" style="grid-column:1/-1;">

                        <label>Description</label>

                        <textarea
                        name="description"
                        rows="5"
                        required></textarea>

                    </div>

                </div>

                <div class="form-buttons">

                    <button
                    type="submit"
                    name="save"
                    class="dispatch-btn">

                        <i class="fa-solid fa-screwdriver-wrench"></i>

                        Save Maintenance

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