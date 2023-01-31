<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta firstName="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>

<body>

    <div id="form">
        <form action="form_bis.php" method="get">

            <p><label for="surname">Nom</label><input type="text" name="surname" id="surname"
                    placeholder="Indiquer votre nom" value=<?php echo $_GET["surname"] ?? ''?>></p>
            <p><label for="firstName">Prénom</label><input type="text" name="firstName" id="firstName"
                    placeholder="Indiquer votre prénom" value=<?php echo $_GET["firstName"] ?? ''?>></p>
            <p><label for="gender">Genre:</label>
                <input type="radio" id="mister" name="gender" value="mister" checked>
                <label for="mister">Monsieur</label>
                <input type="radio" id="madam" name="gender" value="madam">
                <label for="madam">Madame</label>
                <input type="radio" id="other" name="gender" value="other">
                <label for="other">Autre</label>
            </p>
            <p><label for="email">Email</label><input type="text" id="email" name="email" placeholder="abc@def.com"
                    value=<?php echo $_GET["email"] ?? ''?>>
            </p>
            <p><input type="submit" value="ENVOYER"></p>
    </div>
    <!-- script PHP accès formulaire  -->
    <?php
        $surname = $_GET["surname"] ?? null;
        $firstName = $_GET["firstName"] ?? null;
        $gender = $_GET["gender"] ?? null;
        $email = $_GET["email"] ?? null;

        $errors = [];

        if (!$surname
            || !$firstName
            || !$gender 
            || !$email
        ) {
            // all range validation 
            $error="Merci de remplir tous les champs du formulaire";
            $errors[] = $error; 
        }

        // Firstname validation  
        if (!empty($firstName) && strlen($firstName) < 3) {
            $error = "Le prénom doit comporter plus de 3 lettres!";
            $errors[] = $error;       
        }  
        // email validation  
        // $pattern= '/[a_zA_Z]+@[a_zA_Z]+\.[a_zA_Z]+/' => doute sur le fonctionnement;
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){  
            $error="email invalide";   
            $errors[] = $error;   
        }   
        if (empty($errors)) {
               echo strtolower($email).' '.ucfirst($surname).' '.ucfirst($firstName); 
        }
        else {
            // boucle pour afficher l'erreur ou les erreurs multiples
            foreach($errors as $error){
            echo $error . '<br>';
            }
        }
      ?>
</body>

</html>