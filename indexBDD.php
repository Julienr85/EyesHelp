<?php

          include 'connexion_database.php';
          header("Content-Type: text/plain");


          $Email = (isset($_GET["Email"])) ? $_GET["Email"] : NULL;
          $Password = sha1($_GET['Password']);

          if ($Email && $Password) {

            $login = $connection->prepare("SELECT * FROM Personnes WHERE Mail_User = :identifiant AND Password_User = :motdepasse");
            $login->bindValue(':identifiant',$Email, PDO::PARAM_STR);
            $login->bindValue(':motdepasse', $Password, PDO::PARAM_STR);

            $login->execute();
            $test = $login->fetchAll(PDO::FETCH_BOTH);
            $_SESSION['Mail_User'] = $test[0][Mail_User];
            $_SESSION['Id_Nom'] = $test[0][LastName_User];
            $_SESSION['Id_Prenom'] = $test[0][FirstName_User];

            // On récupère le résultat
             if ($test[0])
             {
               echo "Bienvenu";
             }
             else {
               echo "Formulaire non Validé";
             }


          } else {
              echo "Formuaire incomplet";
          }

?>
