<?php

include("includes/auth_check.php");
include("includes/header.php");
include("config/database.php");

$search="";

$success="";

if(isset($_GET['search']))
{
    $search=trim($_GET['search']);
}

if(isset($_GET['added']))
{
    $success="<div class='alert alert-success'>
    Fuel Record Added Successfully.
    </div>";
}

if(isset($_GET['updated']))
{
    $success="<div class='alert alert-info'>
    Fuel Record Updated Successfully.
    </div>";
}

if(isset($_GET['deleted']))
{
    $success="<div class='alert alert-warning'>
    Fuel Record Deleted Successfully.
    </div>";
}

?>

<div class="container">

    <?php include("includes/sidebar.php"); ?>

    <div class="main-content">

        <?php include("includes/navbar.php"); ?>

        <div class="page-title">

            <h1>Fuel Logs</h1>

            <p>Manage fuel consumption records.</p>

            <?php echo $success; ?>

        </div>

        <div class="top-actions">

            <form method="GET" class="search-form">

                <input
                    type="text"
                    name="search"
                    placeholder="Search Vehicle..."
                    value="<?php echo htmlspecialchars($search); ?>">

                <button
                    type="submit"
                    class="dispatch-btn">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    Search

                </button>

            </form>

            <a
                href="fuel_add.php"
                class="dispatch-btn">

                <i class="fa-solid fa-plus"></i>

                Add Fuel

            </a>

        </div>

        <div class="recent-trips">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Vehicle</th>

                        <th>Registration</th>

                        <th>Trip ID</th>

                        <th>Liters</th>

                        <th>Price/Liter</th>

                        <th>Total Cost</th>

                        <th>Date</th>

                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>
                    <?php

if($search!="")
{

    $stmt = mysqli_prepare(

        $conn,

        "SELECT

        f.*,

        v.vehicle_name,

        v.registration_number

        FROM fuel_logs f

        INNER JOIN vehicles v

        ON f.vehicle_id=v.vehicle_id

        WHERE

        v.vehicle_name LIKE ?

        OR

        v.registration_number LIKE ?

        ORDER BY f.fuel_id DESC"

    );

    $keyword="%".$search."%";

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

        "SELECT

        f.*,

        v.vehicle_name,

        v.registration_number

        FROM fuel_logs f

        INNER JOIN vehicles v

        ON f.vehicle_id=v.vehicle_id

        ORDER BY f.fuel_id DESC"

    );

}

mysqli_stmt_execute($stmt);

$result=mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{

?>
<tr>

    <td><?php echo $row['fuel_id']; ?></td>

    <td><?php echo htmlspecialchars($row['vehicle_name']); ?></td>

    <td><?php echo htmlspecialchars($row['registration_number']); ?></td>

    <td>

        <?php

        echo $row['trip_id'] ? $row['trip_id'] : "-";

        ?>

    </td>

    <td>

        <?php echo number_format($row['liters'],2); ?>

        L

    </td>

    <td>

        ₹ <?php echo number_format($row['price_per_liter'],2); ?>

    </td>

    <td>

        ₹ <?php echo number_format($row['fuel_cost'],2); ?>

    </td>

    <td>

        <?php echo $row['fuel_date']; ?>

    </td>

    <td>

        <a

        href="fuel_edit.php?id=<?php echo $row['fuel_id']; ?>"

        class="edit-btn">

            <i class="fa-solid fa-pen"></i>

        </a>

        <a

        href="fuel_delete.php?id=<?php echo $row['fuel_id']; ?>"

        class="delete-btn"

        onclick="return confirm('Delete this fuel record?');">

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

No Fuel Records Found

</td>

</tr>

<?php

}

?>
                </tbody>

            </table>

        </div>

    </div>

</div>

<?php include("includes/footer.php"); ?>