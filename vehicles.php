<?php
include("includes/auth_check.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>TransitOps | Vehicles</title>

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

            <li class="active">

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

    <!-- ================= MAIN ================= -->

    <main class="main-content">

        <header class="topbar">

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    placeholder="Search Vehicle...">

            </div>

            <div class="top-right">

                <a href="vehicle_add.php">

                    <button class="dispatch-btn">

                        <i class="fa-solid fa-plus"></i>

                        Add Vehicle

                    </button>

                </a>

            </div>

        </header>

        <!-- ================= PAGE TITLE ================= -->

        <div class="page-title">

            <h1>Vehicle Registry</h1>

            <p>

                Manage all fleet vehicles from one place.

            </p>

        </div>

        <!-- ================= FILTERS ================= -->

        <section class="filters">

            <select>

                <option>Vehicle Type</option>

                <option>Truck</option>

                <option>Van</option>

                <option>Mini Truck</option>

            </select>

            <select>

                <option>Status</option>

                <option>Available</option>

                <option>On Trip</option>

                <option>Maintenance</option>

            </select>

            <select>

                <option>Fuel Type</option>

                <option>Diesel</option>

                <option>Petrol</option>

                <option>Electric</option>

            </select>

        </section>

        <!-- ================= VEHICLE TABLE ================= -->

        <section class="recent-trips">

            <div class="section-header">

                <h3>Fleet Vehicles</h3>

            </div>

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Registration</th>

                        <th>Model</th>

                        <th>Type</th>

                        <th>Driver</th>

                        <th>Status</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>
                                        <tr>

                        <td>VH001</td>

                        <td>MH12AB1234</td>

                        <td>Volvo FH16</td>

                        <td>Truck</td>

                        <td>Alex</td>

                        <td>

                            <span class="badge green">

                                Available

                            </span>

                        </td>

                        <td>

                            <a href="vehicle_edit.php?id=1">

                                <button class="edit-btn">

                                    <i class="fa-solid fa-pen"></i>

                                </button>

                            </a>

                            <button class="delete-btn">

                                <i class="fa-solid fa-trash"></i>

                            </button>

                        </td>

                    </tr>

                    <tr>

                        <td>VH002</td>

                        <td>DL09CD8821</td>

                        <td>Tata Ultra</td>

                        <td>Mini Truck</td>

                        <td>John</td>

                        <td>

                            <span class="badge blue">

                                On Trip

                            </span>

                        </td>

                        <td>

                            <a href="vehicle_edit.php?id=2">

                                <button class="edit-btn">

                                    <i class="fa-solid fa-pen"></i>

                                </button>

                            </a>

                            <button class="delete-btn">

                                <i class="fa-solid fa-trash"></i>

                            </button>

                        </td>

                    </tr>

                    <tr>

                        <td>VH003</td>

                        <td>UP16EF7788</td>

                        <td>Ashok Leyland</td>

                        <td>Truck</td>

                        <td>Rahul</td>

                        <td>

                            <span class="badge orange">

                                Maintenance

                            </span>

                        </td>

                        <td>

                            <a href="vehicle_edit.php?id=3">

                                <button class="edit-btn">

                                    <i class="fa-solid fa-pen"></i>

                                </button>

                            </a>

                            <button class="delete-btn">

                                <i class="fa-solid fa-trash"></i>

                            </button>

                        </td>

                    </tr>

                    <tr>

                        <td>VH004</td>

                        <td>RJ14XY9021</td>

                        <td>Mahindra Supro</td>

                        <td>Van</td>

                        <td>Priya</td>

                        <td>

                            <span class="badge green">

                                Available

                            </span>

                        </td>

                        <td>

                            <a href="vehicle_edit.php?id=4">

                                <button class="edit-btn">

                                    <i class="fa-solid fa-pen"></i>

                                </button>

                            </a>

                            <button class="delete-btn">

                                <i class="fa-solid fa-trash"></i>

                            </button>

                        </td>

                    </tr>

                    <tr>

                        <td>VH005</td>

                        <td>HR55GH1122</td>

                        <td>Eicher Pro</td>

                        <td>Truck</td>

                        <td>Akash</td>

                        <td>

                            <span class="badge red">

                                Retired

                            </span>

                        </td>

                        <td>

                            <a href="vehicle_edit.php?id=5">

                                <button class="edit-btn">

                                    <i class="fa-solid fa-pen"></i>

                                </button>

                            </a>

                            <button class="delete-btn">

                                <i class="fa-solid fa-trash"></i>

                            </button>

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