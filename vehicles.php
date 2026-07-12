<?php

include("includes/auth_check.php");
include("includes/header.php");
include("config/database.php");

$search = "";

$success = "";

if(isset($_GET['search']))
{
    $search = trim($_GET['search']);
}

$success = "";

if(isset($_GET['added']))
{
    $success = "<div class='alert alert-success'>
    Vehicle Added Successfully.
    </div>";
}

if(isset($_GET['deleted']))
{
    $success = "<div class='alert alert-warning'>
    Vehicle Deleted Successfully.
    </div>";
}

if(isset($_GET['updated']))
{
    $success = "<div class='alert alert-info'>
    Vehicle Updated Successfully.
    </div>";
}

?>

<div class="container">

    <?php include("includes/sidebar.php"); ?>

    <div class="main-content">

        <?php include("includes/navbar.php"); ?>

        <div class="page-title">

            <h1>Vehicles</h1>

            <p>Manage your fleet vehicles.</p>
            <?php echo $success; ?>

        </div>

        <div class="top-actions">

            <form method="GET" class="search-form">

                <input
                    type="text"
                    name="search"
                    placeholder="Search by Registration or Vehicle Name..."
                    value="<?php echo htmlspecialchars($search); ?>">

                <button type="submit" class="dispatch-btn">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    Search

                </button>

            </form>

            <a href="vehicle_add.php" class="dispatch-btn">

                <i class="fa-solid fa-plus"></i>

                Add Vehicle

            </a>

        </div>

        <div class="recent-trips">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Registration No.</th>

                        <th>Vehicle Name</th>

                        <th>Vehicle Type</th>

                        <th>Capacity (KG)</th>

                        <th>Odometer</th>

                        <th>Cost</th>

                        <th>Status</th>

                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>
                    <?php

if($search!="")
{
    $stmt = mysqli_prepare(

        $conn,

        "SELECT *
        FROM vehicles
        WHERE registration_number LIKE ?
        OR vehicle_name LIKE ?
        ORDER BY vehicle_id DESC"

    );

    $keyword = "%".$search."%";

    mysqli_stmt_bind_param(
        $stmt,
        "ss",
        $keyword,
        $keyword
    );
}
else
{
    $stmt = mysqli_prepare(

        $conn,

        "SELECT *
        FROM vehicles
        ORDER BY vehicle_id DESC"

    );
}

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if($result && mysqli_num_rows($result) > 0)
{

    while($row=mysqli_fetch_assoc($result))
    {

?>
<tr>

    <td><?php echo $row['vehicle_id']; ?></td>

    <td><?php echo $row['registration_number']; ?></td>

    <td><?php echo $row['vehicle_name']; ?></td>

    <td><?php echo $row['vehicle_type']; ?></td>

    <td><?php echo $row['max_load_capacity']; ?> KG</td>

    <td><?php echo number_format((float)$row['odometer']); ?> KM</td>

    <td>₹ <?php echo number_format((float)$row['acquisition_cost'],2); ?></td>

    <td>

<?php

$status = $row['status'];

if($status=="Available")
{
    echo "<span class='badge green'>Available</span>";
}
elseif($status=="On Trip")
{
    echo "<span class='badge blue'>On Trip</span>";
}
elseif($status=="In Shop")
{
    echo "<span class='badge orange'>In Shop</span>";
}
else
{
    echo "<span class='badge red'>Retired</span>";
}

?>

    </td>

    <td>

        <a
        href="vehicle_edit.php?id=<?php echo $row['vehicle_id']; ?>"
        class="edit-btn">

            <i class="fa-solid fa-pen"></i>

        </a>

        <a
        href="vehicle_delete.php?id=<?php echo $row['vehicle_id']; ?>"
        class="delete-btn"
        onclick="return confirm('Are you sure you want to delete this vehicle?');">

            <i class="fa-solid fa-trash"></i>

        </a>

    </td>

</tr>

<?php

    }

}
else
{

?>

<tr>

    <td colspan="9" style="text-align:center;">

        No Vehicles Found

    </td>

</tr>

<?php

}

?>                </tbody>

            </table>

        </div>

    </div>

</div>

<?php include("includes/footer.php"); ?>