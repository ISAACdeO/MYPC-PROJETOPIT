<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <header>
        <h1>Contate-nos</h1>
    </header>
    <section>
        <form id="contactForm">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="subject">Assunto:</label>
            <input type="text" id="subject" name="subject" required>
            
            <label for="message">Mensagem:</label>
            <textarea id="message" name="message" required></textarea>
            
            <button type="submit">Enviar</button>
        </form>
        <div id="feedback"></div>
    </section>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('../CONTROLLER/send_email.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('feedback').textContent = data;
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
