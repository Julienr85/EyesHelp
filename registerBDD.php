<?php

          include 'connexion_database.php';

          $Nom = (isset($_POST["name"])) ? $_POST["name"] : NULL;
          $Prenom = (isset($_POST["username"])) ? $_POST["username"] : NULL;
          $Email = (isset($_POST["email"])) ? $_POST["email"] : NULL;
          $Password = (isset($_POST["password"])) ? $_POST["password"] : NULL;
          $Password_confirm = (isset($_POST["password_confirm"])) ? $_POST["password_confirm"] : NULL;

          echo $Nom;
          echo $Prenom;
          echo $Email;
          echo $Password;
          echo $Password_confirm;

          if ($Nom && $Prenom && $Email && $Password && $Password_confirm ) {

            $login = $connection->prepare("SELECT Mail_User FROM Personnes WHERE Mail_User = :Mail_User");
            $login->bindParam(':Mail_User', $Email, PDO::PARAM_STR);
            $login->execute();

            $test = $login->fetchAll(PDO::FETCH_BOTH);
            $_SESSION['Mail_User'] = $test[0][Mail_User];

            if ($test[0])
              {
                echo "Compte Déjà Existant";
              } else {

                  if ($Password == $Password_confirm ) {

                    $Password = sha1($Password);

                    $login = $connection->prepare("INSERT INTO Personnes (Mail_User,LastName_User,FirstName_User,Password_User) VALUES (:Mail_User,:LastName_User,:FirstName_User,:Password_User);
                                                   INSERT INTO Provider (IdentifiantPersonnes) VALUES (:Mail_User); " );
                    $login->bindParam(':LastName_User', $Nom, PDO::PARAM_INT);
                    $login->bindParam(':FirstName_User', $Prenom, PDO::PARAM_STR);
                    $login->bindParam(':Mail_User', $Email, PDO::PARAM_STR);
                    $login->bindParam(':Password_User', $Password, PDO::PARAM_STR);
                    $resultat_Log = $login->execute();

                      // On récupère le résultat
                       if ($resultat_Log==1)
                       {
                             echo "Formulaire Validé";

                       } else {
                                echo "Formulaire non Validé";
                              }
                    } else {
                    echo "Mot de passe différent";
                    }
            }
         } else {
            echo "Formuaire incomplet";
          }


?>
