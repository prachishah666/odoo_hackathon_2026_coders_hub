<?php

include("includes/auth_check.php");
include("config/database.php");

if(isset($_POST['create_trip']))
{

    $vehicle_id        = intval($_POST['vehicle_id']);
    $driver_id         = intval($_POST['driver_id']);
    $source            = trim($_POST['source']);
    $destination       = trim($_POST['destination']);
    $cargo_weight      = $_POST['cargo_weight'];
    $planned_distance  = $_POST['planned_distance'];
    $start_odometer    = $_POST['start_odometer'];
    $status            = $_POST['status'];

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO trips
        (
            vehicle_id,
            driver_id,
            source,
            destination,
            cargo_weight,
            planned_distance,
            start_odometer,
            status
        )
        VALUES
        (
            ?,?,?,?,?,?,?,?
        )"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "iissddds",
        $vehicle_id,
        $driver_id,
        $source,
        $destination,
        $cargo_weight,
        $planned_distance,
        $start_odometer,
        $status
    );

    if(mysqli_stmt_execute($stmt))
    {

        mysqli_query(
            $conn,
            "UPDATE vehicles
             SET status='On Trip'
             WHERE vehicle_id='$vehicle_id'"
        );

        mysqli_query(
            $conn,
            "UPDATE drivers
             SET status='On Trip'
             WHERE driver_id='$driver_id'"
        );

        header("Location: trips.php");
        exit();

    }

}

$vehicles = mysqli_query(
    $conn,
    "SELECT
        vehicle_id,
        registration_number,
        vehicle_name
     FROM vehicles
     WHERE status='Available'
     ORDER BY vehicle_name"
);

$drivers = mysqli_query(
    $conn,
    "SELECT
        d.driver_id,
        u.full_name
     FROM drivers d
     INNER JOIN users u
        ON d.user_id=u.user_id
     ORDER BY u.full_name"
);

include("includes/header.php");
include("includes/sidebar.php");
include("includes/navbar.php");

?>

<div class="page-title">

    <h1>Create New Trip</h1>

    <p>

        Assign a vehicle and driver for a new trip.

    </p>

</div>

<section class="recent-trips">

<form method="POST">

<div class="form-grid">
    <div class="form-group">

    <label>Vehicle</label>

    <select
        name="vehicle_id"
        required>

        <option value="">Select Vehicle</option>

        <?php while($vehicle = mysqli_fetch_assoc($vehicles)){ ?>

            <option value="<?= $vehicle['vehicle_id']; ?>">

                <?= htmlspecialchars($vehicle['registration_number']); ?>

                -

                <?= htmlspecialchars($vehicle['vehicle_name']); ?>

            </option>

        <?php } ?>

    </select>

</div>

<div class="form-group">

    <label>Driver</label>

    <select
        name="driver_id"
        required>

        <option value="">Select Driver</option>

        <?php while($driver = mysqli_fetch_assoc($drivers)){ ?>

            <option value="<?= $driver['driver_id']; ?>">

                <?= htmlspecialchars($driver['full_name']); ?>

            </option>

        <?php } ?>

    </select>

</div>

<div class="form-group">

    <label>Source</label>

    <input
        type="text"
        name="source"
        required>

</div>

<div class="form-group">

    <label>Destination</label>

    <input
        type="text"
        name="destination"
        required>

</div>

<div class="form-group">

    <label>Cargo Weight (kg)</label>

    <input
        type="number"
        step="0.01"
        min="0"
        name="cargo_weight"
        required>

</div>

<div class="form-group">

    <label>Planned Distance (km)</label>

    <input
        type="number"
        step="0.01"
        min="0"
        name="planned_distance"
        required>

</div>

<div class="form-group">

    <label>Start Odometer</label>

    <input
        type="number"
        step="0.01"
        min="0"
        name="start_odometer"
        required>

</div>

<div class="form-group">

    <label>Status</label>

    <select
        name="status">

        <option value="Draft">

            Draft

        </option>

        <option value="Dispatched">

            Dispatched

        </option>

    </select>

</div>

</div>

<div class="form-buttons">

    <button
        type="submit"
        name="create_trip"
        class="dispatch-btn">

        <i class="fa-solid fa-floppy-disk"></i>

        Create Trip

    </button>

    <a href="trips.php">

        <button
            type="button"
            class="cancel-btn">

            Cancel

        </button>

    </a>

</div>

</form>

</section>
<?php include("includes/footer.php"); ?>