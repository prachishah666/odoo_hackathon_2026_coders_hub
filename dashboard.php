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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TransitOps | Dashboard</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<div class="container">



    <!-- ================= MAIN ================= -->

    <main class="main-content">

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

                <h2>53</h2>

            </div>

            <div class="card">

                <p>Available Vehicles</p>

                <h2>42</h2>

            </div>

            <div class="card">

                <p>Maintenance</p>

                <h2>05</h2>

            </div>

            <div class="card">

                <p>Active Trips</p>

                <h2>18</h2>

            </div>

            <div class="card">

                <p>Drivers On Duty</p>

                <h2>26</h2>

            </div>

            <div class="card">

                <p>Fleet Utilization</p>

                <h2>87%</h2>

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

                        <tr>

                            <td>TR001</td>

                            <td>Truck A12</td>

                            <td>Alex</td>

                            <td>Delhi</td>

                            <td>

                                <span class="badge blue">

                                    On Trip

                                </span>

                            </td>

                            <td>2 hrs</td>

                        </tr>

                        <tr>

                            <td>TR002</td>

                            <td>Van V05</td>

                            <td>John</td>

                            <td>Jaipur</td>

                            <td>

                                <span class="badge green">

                                    Completed

                                </span>

                            </td>

                            <td>-</td>

                        </tr>

                        <tr>

                            <td>TR003</td>

                            <td>Mini T08</td>

                            <td>Priya</td>

                            <td>Agra</td>

                            <td>

                                <span class="badge orange">

                                    Dispatched

                                </span>

                            </td>

                            <td>35 mins</td>

                        </tr>

                        <tr>

                            <td>TR004</td>

                            <td>Truck X22</td>

                            <td>Rahul</td>

                            <td>Noida</td>

                            <td>

                                <span class="badge red">

                                    Delayed

                                </span>

                            </td>

                            <td>Unknown</td>

                        </tr>

                        <tr>

                            <td>TR005</td>

                            <td>Truck Z11</td>

                            <td>Akash</td>

                            <td>Lucknow</td>

                            <td>

                                <span class="badge green">

                                    Completed

                                </span>

                            </td>

                            <td>-</td>

                        </tr>

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

                            <span>82%</span>

                        </div>

                        <div class="progress">

                            <div class="progress-fill green" style="width:82%;"></div>

                        </div>

                    </div>

                    <div class="progress-item">

                        <div class="progress-top">

                            <span>On Trip</span>

                            <span>48%</span>

                        </div>

                        <div class="progress">

                            <div class="progress-fill blue" style="width:48%;"></div>

                        </div>

                    </div>

                    <div class="progress-item">

                        <div class="progress-top">

                            <span>Maintenance</span>

                            <span>18%</span>

                        </div>

                        <div class="progress">

                            <div class="progress-fill orange" style="width:18%;"></div>

                        </div>

                    </div>

                    <div class="progress-item">

                        <div class="progress-top">

                            <span>Retired</span>

                            <span>6%</span>

                        </div>

                        <div class="progress">

                            <div class="progress-fill red" style="width:6%;"></div>

                        </div>

                    </div>

                </div>

                <div class="quick-summary">

                    <div class="summary-card">

                        <h4>Fuel Cost</h4>

                        <h2>₹52,800</h2>

                    </div>

                    <div class="summary-card">

                        <h4>Maintenance</h4>

                        <h2>₹12,450</h2>

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

</body>

</html>

<?php include("includes/footer.php"); ?>