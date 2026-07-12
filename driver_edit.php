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

    <title>Edit Driver | TransitOps</title>

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

            <h1>Edit Driver</h1>

            <p>

                Update driver information.

            </p>

        </div>

        <section class="recent-trips">

            <form action="#" method="POST">

                <div class="form-grid">

                    <div class="form-group">

                        <label>Driver ID</label>

                        <input
                            type="text"
                            value="DR001"
                            readonly>

                    </div>

                    <div class="form-group">

                        <label>Full Name</label>

                        <input
                            type="text"
                            value="Alex Johnson">

                    </div>

                    <div class="form-group">

                        <label>Email</label>

                        <input
                            type="email"
                            value="alex@transitops.com">

                    </div>

                    <div class="form-group">

                        <label>Phone Number</label>

                        <input
                            type="text"
                            value="+91 9876543210">

                    </div>

                    <div class="form-group">

                        <label>License Number</label>

                        <input
                            type="text"
                            value="HMV458921">

                    </div>

                    <div class="form-group">

                        <label>License Type</label>

                        <select>

                            <option>LMV</option>

                            <option selected>HMV</option>

                            <option>Transport</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>License Expiry</label>

                        <input
                            type="date"
                            value="2028-09-15">

                    </div>

                    <div class="form-group">

                        <label>Date of Birth</label>

                        <input
                            type="date"
                            value="1994-05-20">

                    </div>

                    <div class="form-group">

                        <label>Joining Date</label>

                        <input
                            type="date"
                            value="2023-01-10">

                    </div>

                    <div class="form-group">

                        <label>Address</label>

                        <input
                            type="text"
                            value="New Delhi">

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <select>

                            <option selected>Available</option>

                            <option>On Trip</option>

                            <option>Off Duty</option>

                            <option>Suspended</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Safety Score</label>

                        <input
                            type="number"
                            value="98">

                    </div>

                    <div class="form-group full-width">

                        <label>Remarks</label>

                        <textarea
                            rows="5">Top performing driver with excellent safety record.</textarea>

                    </div>

                </div>

                <div class="form-buttons">

                    <button
                        type="submit"
                        class="dispatch-btn">

                        <i class="fa-solid fa-pen-to-square"></i>

                        Update Driver

                    </button>

                    <a href="drivers.php">

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