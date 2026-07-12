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
    Maintenance Record Added Successfully.
    </div>";
}

if(isset($_GET['updated']))
{
    $success="<div class='alert alert-info'>
    Maintenance Record Updated Successfully.
    </div>";
}

if(isset($_GET['deleted']))
{
    $success="<div class='alert alert-warning'>
    Maintenance Record Deleted Successfully.
    </div>";
}

?>
<div class="container">

    <?php include("includes/sidebar.php"); ?>

    <div class="main-content">

        <?php include("includes/navbar.php"); ?>

        <div class="page-title">

            <h1>Maintenance</h1>

            <p>Manage vehicle maintenance records.</p>

            <?php echo $success; ?>

        </div>

        <div class="top-actions">

            <form method="GET" class="search-form">

                <input
                    type="text"
                    name="search"
                    placeholder="Search by Vehicle or Maintenance Type..."
                    value="<?php echo htmlspecialchars($search); ?>">

                <button
                    type="submit"
                    class="dispatch-btn">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    Search

                </button>

            </form>

            <a
                href="maintenance_add.php"
                class="dispatch-btn">

                <i class="fa-solid fa-plus"></i>

                Add Maintenance

            </a>

        </div>

        <div class="recent-trips">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Vehicle</th>

                        <th>Registration No.</th>

                        <th>Type</th>

                        <th>Cost</th>

                        <th>Start Date</th>

                        <th>End Date</th>

                        <th>Status</th>

                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>
                    <?php

if($search != "")
{

    $stmt = mysqli_prepare(

        $conn,

        "SELECT

        m.*,

        v.vehicle_name,

        v.registration_number

        FROM maintenance_logs m

        INNER JOIN vehicles v

        ON m.vehicle_id = v.vehicle_id

        WHERE

        v.vehicle_name LIKE ?

        OR

        v.registration_number LIKE ?

        OR

        m.maintenance_type LIKE ?

        ORDER BY m.maintenance_id DESC"

    );

    $keyword = "%".$search."%";

    mysqli_stmt_bind_param(

        $stmt,

        "sss",

        $keyword,

        $keyword,

        $keyword

    );

}
else
{

    $stmt = mysqli_prepare(

        $conn,

        "SELECT

        m.*,

        v.vehicle_name,

        v.registration_number

        FROM maintenance_logs m

        INNER JOIN vehicles v

        ON m.vehicle_id = v.vehicle_id

        ORDER BY m.maintenance_id DESC"

    );

}

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if($result && mysqli_num_rows($result) > 0)
{

    while($row = mysqli_fetch_assoc($result))
    {

?>
<tr>

    <td><?php echo $row['maintenance_id']; ?></td>

    <td><?php echo htmlspecialchars($row['vehicle_name'] ?? ''); ?></td>

    <td><?php echo htmlspecialchars($row['registration_number'] ?? ''); ?></td>

    <td><?php echo htmlspecialchars($row['maintenance_type'] ?? ''); ?></td>

    <td>

        ₹ <?php echo number_format((float)$row['maintenance_cost'],2); ?>

    </td>

    <td><?php echo htmlspecialchars($row['start_date'] ?? ''); ?></td>

    <td>

        <?php

        echo !empty($row['end_date'])

        ? htmlspecialchars($row['end_date'])

        : "Ongoing";

        ?>

    </td>

    <td>

<?php

if($row['status']=="Active")
{
    echo "<span class='badge orange'>Active</span>";
}
else
{
    echo "<span class='badge green'>Completed</span>";
}

?>

    </td>

    <td>

        <a
        href="maintenance_edit.php?id=<?php echo $row['maintenance_id']; ?>"
        class="edit-btn">

            <i class="fa-solid fa-pen"></i>

        </a>

        <a
        href="maintenance_delete.php?id=<?php echo $row['maintenance_id']; ?>"
        class="delete-btn"
        onclick="return confirm('Delete this maintenance record?');">

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

        No Maintenance Records Found

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