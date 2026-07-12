<?php
include("includes/auth_check.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>TransitOps | Trips</title>

    <link rel="stylesheet"
          href="assets/css/style.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<div class="container">

    <!-- ================= SIDEBAR ================= -->

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

    <!-- ================= MAIN CONTENT ================= -->

    <main class="main-content">

        <header class="topbar">

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    placeholder="Search Trips...">

            </div>

            <div class="top-right">

                <a href="trip_add.php">

                    <button class="dispatch-btn">

                        <i class="fa-solid fa-plus"></i>

                        Create Trip

                    </button>

                </a>

            </div>

        </header>

        <!-- ================= PAGE TITLE ================= -->

        <div class="page-title">

            <h1>Trip Management</h1>

            <p>

                Create, dispatch and monitor transportation trips.

            </p>

        </div>

        <!-- ================= FILTERS ================= -->

        <section class="filters">

            <select>

                <option>Status</option>

                <option>Draft</option>

                <option>Dispatched</option>

                <option>Completed</option>

            </select>

            <select>

                <option>Vehicle</option>

                <option>Truck</option>

                <option>Van</option>

                <option>Mini Truck</option>

            </select>

            <select>

                <option>Driver</option>

                <option>Alex</option>

                <option>John</option>

                <option>Priya</option>

            </select>

        </section>

        <!-- ================= TABLE ================= -->

        <section class="recent-trips">

            <div class="section-header">

                <h3>Trips</h3>

            </div>

            <table>

                <thead>

                    <tr>

                        <th>Trip ID</th>

                        <th>Vehicle</th>

                        <th>Driver</th>

                        <th>Source</th>

                        <th>Destination</th>

                        <th>Status</th>

                        <th>ETA</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>
                                        <tr>

                        <td>TR001</td>

                        <td>Truck A12</td>

                        <td>Alex Johnson</td>

                        <td>Delhi</td>

                        <td>Jaipur</td>

                        <td>

                            <span class="badge blue">

                                Dispatched

                            </span>

                        </td>

                        <td>2 hrs</td>

                        <td>

                            <a href="trip_complete.php?id=1">

                                <button class="edit-btn">

                                    <i class="fa-solid fa-check"></i>

                                </button>

                            </a>

                            <a href="trip_add.php?id=1">

                                <button class="dispatch-btn">

                                    <i class="fa-solid fa-pen"></i>

                                </button>

                            </a>

                        </td>

                    </tr>

                    <tr>

                        <td>TR002</td>

                        <td>Van V05</td>

                        <td>John Smith</td>

                        <td>Noida</td>

                        <td>Agra</td>

                        <td>

                            <span class="badge green">

                                Completed

                            </span>

                        </td>

                        <td>-</td>

                        <td>

                            <button class="dispatch-btn" disabled>

                                Completed

                            </button>

                        </td>

                    </tr>

                    <tr>

                        <td>TR003</td>

                        <td>Mini T08</td>

                        <td>Priya Verma</td>

                        <td>Lucknow</td>

                        <td>Kanpur</td>

                        <td>

                            <span class="badge orange">

                                Draft

                            </span>

                        </td>

                        <td>-</td>

                        <td>

                            <a href="trip_add.php?id=3">

                                <button class="dispatch-btn">

                                    <i class="fa-solid fa-paper-plane"></i>

                                </button>

                            </a>

                        </td>

                    </tr>

                    <tr>

                        <td>TR004</td>

                        <td>Truck X22</td>

                        <td>Rahul Sharma</td>

                        <td>Mumbai</td>

                        <td>Pune</td>

                        <td>

                            <span class="badge red">

                                Delayed

                            </span>

                        </td>

                        <td>Unknown</td>

                        <td>

                            <a href="trip_add.php?id=4">

                                <button class="dispatch-btn">

                                    <i class="fa-solid fa-pen"></i>

                                </button>

                            </a>

                        </td>

                    </tr>

                    <tr>

                        <td>TR005</td>

                        <td>Truck Z11</td>

                        <td>Akash Singh</td>

                        <td>Chandigarh</td>

                        <td>Delhi</td>

                        <td>

                            <span class="badge blue">

                                Dispatched

                            </span>

                        </td>

                        <td>45 mins</td>

                        <td>

                            <a href="trip_complete.php?id=5">

                                <button class="edit-btn">

                                    <i class="fa-solid fa-check"></i>

                                </button>

                            </a>

                            <a href="trip_add.php?id=5">

                                <button class="dispatch-btn">

                                    <i class="fa-solid fa-pen"></i>

                                </button>

                            </a>

                        </td>

                    </tr>

                </tbody>

            </table>

        </section>
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