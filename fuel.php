<?php
// Session check will be added later
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>TransitOps | Fuel & Expenses</title>

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

            <li>

                <a href="maintenance.php">

                    <i class="fa-solid fa-screwdriver-wrench"></i>

                    <span>Maintenance</span>

                </a>

            </li>

            <li class="active">

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
                    placeholder="Search Fuel Record...">

            </div>

            <div class="top-right">

                <button class="dispatch-btn">

                    <i class="fa-solid fa-plus"></i>

                    Add Fuel Entry

                </button>

            </div>

        </header>

        <div class="page-title">

            <h1>Fuel & Expense Management</h1>

            <p>

                Track fuel consumption and transportation expenses.

            </p>

        </div>

        <section class="filters">

            <select>

                <option>Fuel Type</option>

                <option>Diesel</option>

                <option>Petrol</option>

                <option>CNG</option>

                <option>Electric</option>

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

                <h3>Fuel Records</h3>

            </div>

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Vehicle</th>

                        <th>Driver</th>

                        <th>Fuel Type</th>

                        <th>Quantity</th>

                        <th>Cost</th>

                        <th>Date</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>
                                        <tr>

                        <td>FL001</td>

                        <td>Truck A12</td>

                        <td>Alex Johnson</td>

                        <td>Diesel</td>

                        <td>120 L</td>

                        <td>₹12,600</td>

                        <td>15 Jul 2026</td>

                        <td>

                            <button class="edit-btn">

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </td>

                    </tr>

                    <tr>

                        <td>FL002</td>

                        <td>Van V05</td>

                        <td>John Smith</td>

                        <td>Petrol</td>

                        <td>55 L</td>

                        <td>₹5,350</td>

                        <td>16 Jul 2026</td>

                        <td>

                            <button class="edit-btn">

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </td>

                    </tr>

                    <tr>

                        <td>FL003</td>

                        <td>Mini T08</td>

                        <td>Priya Verma</td>

                        <td>Diesel</td>

                        <td>80 L</td>

                        <td>₹8,400</td>

                        <td>17 Jul 2026</td>

                        <td>

                            <button class="edit-btn">

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </td>

                    </tr>

                    <tr>

                        <td>FL004</td>

                        <td>Truck X22</td>

                        <td>Rahul Sharma</td>

                        <td>Diesel</td>

                        <td>140 L</td>

                        <td>₹14,700</td>

                        <td>18 Jul 2026</td>

                        <td>

                            <button class="edit-btn">

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </td>

                    </tr>

                    <tr>

                        <td>FL005</td>

                        <td>Truck Z11</td>

                        <td>Akash Singh</td>

                        <td>CNG</td>

                        <td>62 kg</td>

                        <td>₹4,960</td>

                        <td>19 Jul 2026</td>

                        <td>

                            <button class="edit-btn">

                                <i class="fa-solid fa-eye"></i>

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