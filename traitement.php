<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation des données
    $pseudo = isset($_POST["firstName"]) ? htmlspecialchars($_POST["firstName"]) : "";
    $prenom = isset($_POST["lastName"]) ? htmlspecialchars($_POST["lastName"]) : "";
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
    $telephone = isset($_POST["mobile"]) ? htmlspecialchars($_POST["mobile"]) : "";
    $message = isset($_POST["message"]) ? htmlspecialchars($_POST["message"]) : "";

    // Vérification de l'e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'adresse e-mail n'est pas valide.";
        exit;
    }

    // Destinataire de l'e-mail
    $to = "Keyxss2409@gmail.com";

    // Sujet de l'e-mail
    $subject = "Nouveau message de $pseudo";

    // Corps de l'e-mail
    $body = "Prénom: $prenom\n";
    $body .= "Email: $email\n";
    $body .= "Téléphone: $telephone\n";
    $body .= "Message:\n$message";

    // En-têtes de l'e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envoyer l'e-mail
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
