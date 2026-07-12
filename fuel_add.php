<?php

include("includes/auth_check.php");
include("includes/header.php");
include("config/database.php");

$message="";

if(isset($_POST['save']))
{

    $vehicle_id = $_POST['vehicle_id'];

    $trip_id = !empty($_POST['trip_id'])
    ? $_POST['trip_id']
    : NULL;

    $liters = $_POST['liters'];

    $price_per_liter = $_POST['price_per_liter'];

    $fuel_date = $_POST['fuel_date'];

    // Auto Calculate Fuel Cost

    $fuel_cost = $liters * $price_per_liter;
        $stmt = mysqli_prepare(

        $conn,

        "INSERT INTO fuel_logs
        (
            vehicle_id,
            trip_id,
            liters,
            price_per_liter,
            fuel_cost,
            fuel_date
        )

        VALUES
        (
            ?,?,?,?,?,?
        )"

    );

    mysqli_stmt_bind_param(

        $stmt,

        "iiddds",

        $vehicle_id,

        $trip_id,

        $liters,

        $price_per_liter,

        $fuel_cost,

        $fuel_date

    );

    if(mysqli_stmt_execute($stmt))
    {

        header("Location: fuel.php?added=1");

        exit();

    }
    else
    {

        $message =

        "<div class='alert alert-danger'>

        Unable to save fuel record.

        </div>";

    }

}

?>
<div class="container">

    <?php include("includes/sidebar.php"); ?>

    <div class="main-content">

        <?php include("includes/navbar.php"); ?>

        <div class="page-title">

            <h1>Add Fuel Log</h1>

            <p>Add a new fuel entry.</p>

        </div>

        <?php echo $message; ?>

        <div class="recent-trips">

            <form method="POST">

                <div class="form-grid">

                    <div class="form-group">

                        <label>Vehicle</label>

                        <select name="vehicle_id" required>

                            <option value="">Select Vehicle</option>

                            <?php

                            $vehicles = mysqli_query(

                                $conn,

                                "SELECT
                                    vehicle_id,
                                    registration_number,
                                    vehicle_name
                                 FROM vehicles
                                 WHERE status <> 'Retired'
                                 ORDER BY vehicle_name"

                            );

                            while($vehicle=mysqli_fetch_assoc($vehicles))
                            {

                            ?>

                            <option value="<?php echo $vehicle['vehicle_id']; ?>">

                                <?php

                                echo $vehicle['registration_number'];

                                echo " - ";

                                echo $vehicle['vehicle_name'];

                                ?>

                            </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Trip (Optional)</label>

                        <select name="trip_id">

                            <option value="">No Trip</option>

                            <?php

                            if(mysqli_query($conn,"SHOW TABLES LIKE 'trips'")->num_rows>0)
                            {

                                $trips=mysqli_query(

                                $conn,

                                "SELECT trip_id FROM trips ORDER BY trip_id DESC"

                                );

                                while($trip=mysqli_fetch_assoc($trips))
                                {

                            ?>

                            <option value="<?php echo $trip['trip_id']; ?>">

                                Trip #<?php echo $trip['trip_id']; ?>

                            </option>

                            <?php

                                }

                            }

                            ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Fuel (Liters)</label>

                        <input
                        type="number"
                        step="0.01"
                        min="0"
                        id="liters"
                        name="liters"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Price / Liter (₹)</label>

                        <input
                        type="number"
                        step="0.01"
                        min="0"
                        id="price"
                        name="price_per_liter"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Fuel Date</label>

                        <input
                        type="date"
                        name="fuel_date"
                        value="<?php echo date('Y-m-d'); ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Total Cost</label>

                        <input
                        type="text"
                        id="totalCost"
                        readonly
                        value="₹0.00">

                    </div>

                </div>

                <div class="form-buttons">

                    <button
                    type="submit"
                    name="save"
                    class="dispatch-btn">

                        <i class="fa-solid fa-gas-pump"></i>

                        Save Fuel Log

                    </button>

                    <a
                    href="fuel.php"
                    class="cancel-btn"
                    style="text-decoration:none;display:inline-flex;align-items:center;justify-content:center;">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

const liters=document.getElementById("liters");
const price=document.getElementById("price");
const total=document.getElementById("totalCost");

function calculateFuelCost()
{
    let l=parseFloat(liters.value)||0;
    let p=parseFloat(price.value)||0;

    total.value="₹"+(l*p).toFixed(2);
}

liters.addEventListener("input",calculateFuelCost);
price.addEventListener("input",calculateFuelCost);

</script>

<?php include("includes/footer.php"); ?>