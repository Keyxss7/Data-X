<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $pseudo = $_POST["firstName"];
    $prenom = $_POST["lastName"];
    $email = $_POST["email"];
    $telephone = $_POST["mobile"];
    $message = $_POST["message"];

    // Destinataire de l'email
    $to = "Keyxss2409@gmail.com";

    // Sujet de l'email
    $subject = "Nouveau message de $pseudo";

    // Corps de l'email
    $body = "Prénom: $prenom\n";
    $body .= "Email: $email\n";
    $body .= "Téléphone: $telephone\n";
    $body .= "Message:\n$message";

    // En-têtes de l'email
    $headers = "From: $email";

    // Envoyer l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi du message.";
    }
} else {
    // Redirection vers la page de formulaire si le formulaire n'a pas été soumis
    header("Location: contact.html");
    exit;
}
?>