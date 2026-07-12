<?php

include("includes/auth_check.php");

include("includes/header.php");

include("includes/sidebar.php");

include("includes/navbar.php");

?>

<div class="page-title">

    <h1>System Settings</h1>

    <p>

        Configure application preferences and account settings.

    </p>

</div>

<section class="recent-trips">

    <form action="#" method="POST">

        <div class="form-grid">

            <div class="form-group">

                <label>Company Name</label>

                <input
                    type="text"
                    value="TransitOps Logistics">

            </div>

            <div class="form-group">

                <label>Company Email</label>

                <input
                    type="email"
                    value="admin@transitops.com">

            </div>

            <div class="form-group">

                <label>Company Phone</label>

                <input
                    type="text"
                    value="+91 9876543210">

            </div>

            <div class="form-group">

                <label>Company Address</label>

                <input
                    type="text"
                    value="New Delhi, India">

            </div>

            <div class="form-group">

                <label>Default Fuel Type</label>

                <select>

                    <option selected>Diesel</option>

                    <option>Petrol</option>

                    <option>CNG</option>

                    <option>Electric</option>

                </select>

            </div>

            <div class="form-group">

                <label>Distance Unit</label>

                <select>

                    <option selected>Kilometers</option>

                    <option>Miles</option>

                </select>

            </div>

            <div class="form-group">

                <label>Currency</label>

                <select>

                    <option selected>Indian Rupee (₹)</option>

                    <option>US Dollar ($)</option>

                    <option>Euro (€)</option>

                </select>

            </div>

            <div class="form-group">

                <label>Timezone</label>

                <select>

                    <option selected>Asia/Kolkata</option>

                    <option>UTC</option>

                </select>

            </div>

            <div class="form-group">

                <label>Email Notifications</label>

                <select>

                    <option selected>Enabled</option>

                    <option>Disabled</option>

                </select>

            </div>

            <div class="form-group">

                <label>Maintenance Alerts</label>

                <select>

                    <option selected>Enabled</option>

                    <option>Disabled</option>

                </select>

            </div>

            <div class="form-group full-width">

                <label>System Notes</label>

                <textarea
                    rows="5"
                    placeholder="Additional system configuration..."></textarea>

            </div>

        </div>

        <div class="form-buttons">

            <button
                type="submit"
                class="dispatch-btn">

                <i class="fa-solid fa-floppy-disk"></i>

                Save Settings

            </button>

            <button
                type="reset"
                class="cancel-btn">

                Reset

            </button>

        </div>

    </form>

</section>
<?php include("includes/footer.php"); ?>
