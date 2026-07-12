<?php

include("includes/auth_check.php");
include("config/database.php");

if(!isset($_GET['id']))
{
    header("Location: maintenance.php");
    exit();
}

$maintenance_id = (int)$_GET['id'];

mysqli_begin_transaction($conn);

try
{

    // Get Vehicle ID and Status

    $stmt = mysqli_prepare(

        $conn,

        "SELECT vehicle_id, status

        FROM maintenance_logs

        WHERE maintenance_id=?"

    );

    mysqli_stmt_bind_param(

        $stmt,

        "i",

        $maintenance_id

    );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(!$maintenance = mysqli_fetch_assoc($result))
    {
        throw new Exception("Maintenance record not found.");
    }

    // Delete Maintenance Record

    $delete = mysqli_prepare(

        $conn,

        "DELETE FROM maintenance_logs

        WHERE maintenance_id=?"

    );

    mysqli_stmt_bind_param(

        $delete,

        "i",

        $maintenance_id

    );

    mysqli_stmt_execute($delete);

    // If maintenance was Active,
    // make vehicle Available again.

    if($maintenance['status']=="Active")
    {

        $vehicleStatus = "Available";

        $updateVehicle = mysqli_prepare(

            $conn,

            "UPDATE vehicles

            SET status=?

            WHERE vehicle_id=?"

        );

        mysqli_stmt_bind_param(

            $updateVehicle,

            "si",

            $vehicleStatus,

            $maintenance['vehicle_id']

        );

        mysqli_stmt_execute($updateVehicle);

    }

    mysqli_commit($conn);

    header("Location: maintenance.php?deleted=1");

    exit();

}
catch(Exception $e)
{

    mysqli_rollback($conn);

    header("Location: maintenance.php?deleted=0");

    exit();

}

?>