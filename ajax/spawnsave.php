<?php

include("db.inc.php");

$db = getDatabase();

//print "ERROR|";
//print_r($_POST);

$nx = floatVal($_POST['x']);
$ny = floatVal($_POST['y']);
$nz = floatVal($_POST['z']);
$hd = floatVal($_POST['heading']);
$id = intVal($_POST['id']);
$sgid = intVal($_POST['id2']);
$nm = $_POST['objname'];

$q = "UPDATE spawn2 SET x = '$nx', y = '$ny', z = '$nz', heading = '$hd' WHERE id = '$id' LIMIT 1";

$ret = pdoQuery($db, $q);
if($ret['error'])
{
    die("ERROR|" . $ret['error']);
}

$sq = "UPDATE spawngroup SET name = '$nm' WHERE id = '$sgid'";

$ret = pdoQuery($db, $sq);
if($ret['error'])
{
    die("ERROR|" . $ret['error']);
}

$data = array("x" => $nx, "y" => $ny, "z" => $nz, "heading" => $hd, "name" => $nm, "id2" => $sgid);

print "SPAWNSAVE|$id|" . json_encode($data);

?>
