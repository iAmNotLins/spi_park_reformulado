<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validando campos obrigatórios
    if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['number']) || empty($_POST['duvida'])) {
        echo "Por favor, preencha todos os campos obrigatórios.";
        exit;
    }

    // Validando formato do número de celular
    $number = $_POST['number'];
    if (!preg_match("/^\(\d{2}\) \d{5}-\d{4}$/", $number)) {
        echo "Formato de celular inválido. Use (xx) xxxxx-xxxx.";
        exit;
    }

    // Sanitizando os dados recebidos
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $duvida = htmlspecialchars($_POST['duvida']);

    // Montando o corpo da mensagem
    $to = "leonardolinsvv17@gmail.com"; // Seu endereço de e-mail aqui
    $subject = "Nova mensagem do formulário de contato";

    $message = "Nome: $firstname $lastname\n";
    $message .= "Celular: $number\n";
    $message .= "Dúvida:\n$duvida";

    // Enviando o e-mail
    $headers = "From: $firstname $lastname <$to>";

    if (mail($to, $subject, $message, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem.";
    }
} else {
    echo "Erro: método de requisição incorreto.";
}
?>
