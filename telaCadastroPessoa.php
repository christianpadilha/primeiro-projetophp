<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de pessoa</title>
</head>
<body>    
    <?php require 'menu.html'; ?>
    <h1>Cadastro pessoa</h1>
    <form action="controller.php" method="post">
    
    <label for="descricao">Nome</label><br>
    <input type="text" name="nomePessoa" id="nomePessoa" required><br>
    
    <label for="senhaCliente">Senha</label><br>
    <input type="password" name="senhaPessoa" id="idadePessoa" required><br><br>

    <label for="idadePessoa">Idade</label><br>
    <input type="number" name="idadePessoa" id="idadePessoa" required><br><br>

    <label for="sexo">Sexo</label><br>
    <select name ="sexo" id="sexo">
        <option value="">Selecione</option>
        <option value="F">Feminino</option>
        <option value="M">Masculino</option>
    </select>   
    <input type="hidden" name="acao" id="acao" value="cadastroPessoa">
    <input type="submit" value="Cadastrar"></form>

</body>
</html>