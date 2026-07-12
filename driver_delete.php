<?php

include("includes/auth_check.php");
include("config/database.php");

if(!isset($_GET['id']))
{
    header("Location: drivers.php");
    exit();
}

$driver_id = (int)$_GET['id'];

mysqli_begin_transaction($conn);

try
{

    // Get User ID

    $stmt = mysqli_prepare(

        $conn,

        "SELECT user_id
        FROM drivers
        WHERE driver_id=?"

    );

    mysqli_stmt_bind_param(

        $stmt,

        "i",

        $driver_id

    );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(!$row = mysqli_fetch_assoc($result))
    {
        throw new Exception("Driver not found");
    }

    $user_id = $row['user_id'];

    // Delete Driver

    $deleteDriver = mysqli_prepare(

        $conn,

        "DELETE FROM drivers
        WHERE driver_id=?"

    );

    mysqli_stmt_bind_param(

        $deleteDriver,

        "i",

        $driver_id

    );

    mysqli_stmt_execute($deleteDriver);

    // Delete User

    $deleteUser = mysqli_prepare(

        $conn,

        "DELETE FROM users
        WHERE user_id=?"

    );

    mysqli_stmt_bind_param(

        $deleteUser,

        "i",

        $user_id

    );

    mysqli_stmt_execute($deleteUser);

    mysqli_commit($conn);

    header("Location: drivers.php?deleted=1");

    exit();

}
catch(Exception $e)
{

    mysqli_rollback($conn);

    header("Location: drivers.php?deleted=0");

    exit();

}

?>