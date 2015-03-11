<?php
    include 'prelude.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="el" lang="el"> 
    <head>
        <title>Βάση δεδομένων με cd</title>
        <link type="text/css" rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div id="universe">
            <?php
            if ( isset( $_SESSION[ 'username' ] ) ) {
                ?><a href="logout.php" class="menu">Αποσύνδεση</a><?php
            }
            ?>
            <h1><a href="index.php">Βάση δεδομένων με cd</a><?php
            if ( isset( $_SESSION[ 'username' ] ) ) {
                ?>, Χρήστης: <?php
                echo $_SESSION[ 'username' ];
            }
            ?></h1>
            <div class="content">
