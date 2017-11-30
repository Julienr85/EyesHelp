<?php

          include 'connexion_database.php';
          session_start ();

          $ProviderSelect = (isset($_POST["ProviderSelect"])) ? $_POST["ProviderSelect"] : NULL;
          $LensSelect = (isset($_POST["LensSelect"])) ? $_POST["LensSelect"] : NULL;
          $Renewal = (isset($_POST["Renewal"])) ? $_POST["Renewal"] : NULL;
          $UseFrequency = (isset($_POST["UseFrequency"])) ? $_POST["UseFrequency"] : NULL;
          $timeSlot = (isset($_POST["timeSlot"])) ? $_POST["timeSlot"] : NULL;
          $Email = (isset($_POST["Mail_User"])) ? $_POST["Mail_User"] : NULL;


          if ($Email && $ProviderSelect && $LensSelect && $Renewal && $UseFrequency && $timeSlot ) {

              $formulaire = $connection->prepare("UPDATE Provider
                                                  SET Provider_Name=:ProviderSelect,ContactLens_Name=:LensSelect,Renewal=:Renewal,UseFrequency=:UseFrequency,timeSlot=:timeSlot
                                                  WHERE IdentifiantPersonnes=:Mail_User;");
              $formulaire->bindParam(':Mail_User', $Email, PDO::PARAM_STR);
              $formulaire->bindParam(':ProviderSelect', $ProviderSelect, PDO::PARAM_STR);
              $formulaire->bindParam(':LensSelect', $LensSelect, PDO::PARAM_STR);
              $formulaire->bindParam(':Renewal', $Renewal, PDO::PARAM_STR);
              $formulaire->bindParam(':UseFrequency', $UseFrequency, PDO::PARAM_INT);
              $formulaire->bindParam(':timeSlot', $timeSlot, PDO::PARAM_STR);
              $resultat_Log = $formulaire->execute();

               // On récupère le résultat
               if ($resultat_Log==1)
               {
                 echo "Formulaire terminé";

               } else {
                        echo "Formulaire non Validé";
               }
           } else {
                echo "Formulaire incomplet";
           }




?>
