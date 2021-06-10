
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
                            <table>
                                <tr>
                                    <th>Prenom</th>
                                    <th>Nom</th>
                                    <th>Pays</th>
                                
                                </tr>
                                
                                <?php
            
                                $serveur = "localhost";
                                $login = "root";
                                $pass = "";

                                try{
                                    $connexion = new PDO("mysql:host=$serveur;dbname=formulaire", $login, $pass);
                                    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                }

                                catch(PDOException $e){
                                    echo 'Echec : ' .$e->getMessage();

                                }
                                
                                $sql = "SELECT id, prenom, nom, pays FROM formulaire";
                                $result = $connexion->query($sql);

                                if ($result->num_rows > 0) {
                                    echo "<table><tr><th>prenom</th><th>nom</th><th>pays</th></tr>";
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["prenom"]. " " . $row["nom"]. " " . $row["pays"]. "</td></tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "0 results";
                                }


                                ?>
                                
                            </table>
                                
                        </div>

                    </form>
                </div>
            </div>
        </div>
            
    </body>

</html>
