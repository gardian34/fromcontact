<?php
$errors = [];

if(!array_key_exists('name', $_POST) || $_POST['name'] == ''){
    $errors['name'] = "Vous n'avez pas renseigné votre nom";
}
if(!array_key_exists('prenom', $_POST) || $_POST['prenom'] == ''){
    $errors['prenom'] = "Vous n'avez pas renseigné votre prénom";
}
if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Vous n'avez pas renseigné un email valide";
}
if(!array_key_exists('message', $_POST) || $_POST['message'] == ''){
    $errors['message'] = "Vous n'avez pas renseigné votre message";
}
if(!array_key_exists('objet', $_POST) || $_POST['objet'] == ''){
    $errors['objet'] = "Vous n'avez pas renseigné l'objet de votre demande";
}
    session_start();

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['inputs'] = $_POST;
        header('Location: contact.php');
    }else{
        $_SESSION['success'] = 1;
        $message = "Email de l'expéditeur : " . $_POST['email']."\r\n". "Nom de l'expéditeur : " . $_POST['name'] . "\r\n". "Prenom : " . $_POST['prenom'] . "\r\n";
        $message .= "Objet : ". "\r\n\n". "Message : " ."\r\n". $_POST["message"];
        $header = 'FROM: contact@driad.fr';

        mail("contact@driad.fr", "PORTFOLIO charles-andre", utf8_decode($message), $header);
        mail($_POST['email'], "confirmation contact driad.fr",utf8_decode("message bien envoyé"));

        header('Location: contact.php');
    }
