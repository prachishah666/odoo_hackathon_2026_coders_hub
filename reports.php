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

    <title>TransitOps | Reports</title>

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

            <li class="active">

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

            <div class="page-title">

                <h1>Reports & Analytics</h1>

                <p>

                    Fleet performance insights and operational analytics.

                </p>

            </div>

        </header>

        <!-- ================= KPI CARDS ================= -->

        <section class="cards">

            <div class="card">

                <p>Total Trips</p>

                <h2>284</h2>

            </div>

            <div class="card">

                <p>Fleet Utilization</p>

                <h2>91%</h2>

            </div>

            <div class="card">

                <p>Fuel Cost</p>

                <h2>₹4.8L</h2>

            </div>

            <div class="card">

                <p>Maintenance Cost</p>

                <h2>₹1.2L</h2>

            </div>

            <div class="card">

                <p>Revenue</p>

                <h2>₹18.6L</h2>

            </div>

            <div class="card">

                <p>On-Time Delivery</p>

                <h2>96%</h2>

            </div>

        </section>

        <!-- ================= GRID ================= -->

        <div class="dashboard-grid">

            <!-- LEFT PANEL -->

            <section class="recent-trips">

                <div class="section-header">

                    <h3>Monthly Summary</h3>

                </div>

                <table>

                    <thead>

                        <tr>

                            <th>Metric</th>

                            <th>Value</th>

                        </tr>

                    </thead>

                    <tbody>
                                                <tr>

                            <td>Total Trips Completed</td>

                            <td>284</td>

                        </tr>

                        <tr>

                            <td>Total Distance Covered</td>

                            <td>68,420 km</td>

                        </tr>

                        <tr>

                            <td>Total Fuel Consumed</td>

                            <td>6,420 L</td>

                        </tr>

                        <tr>

                            <td>Fleet Utilization</td>

                            <td>91%</td>

                        </tr>

                        <tr>

                            <td>Maintenance Cost</td>

                            <td>₹1,24,000</td>

                        </tr>

                        <tr>

                            <td>Total Revenue</td>

                            <td>₹18,60,000</td>

                        </tr>

                        <tr>

                            <td>Average Fuel Efficiency</td>

                            <td>8.2 km/L</td>

                        </tr>

                        <tr>

                            <td>Average Trip Duration</td>

                            <td>6.4 Hours</td>

                        </tr>

                    </tbody>

                </table>

            </section>

            <!-- RIGHT PANEL -->

            <section class="vehicle-status">

                <h3>Performance Metrics</h3>

                <div class="status-box">

                    <div class="progress-item">

                        <div class="progress-top">

                            <span>Trip Success Rate</span>

                            <span>96%</span>

                        </div>

                        <div class="progress">

                            <div class="progress-fill green"
                                 style="width:96%"></div>

                        </div>

                    </div>

                    <div class="progress-item">

                        <div class="progress-top">

                            <span>Fleet Utilization</span>

                            <span>91%</span>

                        </div>

                        <div class="progress">

                            <div class="progress-fill blue"
                                 style="width:91%"></div>

                        </div>

                    </div>

                    <div class="progress-item">

                        <div class="progress-top">

                            <span>Vehicle Availability</span>

                            <span>88%</span>

                        </div>

                        <div class="progress">

                            <div class="progress-fill orange"
                                 style="width:88%"></div>

                        </div>

                    </div>

                    <div class="progress-item">

                        <div class="progress-top">

                            <span>Driver Safety</span>

                            <span>97%</span>

                        </div>

                        <div class="progress">

                            <div class="progress-fill green"
                                 style="width:97%"></div>

                        </div>

                    </div>

                    <div class="progress-item">

                        <div class="progress-top">

                            <span>Fuel Efficiency</span>

                            <span>84%</span>

                        </div>

                        <div class="progress">

                            <div class="progress-fill blue"
                                 style="width:84%"></div>

                        </div>

                    </div>

                </div>

            </section>

        </div>
                <!-- ================= TOP PERFORMING DRIVERS ================= -->

        <section class="recent-trips" style="margin-top:30px;">

            <div class="section-header">

                <h3>Top Performing Drivers</h3>

            </div>

            <table>

                <thead>

                    <tr>

                        <th>Driver</th>

                        <th>Total Trips</th>

                        <th>Safety Score</th>

                        <th>On-Time %</th>

                        <th>Performance</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>Alex Johnson</td>

                        <td>58</td>

                        <td>98%</td>

                        <td>97%</td>

                        <td>★★★★★</td>

                    </tr>

                    <tr>

                        <td>Priya Verma</td>

                        <td>54</td>

                        <td>97%</td>

                        <td>96%</td>

                        <td>★★★★★</td>

                    </tr>

                    <tr>

                        <td>John Smith</td>

                        <td>49</td>

                        <td>95%</td>

                        <td>94%</td>

                        <td>★★★★☆</td>

                    </tr>

                    <tr>

                        <td>Rahul Sharma</td>

                        <td>43</td>

                        <td>94%</td>

                        <td>93%</td>

                        <td>★★★★☆</td>

                    </tr>

                    <tr>

                        <td>Akash Singh</td>

                        <td>39</td>

                        <td>92%</td>

                        <td>91%</td>

                        <td>★★★★☆</td>

                    </tr>

                </tbody>

            </table>

        </section>

        <!-- ================= FLEET SUMMARY ================= -->

        <section class="cards" style="margin-top:30px;">

            <div class="card">

                <p>Available Vehicles</p>

                <h2>42</h2>

            </div>

            <div class="card">

                <p>Vehicles on Trip</p>

                <h2>18</h2>

            </div>

            <div class="card">

                <p>Maintenance Due</p>

                <h2>05</h2>

            </div>

            <div class="card">

                <p>Registered Drivers</p>

                <h2>63</h2>

            </div>

            <div class="card">

                <p>Fuel Entries</p>

                <h2>421</h2>

            </div>

            <div class="card">

                <p>Service Records</p>

                <h2>116</h2>

            </div>

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
<?php include("includes/footer.php"); ?>