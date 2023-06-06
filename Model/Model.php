<?php

    // Connexion à la base de données
    $login = 'root';
    $mdp = 'smashorpass!';
    $_bdd = new PDO('mysql:host=localhost;dbname=bddwebsite',$login,$mdp);
    // $_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERMODE_WARNING);

    // Traitement du formulaire 

    if(isset($_POST['ske_nickname']) and isset($_POST['ske_name']) and isset($_POST['ske_gender']) and isset($_POST['ske_email'])){ 
        // isset va vérifier que chaque valeur a bien été entrée // *
        // Si c'est le cas, on va assigner à des variables chacune des valeurs entrées (au cas par cas)
        $nom = $_POST['ske_nickname'];
        $prenom = $_POST['ske_name'];
        $sexe = $_POST['ske_gender'];
        $email = $_POST['ske_email'];
        //$abonnee = $_POST['ske_validation2'];
        $formated_DATE = date('Y-m-d');
        // création de la requête   
        $req = $_bdd->prepare("INSERT INTO utilisateurs(Nom, Prenom, Sexe, Email, DateCreation) VALUES ('$nom','$prenom','$sexe','$email', '$formated_DATE') ");
        // exécution de cette dernière
        $req->execute();

        // $req->execute est censé retourné "1" si 
        // l'insertion s'est bien passée, 
        // ainsi nous allons faire un if pour vérifier cela 
        // si $bool vaut 1, on met "success", le cas échéant "failure"
        //$bool = $req->execute();
        
        //if($bool == 1) {
        //    echo 'succes!';
        //    sleep(3);
        //    include '../View/html/return.html';
        //} else {
        //    echo 'failure..';
        //}
        // echo $req->execute();
    }



?>