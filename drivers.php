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

if(isset($_GET['added']))
{
    $success="<div class='alert alert-success'>
    Driver Added Successfully.
    </div>";
}

if(isset($_GET['updated']))
{
    $success="<div class='alert alert-info'>
    Driver Updated Successfully.
    </div>";
}

if(isset($_GET['deleted']))
{
    $success="<div class='alert alert-warning'>
    Driver Deleted Successfully.
    </div>";
}

?>
<div class="container">

    <?php include("includes/sidebar.php"); ?>

    <div class="main-content">

        <?php include("includes/navbar.php"); ?>

        <div class="page-title">

            <h1>Drivers</h1>

            <p>Manage your drivers.</p>

            <?php echo $success; ?>

        </div>

        <div class="top-actions">

            <form method="GET" class="search-form">

                <input
                    type="text"
                    name="search"
                    placeholder="Search by Name, Email or License..."
                    value="<?php echo htmlspecialchars($search); ?>">

                <button
                    type="submit"
                    class="dispatch-btn">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    Search

                </button>

            </form>

            <a
                href="driver_add.php"
                class="dispatch-btn">

                <i class="fa-solid fa-user-plus"></i>

                Add Driver

            </a>

        </div>

        <div class="recent-trips">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Phone</th>

                        <th>License No.</th>

                        <th>Category</th>

                        <th>Expiry</th>

                        <th>Safety Score</th>

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
            d.driver_id,
            u.full_name,
            u.email,
            u.phone,
            d.license_number,
            d.license_category,
            d.license_expiry,
            d.safety_score,
            d.status

        FROM drivers d

        INNER JOIN users u
        ON d.user_id = u.user_id

        WHERE

        u.full_name LIKE ?

        OR

        u.email LIKE ?

        OR

        d.license_number LIKE ?

        ORDER BY d.driver_id DESC"

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
            d.driver_id,
            u.full_name,
            u.email,
            u.phone,
            d.license_number,
            d.license_category,
            d.license_expiry,
            d.safety_score,
            d.status

        FROM drivers d

        INNER JOIN users u
        ON d.user_id = u.user_id

        ORDER BY d.driver_id DESC"

    );

}

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if($result && mysqli_num_rows($result)>0)
{

    while($row = mysqli_fetch_assoc($result))
    {

?>
<tr>

    <td><?php echo $row['driver_id']; ?></td>

    <td><?php echo htmlspecialchars($row['full_name'] ?? ''); ?></td>

    <td><?php echo htmlspecialchars($row['email'] ?? ''); ?></td>

    <td><?php echo htmlspecialchars($row['phone'] ?? 'N/A'); ?></td>

    <td><?php echo htmlspecialchars($row['license_number' ?? '']); ?></td>

    <td><?php echo htmlspecialchars($row['license_category'] ?? 'N/A'); ?></td>

    <td>
<?php
echo !empty($row['license_expiry'])
    ? htmlspecialchars($row['license_expiry'])
    : 'N/A';
?>
</td>

    <td><?php echo number_format((float)$row['safety_score'],2); ?></td>

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
elseif($status=="Off Duty")
{
    echo "<span class='badge orange'>Off Duty</span>";
}
else
{
    echo "<span class='badge red'>Suspended</span>";
}

?>

    </td>

    <td>

        <a
        href="driver_edit.php?id=<?php echo $row['driver_id']; ?>"
        class="edit-btn">

            <i class="fa-solid fa-pen"></i>

        </a>

        <a
        href="driver_delete.php?id=<?php echo $row['driver_id']; ?>"
        class="delete-btn"
        onclick="return confirm('Delete this driver?');">

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

    <td colspan="10" style="text-align:center;">

        No Drivers Found

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