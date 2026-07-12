<?php

include("includes/auth_check.php");

include("includes/header.php");

include("includes/sidebar.php");

include("includes/navbar.php");

?>
<?php
// Session check will be added later
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Vehicle | TransitOps</title>

    <link rel="stylesheet"
          href="assets/css/style.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<div class="container">

    <?php include 'includes/sidebar.php'; ?>

    <main class="main-content">

        <?php include 'includes/navbar.php'; ?>

        <div class="page-title">

            <h1>Edit Vehicle</h1>

            <p>

                Update vehicle information and status.

            </p>

        </div>

        <section class="recent-trips">

            <form action="#" method="POST">

                <div class="form-grid">

                    <div class="form-group">

                        <label>Vehicle ID</label>

                        <input
                            type="text"
                            value="VH001"
                            readonly>

                    </div>

                    <div class="form-group">

                        <label>Registration Number</label>

                        <input
                            type="text"
                            value="MH12AB1234">

                    </div>

                    <div class="form-group">

                        <label>Vehicle Model</label>

                        <input
                            type="text"
                            value="Volvo FH16">

                    </div>

                    <div class="form-group">

                        <label>Vehicle Type</label>

                        <select>

                            <option selected>Truck</option>

                            <option>Van</option>

                            <option>Mini Truck</option>

                            <option>Trailer</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Manufacturer</label>

                        <input
                            type="text"
                            value="Volvo">

                    </div>

                    <div class="form-group">

                        <label>Manufacturing Year</label>

                        <input
                            type="number"
                            value="2024">

                    </div>

                    <div class="form-group">

                        <label>Fuel Type</label>

                        <select>

                            <option selected>Diesel</option>

                            <option>Petrol</option>

                            <option>CNG</option>

                            <option>Electric</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Fuel Tank Capacity (L)</label>

                        <input
                            type="number"
                            value="250">

                    </div>

                    <div class="form-group">

                        <label>Maximum Load Capacity (kg)</label>

                        <input
                            type="number"
                            value="18000">

                    </div>

                    <div class="form-group">

                        <label>Current Odometer (km)</label>

                        <input
                            type="number"
                            value="15420">

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <select>

                            <option>Available</option>

                            <option selected>On Trip</option>

                            <option>Maintenance</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Assigned Driver</label>

                        <select>

                            <option>Alex Johnson</option>

                            <option selected>John Smith</option>

                            <option>Rahul Sharma</option>

                            <option>Priya Verma</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Purchase Date</label>

                        <input
                            type="date"
                            value="2024-03-15">

                    </div>

                    <div class="form-group">

                        <label>Insurance Expiry</label>

                        <input
                            type="date"
                            value="2027-03-15">

                    </div>

                    <div class="form-group full-width">

                        <label>Additional Notes</label>

                        <textarea
                            rows="5">Vehicle is in excellent condition. Last service completed recently.</textarea>

                    </div>

                </div>

                <div class="form-buttons">

                    <button
                        type="submit"
                        class="dispatch-btn">

                        <i class="fa-solid fa-pen-to-square"></i>

                        Update Vehicle

                    </button>

                    <a href="vehicles.php">

                        <button
                            type="button"
                            class="cancel-btn">

                            Cancel

                        </button>

                    </a>

                </div>

            </form>

        </section>
                <?php include 'includes/footer.php'; ?>

    </main>

</div>

<script src="assets/js/dashboard.js"></script>

</body>

</html>
<?php include("includes/footer.php"); ?>