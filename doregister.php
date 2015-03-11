<?php
    include 'prelude.php';
    
    if ( isset( $_POST[ 'username' ] ) && isset( $_POST[ 'password' ] ) ) {
        $username = $_POST[ 'username' ];
        $password = $_POST[ 'password' ];

        // έλεγχος αν το username και password είναι μη κενά
        if ( strlen($username) != 0 && strlen($password ) != 0) {
            // έλεγχος αν ο χρήστης υπάρχει
            $res = mysql_query(
                'SELECT
                     username
                FROM
                     users
                WHERE
                     username = "' . $username . '";'
            );
            if ( mysql_num_rows( $res ) == 0) {
    			// αν ο χρήστης δεν υπάρχει τον εισάγω με κρυπτογραφημένο password
                mysql_query(
                    'INSERT INTO
                        users
                    SET
                        username = "' . $username . '",
                        password = "' . crypt( $password, 777 ) . '";'
                );
            
                $_SESSION[ 'username' ] = $username;
                $_SESSION[ 'userid' ] = mysql_insert_id();
                header( 'Location: index.php' );
            }
            else {
                header( 'Location: register.php?exists=yes' );
            }
        }
        else {
            header( 'Location: register.php?nullvalues=yes' );
        }
    }
    else {
        header( 'Location: register.php?missing=yes' );
    }
?>
