<?php
    include 'header.php';

    if ( isset( $_SESSION[ 'username' ] ) ) {
        ?>
        <h2>Δώσε τα στοιχεία του cd</h2>
        <h3>Αν υπάρχει και είναι δικό σου, θα διαγραφεί!</h3>
        <form action="send.php" method="post">
            <div class="text">
			Καλλιτέχνης<br>
                <textarea name="artist"></textarea>
		    <br>CD<br>
				<textarea name="title"></textarea>
            </div>
            <input type="submit" value="ΟΚ" class='submit' />
        </form>
        <?php
    }
    else {
        ?>
        <p>
            Για να γράψεις κάτι, θα πρέπει <a href="login.php">να κάνεις login</a>.
        </p>
        <p>
            Αν δεν έχεις λογαριασμό, <a href="register.php">δημιούργησε έναν</a>.
        </p>
        <?php
    }
?>
<h2>Όλα τα cd</h2>
<ol><?php
    $res = mysql_query(
        "SELECT
            username, artist, title
        FROM
            cds CROSS JOIN users
                ON cds.userid = users.userid
        ORDER BY
            artist, title;"
    );
    while ( $row = mysql_fetch_array( $res ) ) {
        ?>
        <li>
            <strong><?php
            echo $row[ 'artist' ];
            ?> - <?php
            echo $row[ 'title' ];
            ?> </strong>
            <?php
                if ( isset( $_SESSION[ 'username' ] ) ) {
                    echo "["; echo $row[ 'username' ]; echo "]";
                }
            ?>
        </li>
        <?php
    }
    ?>
</ol>
<?php
    include 'footer.php';
?>
