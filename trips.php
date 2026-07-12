<?php

include("includes/auth_check.php");
include("config/database.php");

$query = mysqli_query(
    $conn,
    "SELECT

        t.trip_id,
        t.source,
        t.destination,
        t.planned_distance,
        t.status,

        v.vehicle_name,
        v.registration_number,

        u.full_name

    FROM trips t

    INNER JOIN vehicles v
        ON t.vehicle_id = v.vehicle_id

    INNER JOIN drivers d
        ON t.driver_id = d.driver_id

    INNER JOIN users u
        ON d.user_id = u.user_id

    ORDER BY t.trip_id DESC"
);

include("includes/header.php");

?>

<div class="container">

<?php include("includes/sidebar.php"); ?>

<div class="main-content">

<?php include("includes/navbar.php"); ?>

<div class="page-title">

    <h1>Trips</h1>

    <p>

        Manage all fleet trips.

    </p>

</div>

<section class="recent-trips">

<div class="section-header">

    <h3>Trip List</h3>

    <a href="trip_add.php">

        <button class="dispatch-btn">

            <i class="fa-solid fa-plus"></i>

            Create Trip

        </button>

    </a>

</div>

<table>

<thead>

<tr>

<th>ID</th>

<th>Vehicle</th>

<th>Driver</th>

<th>Source</th>

<th>Destination</th>

<th>Distance</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>

<tbody>
    <?php

while($row = mysqli_fetch_assoc($query))
{

?>

<tr>

    <td>

        <?= $row['trip_id']; ?>

    </td>

    <td>

        <?= htmlspecialchars($row['registration_number']); ?>

        <br>

        <small>

            <?= htmlspecialchars($row['vehicle_name']); ?>

        </small>

    </td>

    <td>

        <?= htmlspecialchars($row['full_name']); ?>

    </td>

    <td>

        <?= htmlspecialchars($row['source']); ?>

    </td>

    <td>

        <?= htmlspecialchars($row['destination']); ?>

    </td>

    <td>

        <?= $row['planned_distance']; ?> km

    </td>

    <td>

    <?php

    $status = strtolower($row['status']);

    $class = "badge";

    if($status == "completed")
    {
        $class .= " green";
    }
    elseif($status == "dispatched")
    {
        $class .= " blue";
    }
        elseif($status == "draft")
    {
        $class .= " orange";
    }
        elseif($status == "cancelled")
    {
        $class .= " red";
    }

?>

<span class="<?= $class; ?>">

    <?= htmlspecialchars($row['status']); ?>

</span>

</td>

    <td>

        <a href="trip_complete.php?id=<?= $row['trip_id']; ?>">

            <button class="edit-btn">

                <i class="fa-solid fa-circle-check"></i>

            </button>

        </a>

    </td>

</tr>

<?php

}

?>

</tbody>

</table>

</section>

</section>

</div>

</div>

<?php include("includes/footer.php"); ?>