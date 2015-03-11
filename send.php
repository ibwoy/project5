<?php
    include 'prelude.php';

    if ( isset( $_SESSION[ 'username' ] ) && isset( $_POST[ 'artist' ] ) ) {
        $artist = $_POST[ 'artist' ];
		$title = $_POST[ 'title' ];
		$userid = $_SESSION[ 'userid' ];
		// έλεγχος αν υπάρχει ήδη το συγκεκριμένο cd
		$res = mysql_query(
            "SELECT *
            FROM cds
		    WHERE artist = '" . $artist . "' AND title = '" . $title . "';"
		);
		// Αν υπάρχει το διαγράφω μόνο αν είναι δικό μου
		if ( mysql_num_rows($res) != 0) {
		    mysql_query(
			    "DELETE FROM cds
			    WHERE artist = '" . $artist . "'AND title = '" . $title . "' 
                      AND userid = '" . $userid . "';"
			);			 
		    header( 'Location: index.php' );	 
		}
		// αλλιώς το εισάγω
		else {
			mysql_query(
				"INSERT INTO cds
				SET
					artist = '" . $artist . "',
					title = '" . $title . "',
					userid = '" . $userid . "';"
			);
		}
        header( 'Location: index.php' );
    }
    else {
        ?>Πρέπει να έχεις κάνει είσοδο για να το κάνεις αυτό.<?php
    }
?> 
