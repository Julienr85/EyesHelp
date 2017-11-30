<?php

    /**
     * Nous créons deux variables : $username et $password qui valent respectivement "Sdz" et "salut"
     */

    $username = "Julien";
    $password = "ok";

    //&& isset($_POST['password']) && isset($_POST['password_confirm'])
    if( isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) ){

        echo "Formulaire incomplet";

        if($_POST['name'] == $username && $_POST['username'] == $password){ // Si les infos correspondent...
            session_start();
            $_SESSION['name'] = $username;
            echo "Success";
        }
        else{ // Sinon
            echo "Failed";
        }

    }

?>
