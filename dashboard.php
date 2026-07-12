<?php
include("includes/auth_check.php");
include("includes/header.php");
include("config/database.php");
?>
<div class="container">
<?php include("includes/sidebar.php"); ?>
<div class="main-content">
<?php include("includes/navbar.php"); ?>

<div class="page-title">
<h1>Dashboard</h1>
<p>Welcome to TransitOps Smart Transport Operations Platform.</p>
</div>

<?php
function total($conn,$table,$where=""){
$sql="SELECT COUNT(*) total FROM $table";
if($where!="") $sql.=" WHERE ".$where;
$q=mysqli_query($conn,$sql);
return $q?mysqli_fetch_assoc($q)['total']:0;
}

$activeVehicles=total($conn,"vehicles","status='On Trip'");
$availableVehicles=total($conn,"vehicles","status='Available'");
$maintenance=total($conn,"vehicles","status='In Shop'");
$activeTrips=total($conn,"trips","status='Dispatched'");
$driversDuty=total($conn,"drivers","status='On Trip'");
$totalVehicles=total($conn,"vehicles");
$fleet=$totalVehicles?round(($activeVehicles/$totalVehicles)*100):0;
?>

<section class="cards">
<div class="card"><p>Active Vehicles</p><h2><?= $activeVehicles ?></h2></div>
<div class="card"><p>Available Vehicles</p><h2><?= $availableVehicles ?></h2></div>
<div class="card"><p>Maintenance</p><h2><?= $maintenance ?></h2></div>
<div class="card"><p>Active Trips</p><h2><?= $activeTrips ?></h2></div>
<div class="card"><p>Drivers On Duty</p><h2><?= $driversDuty ?></h2></div>
<div class="card"><p>Fleet Utilization</p><h2><?= $fleet ?>%</h2></div>
</section>

<section class="dashboard-grid">
<div class="recent-trips">
<div class="section-header">
<h3>Recent Trips</h3>
<a href="trips.php" class="view-btn">View All</a>
</div>

<table>
<thead>
<tr>
<th>ID</th><th>Vehicle</th><th>Driver</th><th>Source</th><th>Destination</th><th>Status</th>
</tr>
</thead>
<tbody>
<?php
$sql="SELECT t.trip_id,v.vehicle_name,u.full_name,t.source,t.destination,t.status
FROM trips t
JOIN vehicles v ON t.vehicle_id=v.vehicle_id
JOIN drivers d ON t.driver_id=d.driver_id
JOIN users u ON d.user_id=u.user_id
ORDER BY t.trip_id DESC LIMIT 5";
$r=mysqli_query($conn,$sql);
if($r && mysqli_num_rows($r)>0){
while($row=mysqli_fetch_assoc($r)){
echo "<tr>
<td>TR{$row['trip_id']}</td>
<td>{$row['vehicle_name']}</td>
<td>{$row['full_name']}</td>
<td>{$row['source']}</td>
<td>{$row['destination']}</td>
<td>{$row['status']}</td>
</tr>";
}
}else{
echo "<tr><td colspan='6'>No trips available.</td></tr>";
}
?>
</tbody>
</table>
</div>

<div class="vehicle-status">
<h3>Quick Summary</h3>

<div class="quick-summary">
<div class="summary-card">
<h4>Total Vehicles</h4>
<h2><?= total($conn,"vehicles") ?></h2>
</div>

<div class="summary-card">
<h4>Total Drivers</h4>
<h2><?= total($conn,"drivers") ?></h2>
</div>

<div class="summary-card">
<h4>Total Trips</h4>
<h2><?= total($conn,"trips") ?></h2>
</div>
</div>

</div>
</section>

</div>
</div>

<?php include("includes/footer.php"); ?>