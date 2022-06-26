<?php
$sql = "SELECT * FROM garbagetype WHERE garbage_Name = 'Doy Pack'";
$result = mysqli_query($conn, $sql);
$rowa = mysqli_fetch_assoc($result);
$doyp = $rowa['garbage_Name'];
$doypc = $rowa['garbage_Count'];
print json_encode($doypc);

$sql = "SELECT * FROM garbagetype WHERE garbage_Name = 'Glass Bottle'";
$result = mysqli_query($conn, $sql);
$rowb = mysqli_fetch_assoc($result);
$glassb = $rowb['garbage_Name'];
$glassc = $rowb['garbage_Count'];
print json_encode($glassc);

$sql = "SELECT * FROM garbagetype WHERE garbage_Name = 'Plastic Bottle'";
$result = mysqli_query($conn, $sql);
$rowc = mysqli_fetch_assoc($result);
$plasticb = $rowc['garbage_Name'];
$plasticc = $rowc['garbage_Count'];
print json_encode($plasticc);

$sql = "SELECT * FROM garbagetype WHERE garbage_Name = 'Aluminum'";
$result = mysqli_query($conn, $sql);
$rowd = mysqli_fetch_assoc($result);
$alu = $rowd['garbage_Name'];
$aluc = $rowd['garbage_Count'];
print json_encode($aluc);
?>