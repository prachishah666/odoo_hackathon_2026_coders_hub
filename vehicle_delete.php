<?php

include("includes/auth_check.php");
include("config/database.php");

if(!isset($_GET['id']))
{
    header("Location: vehicles.php");
    exit();
}

$vehicle_id = intval($_GET['id']);

$stmt = mysqli_prepare(

$conn,

"DELETE FROM vehicles
WHERE vehicle_id=?"

);

mysqli_stmt_bind_param(

$stmt,

"i",

$vehicle_id

);

if(mysqli_stmt_execute($stmt))
{

    header("Location: vehicles.php?deleted=1");

    exit();

}
else
{

    header("Location: vehicles.php?deleted=0");

    exit();

}

?>