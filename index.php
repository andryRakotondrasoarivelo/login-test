<?php
// Commence une session
session_start();

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données envoyées par le formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    //  voici les informations d'un utilisateur fictif
    $userEmail = 'example@email.com';
    $userPassword = '123456';

    // Vérification des informations d'identification
    if ($email === $userEmail && $password === $userPassword) {
        // Si les informations sont correctes, démarrer une session utilisateur
        $_SESSION['user'] = $email;
        echo 'Connexion réussie !';
        // Redirection vers une page d'accueil ou tableau de bord
        header('Location: dashboard.php');
        exit();
    } else {
        // Si les informations sont incorrectes, afficher un message d'erreur
        $error_message = "Email ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h2>Login</h2>
            <?php 
            // Affiche un message d'erreur 
            if (!empty($error_message)) {
                echo "<p style='color: red;'>$error_message</p>";
            }
            ?>
            <div class="input-field">
                <input type="email" name="email" required>
                <label>Enter your email</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label>Enter your password</label>
            </div>
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember" name="remember">
                    <p>Remember me</p>
                </label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit">Log In</button>
            <div class="register">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>