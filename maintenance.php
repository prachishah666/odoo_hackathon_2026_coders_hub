<?php

include("includes/auth_check.php");

include("includes/header.php");

include("includes/sidebar.php");

include("includes/navbar.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>TransitOps | Maintenance</title>

    <link rel="stylesheet"
          href="assets/css/style.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<div class="container">

    

    <main class="main-content">

        <header class="topbar">

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    placeholder="Search Maintenance...">

            </div>

            <div class="top-right">

                <button class="dispatch-btn">

                    <i class="fa-solid fa-plus"></i>

                    Schedule Maintenance

                </button>

            </div>

        </header>

        <div class="page-title">

            <h1>Maintenance Records</h1>

            <p>

                Track servicing and maintenance history of all fleet vehicles.

            </p>

        </div>

        <section class="filters">

            <select>

                <option>Status</option>

                <option>Pending</option>

                <option>In Progress</option>

                <option>Completed</option>

            </select>

            <select>

                <option>Vehicle</option>

                <option>Truck</option>

                <option>Van</option>

                <option>Mini Truck</option>

            </select>

        </section>

        <section class="recent-trips">

            <div class="section-header">

                <h3>Maintenance Log</h3>

            </div>

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Vehicle</th>

                        <th>Issue</th>

                        <th>Date</th>

                        <th>Status</th>

                        <th>Cost</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>
                    <?php
// Session check will be added later
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>TransitOps | Maintenance</title>

    <link rel="stylesheet"
          href="assets/css/style.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<div class="container">

    <aside class="sidebar">

        <h2>

            <i class="fa-solid fa-truck-fast"></i>

            TransitOps

        </h2>

        <ul>

            <li>

                <a href="dashboard.php">

                    <i class="fa-solid fa-table-columns"></i>

                    <span>Dashboard</span>

                </a>

            </li>

            <li>

                <a href="vehicles.php">

                    <i class="fa-solid fa-truck"></i>

                    <span>Vehicles</span>

                </a>

            </li>

            <li>

                <a href="drivers.php">

                    <i class="fa-solid fa-id-card"></i>

                    <span>Drivers</span>

                </a>

            </li>

            <li>

                <a href="trips.php">

                    <i class="fa-solid fa-route"></i>

                    <span>Trips</span>

                </a>

            </li>

            <li class="active">

                <a href="maintenance.php">

                    <i class="fa-solid fa-screwdriver-wrench"></i>

                    <span>Maintenance</span>

                </a>

            </li>

            <li>

                <a href="fuel.php">

                    <i class="fa-solid fa-gas-pump"></i>

                    <span>Fuel & Expenses</span>

                </a>

            </li>

            <li>

                <a href="reports.php">

                    <i class="fa-solid fa-chart-column"></i>

                    <span>Reports</span>

                </a>

            </li>

            <li>

                <a href="settings.php">

                    <i class="fa-solid fa-gear"></i>

                    <span>Settings</span>

                </a>

            </li>

        </ul>

    </aside>

    <main class="main-content">

        <header class="topbar">

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    placeholder="Search Maintenance...">

            </div>

            <div class="top-right">

                <button class="dispatch-btn">

                    <i class="fa-solid fa-plus"></i>

                    Schedule Maintenance

                </button>

            </div>

        </header>

        <div class="page-title">

            <h1>Maintenance Records</h1>

            <p>

                Track servicing and maintenance history of all fleet vehicles.

            </p>

        </div>

        <section class="filters">

            <select>

                <option>Status</option>

                <option>Pending</option>

                <option>In Progress</option>

                <option>Completed</option>

            </select>

            <select>

                <option>Vehicle</option>

                <option>Truck</option>

                <option>Van</option>

                <option>Mini Truck</option>

            </select>

        </section>

        <section class="recent-trips">

            <div class="section-header">

                <h3>Maintenance Log</h3>

            </div>

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Vehicle</th>

                        <th>Issue</th>

                        <th>Date</th>

                        <th>Status</th>

                        <th>Cost</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>
                            <footer class="dashboard-footer">

            <p>

                © 2026 TransitOps ERP |
                Fleet Management System

            </p>

        </footer>

    </main>

</div>

<script src="assets/js/dashboard.js"></script>

</body>

</html>
<?php include("includes/footer.php"); ?>