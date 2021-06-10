<?php
//    $prenom = $nom = $pays ="";

        $serveur = "localhost";
        $login = "root";
        $pass = "";

        try{
            $connexion = new PDO("mysql:host=$serveur;dbname=formulaire", $login, $pass);
            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $requete = $connexion->prepare("INSERT INTO formulaire (prenom, nom, pays) VALUES (:prenom, :nom, :pays)");
            $requete->bindParam(':prenom', $prenom);
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':pays', $pays);

            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $prenom= verifyInput($_POST['prenom']);
                $nom= verifyInput($_POST['nom']);
                $pays= verifyInput($_POST['pays']);
                $requete->execute();

            } 
            
        }
            
        catch(PDOException $e){
            echo 'Echec : ' .$e->getMessage();
            
        }
        
        function verifyInput($var)
        {
            $var= trim($var);
            $var= stripslashes($var);
            $var= htmlspecialchars($var);
            
            return $var;
        }
 /* Sécurise les données envoyées, si quelqu'un essaye de les récupérer ils seront nettoyer avant*/


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire Pays</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--JQuery-->    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/boostrap.min.js"></script>
        <!--Texte-->    
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>
        <div class="container">
            <div class="divider"></div>
            <div class="deading">
                <h1>Formulaire HTML</h1>
            </div>
            <div class="row">
                <div class="col-x1-10 offset-x1-1">
                    <!--c'est pour avoir des bordures lorsque la page est reponsive-->  
                    <form id="contact-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" roles="form">
                        <!-- htmlspecialchars pour sécuriser la page si un hacker ajoute des élèments dans l'url-->
                        <div class="row">
                                <label for="prenom">Prénom</label>
                                <input type="text" id="fname" name="prenom" placeholder="Ton prenom" required>
                                <label for="nom">Nom de famille</label>
                                <input type="text" id="nom" name="nom" placeholder="Ton nom de famille" required>

                                <label for="pays">Pays</label>
                                <select id="pays" name="pays" required>
                                    <option value="autre">Autre</option>
                                    <option value="allemagne">Allemagne</option>
                                    <option value="canada">Canada</option>
                                    <option value="chine">Chine</option>
                                    <option value="etatunis">Etat-Unis</option>
                                    <option value="france">France</option>
                                    <option value="iran">Iran</option>
                                    <option value="japon">Japon</option>
                                    <option value="norvege">Norvège</option>
                                    <option value="suisse">Suisse</option>
                                    <option value="suede">Suède</option>
                                    <option value="turquie">Turquie</option>
                                    
                                </select>
                            <input action="sortie.php" type="submit" class="button1" value="Submit" id="frm1_submit" />
                       
                        </div>

                        </form>
                        
                </div>
            </div>
        </div>
            
    </body>

</html>
