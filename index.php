```php
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>

    <h2>Login do Aluno</h2>

    <form action="login.php" method="POST">

        <label>CPF:</label>
        <input type="text" name="cpf" required>

        <br><br>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <br><br>

        <button type="submit">Entrar</button>

    </form>

</body>

</html>
```