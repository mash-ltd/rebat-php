rebat-php
=========

A PHP driver for rebat-db (fast and scalable weighted property graph database).

test.php is a simple example on how to use the driver:

```php
<?
include_once ("RebatDriver.php");

// You can change the database server and port as follows:
// $driver = new RebatDriver("localhost","2011");
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
```

You can add more relations other than the "Follows" relation by adding them as constants to the file Relations.php

```php
<?php
if ( ! class_exists("Relations"))
{
  class Relations
  {
    // Add other relations you want to support here
    const Follows = 1;
    const Joins = 2;
  }
}
?>
```