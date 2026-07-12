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

    <title>Complete Trip | TransitOps</title>

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

            <h1>Complete Trip</h1>

            <p>

                Finalize the trip and record its summary.

            </p>

        </div>

        <section class="recent-trips">

            <form action="#" method="POST">

                <div class="form-grid">

                    <div class="form-group">

                        <label>Trip ID</label>

                        <input
                            type="text"
                            value="TR001"
                            readonly>

                    </div>

                    <div class="form-group">

                        <label>Vehicle</label>

                        <input
                            type="text"
                            value="Truck A12"
                            readonly>

                    </div>

                    <div class="form-group">

                        <label>Driver</label>

                        <input
                            type="text"
                            value="Alex Johnson"
                            readonly>

                    </div>

                    <div class="form-group">

                        <label>Source</label>

                        <input
                            type="text"
                            value="Delhi"
                            readonly>

                    </div>

                    <div class="form-group">

                        <label>Destination</label>

                        <input
                            type="text"
                            value="Jaipur"
                            readonly>

                    </div>

                    <div class="form-group">

                        <label>Distance Covered (km)</label>

                        <input
                            type="number"
                            placeholder="280">

                    </div>

                    <div class="form-group">

                        <label>Fuel Used (L)</label>

                        <input
                            type="number"
                            placeholder="38">

                    </div>

                    <div class="form-group">

                        <label>Trip Duration</label>

                        <input
                            type="text"
                            placeholder="4 Hours 20 Minutes">

                    </div>

                    <div class="form-group">

                        <label>Trip Status</label>

                        <select>

                            <option selected>Completed</option>

                            <option>Cancelled</option>

                            <option>Delayed</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Customer Rating</label>

                        <select>

                            <option>⭐⭐⭐⭐⭐</option>

                            <option>⭐⭐⭐⭐</option>

                            <option>⭐⭐⭐</option>

                            <option>⭐⭐</option>

                            <option>⭐</option>

                        </select>

                    </div>

                    <div class="form-group full-width">

                        <label>Completion Notes</label>

                        <textarea
                            rows="5"
                            placeholder="Trip completed successfully..."></textarea>

                    </div>

                </div>

                <div class="form-buttons">

                    <button
                        type="submit"
                        class="dispatch-btn">

                        <i class="fa-solid fa-circle-check"></i>

                        Complete Trip

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
                <?php include 'includes/footer.php'; ?>

    </main>

</div>

<script src="assets/js/dashboard.js"></script>

</body>

</html>
<?php include("includes/footer.php"); ?>