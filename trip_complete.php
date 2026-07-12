<?php

include("includes/auth_check.php");
include("config/database.php");

if(!isset($_GET['id']))
{
    header("Location: trips.php");
    exit();
}

$trip_id = intval($_GET['id']);

if(isset($_POST['complete_trip']))
{

    $actual_distance = $_POST['actual_distance'];
    $end_odometer = $_POST['end_odometer'];
    $revenue = $_POST['revenue'];

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE trips
        SET
            actual_distance=?,
            end_odometer=?,
            revenue=?,
            status='Completed'
        WHERE trip_id=?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "dddi",
        $actual_distance,
        $end_odometer,
        $revenue,
        $trip_id
    );

    if(mysqli_stmt_execute($stmt))
    {

        $tripInfo = mysqli_query(
            $conn,
            "SELECT
                vehicle_id,
                driver_id
             FROM trips
             WHERE trip_id='$trip_id'"
        );

        $trip = mysqli_fetch_assoc($tripInfo);

        mysqli_query(
            $conn,
            "UPDATE vehicles
             SET status='Available'
             WHERE vehicle_id='{$trip['vehicle_id']}'"
        );

        mysqli_query(
            $conn,
            "UPDATE drivers
             SET status='Available'
             WHERE driver_id='{$trip['driver_id']}'"
        );

        header("Location: trips.php");
        exit();

    }

}

$query = mysqli_query(
    $conn,
    "SELECT

        t.*,

        v.registration_number,
        v.vehicle_name,

        u.full_name

     FROM trips t

     INNER JOIN vehicles v
        ON t.vehicle_id=v.vehicle_id

     INNER JOIN drivers d
        ON t.driver_id=d.driver_id

     INNER JOIN users u
        ON d.user_id=u.user_id

     WHERE t.trip_id='$trip_id'"
);

$trip = mysqli_fetch_assoc($query);

include("includes/header.php");

?>

<div class="container">

<?php include("includes/sidebar.php"); ?>

<div class="main-content">

<?php include("includes/navbar.php"); ?>

<div class="page-title">

<h1>Complete Trip</h1>

<p>

Finalize this trip.

</p>

</div>

<section class="recent-trips">

<form method="POST">

<div class="form-grid">
    <div class="form-group">

<label>Vehicle</label>

<input
type="text"
value="<?= htmlspecialchars($trip['registration_number']); ?> - <?= htmlspecialchars($trip['vehicle_name']); ?>"
readonly>

</div>

<div class="form-group">

<label>Driver</label>

<input
type="text"
value="<?= htmlspecialchars($trip['full_name']); ?>"
readonly>

</div>

<div class="form-group">

<label>Source</label>

<input
type="text"
value="<?= htmlspecialchars($trip['source']); ?>"
readonly>

</div>

<div class="form-group">

<label>Destination</label>

<input
type="text"
value="<?= htmlspecialchars($trip['destination']); ?>"
readonly>

</div>

<div class="form-group">

<label>Actual Distance (km)</label>

<input
type="number"
step="0.01"
name="actual_distance"
required>

</div>

<div class="form-group">

<label>End Odometer</label>

<input
type="number"
step="0.01"
name="end_odometer"
required>

</div>

<div class="form-group">

<label>Revenue (₹)</label>

<input
type="number"
step="0.01"
name="revenue"
required>

</div>

</div>

<div class="form-buttons">

<button
type="submit"
name="complete_trip"
class="dispatch-btn">

<i class="fa-solid fa-circle-check"></i>

Complete Trip

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
</section>

</div>

</div>

<?php include("includes/footer.php"); ?>