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

    <title>Schedule Maintenance | TransitOps</title>

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

            <h2>Schedule Maintenance</h2>

            <a href="maintenance.php">

                <button class="dispatch-btn">

                    Back

                </button>

            </a>

        </header>

        <section class="recent-trips">

            <form action="#" method="POST">

                <div class="form-grid">

                    <div class="form-group">

                        <label>Maintenance ID</label>

                        <input
                            type="text"
                            value="Auto Generated"
                            readonly>

                    </div>

                    <div class="form-group">

                        <label>Vehicle</label>

                        <select>

                            <option>Truck A12</option>

                            <option>Truck X22</option>

                            <option>Van V05</option>

                            <option>Mini T08</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Issue</label>

                        <input
                            type="text"
                            placeholder="Enter Issue">

                    </div>

                    <div class="form-group">

                        <label>Priority</label>

                        <select>

                            <option>Low</option>

                            <option>Medium</option>

                            <option>High</option>

                            <option>Critical</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Assigned Technician</label>

                        <input
                            type="text"
                            placeholder="Technician Name">

                    </div>

                    <div class="form-group">

                        <label>Estimated Cost (₹)</label>

                        <input
                            type="number"
                            placeholder="Estimated Cost">

                    </div>
                    <?php
// Session check will be added later
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Schedule Maintenance | TransitOps</title>

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

            <h2>Schedule Maintenance</h2>

            <a href="maintenance.php">

                <button class="dispatch-btn">

                    Back

                </button>

            </a>

        </header>

        <section class="recent-trips">

            <form action="#" method="POST">

                <div class="form-grid">

                    <div class="form-group">

                        <label>Maintenance ID</label>

                        <input
                            type="text"
                            value="Auto Generated"
                            readonly>

                    </div>

                    <div class="form-group">

                        <label>Vehicle</label>

                        <select>

                            <option>Truck A12</option>

                            <option>Truck X22</option>

                            <option>Van V05</option>

                            <option>Mini T08</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Issue</label>

                        <input
                            type="text"
                            placeholder="Enter Issue">

                    </div>

                    <div class="form-group">

                        <label>Priority</label>

                        <select>

                            <option>Low</option>

                            <option>Medium</option>

                            <option>High</option>

                            <option>Critical</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Assigned Technician</label>

                        <input
                            type="text"
                            placeholder="Technician Name">

                    </div>

                    <div class="form-group">

                        <label>Estimated Cost (₹)</label>

                        <input
                            type="number"
                            placeholder="Estimated Cost">

                    </div>
                                        <div class="form-group">

                        <label>Scheduled Date</label>

                        <input
                            type="date">

                    </div>

                    <div class="form-group">

                        <label>Expected Completion</label>

                        <input
                            type="date">

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <select>

                            <option>Scheduled</option>

                            <option>In Progress</option>

                            <option>Waiting for Parts</option>

                            <option>Completed</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Workshop Location</label>

                        <input
                            type="text"
                            placeholder="Workshop Name">

                    </div>

                    <div class="form-group full-width">

                        <label>Parts Required</label>

                        <textarea
                            rows="4"
                            placeholder="Engine Oil, Brake Pads, Coolant..."></textarea>

                    </div>

                    <div class="form-group full-width">

                        <label>Technician Notes</label>

                        <textarea
                            rows="5"
                            placeholder="Describe the maintenance work..."></textarea>

                    </div>

                </div>

                <div class="form-buttons">

                    <button
                        type="submit"
                        class="dispatch-btn">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Schedule Maintenance

                    </button>

                    <a href="maintenance.php">

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