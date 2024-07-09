<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Verificação de e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido.";
        exit;
    }

    $to = "seu-email@dominio.com";
    $headers = "From: $name <$email>" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $fullMessage = "Nome: $name\nE-mail: $email\n\nMensagem:\n$message";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "E-mail enviado com sucesso.";
    } else {
        echo "Erro ao enviar e-mail.";
    }
}
?>
