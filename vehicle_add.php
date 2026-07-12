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

    <title>Add Vehicle | TransitOps</title>

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

            <h1>Add New Vehicle</h1>

            <p>

                Register a new vehicle into the fleet.

            </p>

        </div>

        <section class="recent-trips">

            <form action="#" method="POST">

                <div class="form-grid">

                    <div class="form-group">

                        <label>Registration Number</label>

                        <input
                            type="text"
                            placeholder="MH12AB1234">

                    </div>

                    <div class="form-group">

                        <label>Vehicle Model</label>

                        <input
                            type="text"
                            placeholder="Volvo FH16">

                    </div>

                    <div class="form-group">

                        <label>Vehicle Type</label>

                        <select>

                            <option>Truck</option>

                            <option>Van</option>

                            <option>Mini Truck</option>

                            <option>Trailer</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Manufacturer</label>

                        <input
                            type="text"
                            placeholder="Volvo">

                    </div>

                    <div class="form-group">

                        <label>Manufacturing Year</label>

                        <input
                            type="number"
                            placeholder="2025">

                    </div>

                    <div class="form-group">

                        <label>Fuel Type</label>

                        <select>

                            <option>Diesel</option>

                            <option>Petrol</option>

                            <option>CNG</option>

                            <option>Electric</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Fuel Tank Capacity (L)</label>

                        <input
                            type="number"
                            placeholder="250">

                    </div>

                    <div class="form-group">

                        <label>Maximum Load Capacity (kg)</label>

                        <input
                            type="number"
                            placeholder="18000">

                    </div>

                    <div class="form-group">

                        <label>Current Odometer (km)</label>

                        <input
                            type="number"
                            placeholder="15420">

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <select>

                            <option>Available</option>

                            <option>On Trip</option>

                            <option>Maintenance</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Purchase Date</label>

                        <input
                            type="date">

                    </div>

                    <div class="form-group">

                        <label>Insurance Expiry</label>

                        <input
                            type="date">

                    </div>

                    <div class="form-group full-width">

                        <label>Additional Notes</label>

                        <textarea
                            rows="5"
                            placeholder="Enter any additional vehicle details..."></textarea>

                    </div>

                </div>

                <div class="form-buttons">

                    <button
                        type="submit"
                        class="dispatch-btn">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Save Vehicle

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