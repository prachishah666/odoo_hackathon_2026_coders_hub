<?php

include("includes/auth_check.php");

include("includes/header.php");

include("includes/sidebar.php");

include("includes/navbar.php");

?>

<div class="page-title">

    <h1>Add Fuel & Expense Entry</h1>

    <p>

        Record fuel refills and transportation expenses.

    </p>

</div>

<section class="recent-trips">

    <form action="#" method="POST">

        <div class="form-grid">

            <div class="form-group">

                <label>Entry ID</label>

                <input
                    type="text"
                    value="Auto Generated"
                    readonly>

            </div>

            <div class="form-group">

                <label>Vehicle</label>

                <select>

                    <option>Truck A12</option>

                    <option>Truck X22</option>

                    <option>Van V05</option>

                    <option>Mini T08</option>

                </select>

            </div>

            <div class="form-group">

                <label>Driver</label>

                <select>

                    <option>Alex Johnson</option>

                    <option>John Smith</option>

                    <option>Priya Verma</option>

                    <option>Rahul Sharma</option>

                </select>

            </div>

            <div class="form-group">

                <label>Expense Type</label>

                <select>

                    <option>Fuel</option>

                    <option>Toll Tax</option>

                    <option>Parking</option>

                    <option>Repair</option>

                    <option>Insurance</option>

                    <option>Driver Allowance</option>

                    <option>Other</option>

                </select>

            </div>

            <div class="form-group">

                <label>Fuel Type</label>

                <select>

                    <option>Diesel</option>

                    <option>Petrol</option>

                    <option>CNG</option>

                    <option>Electric</option>

                    <option>Not Applicable</option>

                </select>

            </div>

            <div class="form-group">

                <label>Quantity</label>

                <input
                    type="number"
                    placeholder="Litres / Kg">

            </div>

            <div class="form-group">

                <label>Amount (₹)</label>

                <input
                    type="number"
                    placeholder="Enter Amount">

            </div>

            <div class="form-group">

                <label>Odometer Reading</label>

                <input
                    type="number"
                    placeholder="Current Odometer">

            </div>

            <div class="form-group">

                <label>Fuel Station / Vendor</label>

                <input
                    type="text"
                    placeholder="Indian Oil, HP, Parking, etc.">

            </div>

            <div class="form-group">

                <label>Date</label>

                <input
                    type="date">

            </div>

            <div class="form-group full-width">

                <label>Description</label>

                <textarea
                    rows="5"
                    placeholder="Additional details regarding this expense..."></textarea>

            </div>

        </div>

        <div class="form-buttons">

            <button
                type="submit"
                class="dispatch-btn">

                <i class="fa-solid fa-floppy-disk"></i>

                Save Entry

            </button>

            <a href="fuel.php">

                <button
                    type="button"
                    class="cancel-btn">

                    Cancel

                </button>

            </a>

        </div>

    </form>

</section>
<?php include("includes/footer.php"); ?>