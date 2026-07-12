<?php

include("includes/auth_check.php");

include("includes/header.php");

include("config/database.php");
?>


<body>

<div class="container">

    <?php include("includes/sidebar.php"); ?>



    <!-- ================= MAIN ================= -->

    <main class="main-content">

        <?php include("includes/navbar.php"); ?>

        <?php

// ==========================
// Dashboard Statistics
// ==========================

// Total Vehicles
$result = mysqli_query($conn,"SELECT COUNT(*) total FROM vehicles");
$totalVehicles = mysqli_fetch_assoc($result)['total'];

// Available Vehicles
$result = mysqli_query($conn,"
SELECT COUNT(*) total
FROM vehicles
WHERE status='Available'
");
$availableVehicles = mysqli_fetch_assoc($result)['total'];

// Vehicles In Shop
$result = mysqli_query($conn,"
SELECT COUNT(*) total
FROM vehicles
WHERE status='In Shop'
");
$maintenanceVehicles = mysqli_fetch_assoc($result)['total'];

// Vehicles On Trip
$result = mysqli_query($conn,"
SELECT COUNT(*) total
FROM vehicles
WHERE status='On Trip'
");
$tripVehicles = mysqli_fetch_assoc($result)['total'];


// Total Drivers
$result = mysqli_query($conn,"
SELECT COUNT(*) total
FROM drivers
");
$totalDrivers = mysqli_fetch_assoc($result)['total'];


// Available Drivers
$result = mysqli_query($conn,"
SELECT COUNT(*) total
FROM drivers
WHERE status='Available'
");
$availableDrivers = mysqli_fetch_assoc($result)['total'];


// Active Maintenance
$result = mysqli_query($conn,"
SELECT COUNT(*) total
FROM maintenance_logs
WHERE status='Active'
");
$activeMaintenance = mysqli_fetch_assoc($result)['total'];


// Fuel Cost This Month
$result = mysqli_query($conn,"
SELECT
IFNULL(SUM(fuel_cost),0) total

FROM fuel_logs

WHERE MONTH(fuel_date)=MONTH(CURDATE())

AND YEAR(fuel_date)=YEAR(CURDATE())
");

$monthlyFuel = mysqli_fetch_assoc($result)['total'];

// Retired Vehicles
$result = mysqli_query(
    $conn,
    "SELECT COUNT(*) total
     FROM vehicles
     WHERE status='Retired'"
);

$retiredVehicles = mysqli_fetch_assoc($result)['total'];


// Maintenance Cost

$result = mysqli_query(
    $conn,
    "SELECT IFNULL(SUM(maintenance_cost),0) total
     FROM maintenance_logs"
);

$maintenanceCost = mysqli_fetch_assoc($result)['total'];


// Percentages

if($totalVehicles>0)
{

    $availablePercent = round(($availableVehicles/$totalVehicles)*100);

    $tripPercent = round(($tripVehicles/$totalVehicles)*100);

    $maintenancePercent = round(($maintenanceVehicles/$totalVehicles)*100);

    $retiredPercent = round(($retiredVehicles/$totalVehicles)*100);

}
else
{

    $availablePercent = 0;

    $tripPercent = 0;

    $maintenancePercent = 0;

    $retiredPercent = 0;

}

// Fleet Utilization

if($totalVehicles>0)
{
    $fleetUtilization = round(

        (($tripVehicles+$maintenanceVehicles)

        /$totalVehicles)

        *100

    );
}
else
{
    $fleetUtilization = 0;
}

?>

        <!-- ========= TOP BAR ========= -->

        <header class="topbar">

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    placeholder="Search vehicles, drivers, trips...">

            </div>

            <div class="top-right">

                <button class="dispatch-btn">

                    Dispatch Trip

                </button>

                <span class="username">

                    Fleet Manager

                </span>

                <div class="avatar">

                    RK

                </div>

            </div>

        </header>

        

        <!-- ========= FILTERS ========= -->

        <section class="filters">

            <select>

                <option>Vehicle Type</option>

                <option>Truck</option>

                <option>Mini Truck</option>

                <option>Van</option>

            </select>

            <select>

                <option>Status</option>

                <option>Available</option>

                <option>On Trip</option>

                <option>Maintenance</option>

            </select>

            <select>

                <option>Region</option>

                <option>North</option>

                <option>South</option>

                <option>East</option>

                <option>West</option>

            </select>

        </section>

        <!-- ========= KPI CARDS ========= -->

        <section class="cards">

            <div class="card">

                <p>Active Vehicles</p>

                <h2><?php echo $totalVehicles; ?></h2>

            </div>

            <div class="card">

                <p>Available Vehicles</p>

                <h2><?php echo $availableVehicles; ?></h2>

            </div>

            <div class="card">

                <p>Maintenance</p>

                <h2><?php echo $activeMaintenance; ?></h2>

            </div>

            <div class="card">

                <p>Active Trips</p>

                <h2><?php echo $tripVehicles; ?></h2>

            </div>

            <div class="card">

                <p>Drivers On Duty</p>

                <h2><?php echo $availableDrivers; ?></h2>

            </div>

            <div class="card">

                <p>Fleet Utilization</p>

                <h2><?php echo $fleetUtilization; ?>%</h2>

            </div>

        </section>

        <!-- ========= LOWER GRID ========= -->

        <section class="dashboard-grid">
                        <!-- ========= RECENT TRIPS ========= -->

            <div class="recent-trips">

                <div class="section-header">

                    <h3>Recent Trips</h3>

                    <button class="view-btn">

                        View All

                    </button>

                </div>

                <table>

                    <thead>

                        <tr>

                            <th>Trip ID</th>

                            <th>Vehicle</th>

                            <th>Driver</th>

                            <th>Destination</th>

                            <th>Status</th>

                            <th>ETA</th>

                        </tr>

                    </thead>

                    <tbody>
                        <?php

$query = mysqli_query($conn, "

SELECT

t.trip_id,

t.destination,

t.status,

v.vehicle_name,

u.full_name

FROM trips t

INNER JOIN vehicles v
ON t.vehicle_id=v.vehicle_id

INNER JOIN drivers d
ON t.driver_id=d.driver_id

INNER JOIN users u
ON d.user_id=u.user_id

ORDER BY t.trip_id DESC

LIMIT 5

");

if(mysqli_num_rows($query)>0)
{

while($row=mysqli_fetch_assoc($query))
{

?>
<tr>

<td>

TR<?php echo str_pad($row['trip_id'],3,"0",STR_PAD_LEFT); ?>

</td>

<td>

<?php echo htmlspecialchars($row['vehicle_name']); ?>

</td>

<td>

<?php echo htmlspecialchars($row['full_name']); ?>

</td>

<td>

<?php echo htmlspecialchars($row['destination']); ?>

</td>

<td>

<?php

$status=$row['status'];

if($status=="Completed")
{

echo "<span class='badge green'>Completed</span>";

}
elseif($status=="Dispatched")
{

echo "<span class='badge orange'>Dispatched</span>";

}
elseif($status=="Draft")
{

echo "<span class='badge blue'>Draft</span>";

}
elseif($status=="Cancelled")
{

echo "<span class='badge red'>Cancelled</span>";

}
else
{

echo "<span class='badge blue'>".$status."</span>";

}

?>

</td>

<td>

-

</td>

</tr>

<?php

}

}
else
{

?>

<tr>

<td colspan="6" style="text-align:center;">

No Trips Found

</td>

</tr>

<?php

}

?>
                    </tbody>

                </table>

            </div>

            <!-- ========= VEHICLE STATUS ========= -->

            <div class="vehicle-status">

                <h3>Fleet Status</h3>

                <div class="status-box">

                    <div class="progress-item">

                        <div class="progress-top">

                            <span>Available</span>

                            <span><?php echo $availablePercent; ?>%</span>

                        </div>

                        <div class="progress">

                            <div class="progress-fill green" style="width:<?php echo $availablePercent; ?>%;"></div>

                        </div>

                    </div>

                    <div class="progress-item">

                        <div class="progress-top">

                            <span>On Trip</span>

                            <span><?php echo $tripPercent; ?>%</span>

                        </div>

                        <div class="progress">

                            <div class="progress-fill blue" style="width:<?php echo $tripPercent; ?>%;"></div>

                        </div>

                    </div>

                    <div class="progress-item">

                        <div class="progress-top">

                            <span>Maintenance</span>

                            <span><?php echo $maintenancePercent; ?>%</span>

                        </div>

                        <div class="progress">

                            <div class="progress-fill orange" style="width:<?php echo $maintenancePercent; ?>%;"></div>

                        </div>

                    </div>

                    <div class="progress-item">

                        <div class="progress-top">

                            <span>Retired</span>

                            <span><?php echo $retiredPercent; ?>%</span>

                        </div>

                        <div class="progress">

                            <div class="progress-fill red" style="width:<?php echo $retiredPercent; ?>%;"></div>

                        </div>

                    </div>

                </div>

                <div class="quick-summary">

                    <div class="summary-card">

                        <h4>Fuel Cost</h4>

                        <h2>₹ <?php echo number_format($monthlyFuel,2); ?></h2>

                    </div>

                    <div class="summary-card">

                        <h4>Maintenance</h4>

                        <h2>₹ <?php echo number_format($maintenanceCost,2); ?></h2>

                    </div>

                    <div class="summary-card">

                        <h4>Efficiency</h4>

                        <h2>91%</h2>

                    </div>

                </div>

            </div>

        </section>


    </main>

</div>

<script src="assets/js/dashboard.js"></script>


<?php include("includes/footer.php"); ?>