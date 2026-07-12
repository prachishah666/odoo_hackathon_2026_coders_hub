<?php
include("includes/auth_check.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>TransitOps | Drivers</title>

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

            <li class="active">

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

    <main class="main-content">

        <header class="topbar">

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    placeholder="Search Driver...">

            </div>

            <div class="top-right">

                <a href="driver_add.php">

                    <button class="dispatch-btn">

                        <i class="fa-solid fa-plus"></i>

                        Add Driver

                    </button>

                </a>

            </div>

        </header>

        <div class="page-title">

            <h1>Driver Management</h1>

            <p>

                Manage driver profiles, licenses and assignments.

            </p>

        </div>

        <section class="filters">

            <select>

                <option>Status</option>

                <option>Available</option>

                <option>On Trip</option>

                <option>Off Duty</option>

            </select>

            <select>

                <option>License Type</option>

                <option>LMV</option>

                <option>HMV</option>

            </select>

        </section>

        <section class="recent-trips">

            <div class="section-header">

                <h3>Drivers</h3>

            </div>

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Name</th>

                        <th>License</th>

                        <th>Phone</th>

                        <th>Status</th>

                        <th>Safety Score</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>
                                        <tr>

                        <td>DR001</td>

                        <td>Alex Johnson</td>

                        <td>HMV-458921</td>

                        <td>+91 9876543210</td>

                        <td>

                            <span class="badge green">

                                Available

                            </span>

                        </td>

                        <td>98%</td>

                        <td>

                            <a href="driver_edit.php?id=1">

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

                        <td>DR002</td>

                        <td>John Smith</td>

                        <td>HMV-563214</td>

                        <td>+91 9988776655</td>

                        <td>

                            <span class="badge blue">

                                On Trip

                            </span>

                        </td>

                        <td>95%</td>

                        <td>

                            <a href="driver_edit.php?id=2">

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

                        <td>DR003</td>

                        <td>Rahul Sharma</td>

                        <td>LMV-125489</td>

                        <td>+91 9123456789</td>

                        <td>

                            <span class="badge orange">

                                Off Duty

                            </span>

                        </td>

                        <td>92%</td>

                        <td>

                            <a href="driver_edit.php?id=3">

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

                        <td>DR004</td>

                        <td>Priya Verma</td>

                        <td>HMV-894512</td>

                        <td>+91 9011223344</td>

                        <td>

                            <span class="badge green">

                                Available

                            </span>

                        </td>

                        <td>99%</td>

                        <td>

                            <a href="driver_edit.php?id=4">

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

                        <td>DR005</td>

                        <td>Akash Singh</td>

                        <td>HMV-774411</td>

                        <td>+91 9870011223</td>

                        <td>

                            <span class="badge red">

                                Suspended

                            </span>

                        </td>

                        <td>70%</td>

                        <td>

                            <a href="driver_edit.php?id=5">

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