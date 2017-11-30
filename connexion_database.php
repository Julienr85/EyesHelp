<?php
  try
   {
     $host ='mysql:host=localhost;dbname=EyesHelp';
     $utilisateur = 'EyesHelp';
     $motDePasse = '@CARTE4D';
     $option = array(
       PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

     $connection = new PDO ($host, $utilisateur, $motDePasse,$option);
   }catch (Exception $e){
       echo "Connection à MySQL impossible : ", $e->getMessage();
       die();
   }
?>
