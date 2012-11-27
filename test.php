<?
include_once ("RebatDriver.php");

$driver = new RebatDriver();

// Empty database
$driver->truncate();

// User #1 follows Page #2 with weight 1
$driver->add(1, "user", 2, "page", 1, Relations::Follows);

// Update weight to 2
$driver->updateWeight(1, "user", 2, "page", Relations::Follows, 2);

// Delete relation
$driver->delete(1, "user", 2, "page", Relations::Follows);

// User #1 follows Page #2 with weight 1
$driver->add(1, "user", 2, "page", 1, Relations::Follows);

// Get follow relations between user #1 and page #2 
$driver->where(1,"user",2,"page",Relations::Follows);

// print results
print_r($driver->entries());

?>