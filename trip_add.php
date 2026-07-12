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

    <title>Create Trip | TransitOps</title>

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

            <li class="active">

                <a href="trips.php">

                    <i class="fa-solid fa-route"></i>

                    <span>Trips</span>

                </a>

            </li>

            <li>

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

            <h2>Create New Trip</h2>

            <a href="trips.php">

                <button class="dispatch-btn">

                    Back

                </button>

            </a>

        </header>

        <section class="recent-trips">

            <form action="#" method="POST">

                <div class="form-grid">

                    <div class="form-group">

                        <label>Trip ID</label>

                        <input
                            type="text"
                            value="Auto Generated"
                            readonly>

                    </div>

                    <div class="form-group">

                        <label>Vehicle</label>

                        <select>

                            <option>Truck A12</option>

                            <option>Van V05</option>

                            <option>Mini T08</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Driver</label>

                        <select>

                            <option>Alex Johnson</option>

                            <option>John Smith</option>

                            <option>Priya Verma</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Source</label>

                        <input
                            type="text"
                            placeholder="Enter Source">

                    </div>

                    <div class="form-group">

                        <label>Destination</label>

                        <input
                            type="text"
                            placeholder="Enter Destination">

                    </div>

                    <div class="form-group">

                        <label>Cargo Weight (kg)</label>

                        <input
                            type="number"
                            placeholder="Weight">

                    </div>
                                        <div class="form-group">

                        <label>Planned Distance (km)</label>

                        <input
                            type="number"
                            placeholder="Distance">

                    </div>

                    <div class="form-group">

                        <label>Dispatch Date</label>

                        <input
                            type="date">

                    </div>

                    <div class="form-group">

                        <label>Expected Arrival</label>

                        <input
                            type="datetime-local">

                    </div>

                    <div class="form-group">

                        <label>Trip Status</label>

                        <select>

                            <option>Draft</option>

                            <option>Dispatched</option>

                            <option>Completed</option>

                        </select>

                    </div>

                </div>

                <div class="form-group full-width">

                    <label>Remarks</label>

                    <textarea
                        rows="5"
                        placeholder="Additional notes about this trip..."></textarea>

                </div>

                <div class="form-buttons">

                    <button
                        type="submit"
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
                            <div class="form-group">

                        <label>Planned Distance (km)</label>

                        <input
                            type="number"
                            placeholder="Distance">

                    </div>

                    <div class="form-group">

                        <label>Dispatch Date</label>

                        <input
                            type="date">

                    </div>

                    <div class="form-group">

                        <label>Expected Arrival</label>

                        <input
                            type="datetime-local">

                    </div>

                    <div class="form-group">

                        <label>Trip Status</label>

                        <select>

                            <option>Draft</option>

                            <option>Dispatched</option>

                            <option>Completed</option>

                        </select>

                    </div>

                </div>

                <div class="form-group full-width">

                    <label>Remarks</label>

                    <textarea
                        rows="5"
                        placeholder="Additional notes about this trip..."></textarea>

                </div>

                <div class="form-buttons">

                    <button
                        type="submit"
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