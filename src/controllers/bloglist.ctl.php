<?php
    require_once 'dbh.ctl.php';

    $dbConn = new DbConnection;

    $results = $dbConn->getAllBlogs();

    return $results;