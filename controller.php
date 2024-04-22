<?php
    $acao = ($_POST['acao']);

    if ($acao === 'entrar') {
        $usuario = $_POST ['usuario'];
        $senha = $_POST ['senha'];

        $arquivo = fopen('pessoas.csv', 'r');

        $pessoas= [];

        while ($linha = fgetcsv($arquivo)){
            $arraylinha = explode(';', $linha[0]);

            $pessoa = [
                'codigo' => $arraylinha[0],
                'nome' => $arraylinha[1],
                'senha' => $arraylinha[2],
                'idade' => $arraylinha[3],
                'sexo' => $arraylinha[4]

            ];

            array_push($pessoas, $pessoa);
        }
       
        $usuarioEncontrado = false;
        
        
        foreach ($pessoas as $pessoa) {
            if ($usuario == $pessoa['nome'] && $senha == $pessoa['senha']) {
                $usuarioEncontrado = true;
                break;
            }

        }

        session_start();
        
        if ($usuarioEncontrado == true) {
            $_SESSION['logado'] = true;

            header('location: telaProdutos.php');
        }
        else {
            header('Location: telaLogin.php');
        }

        exit();
    }else if ($acao === 'cadastrarSe') {
        header('Location: telaCadastroPessoa.php');
    
    }else if ($acao === 'CadastrarProduto') {
        $descricao = $_POST['descricao'];
        $preco = floatval($_POST['preco']);

        $arquivo = fopen('products.csv', 'r');

        $produtos = [];

        while ($linha = fgetcsv($arquivo)) {
            $arraylinha = explode(';', $linha[0]);

             $produto = [
                'codigo' => $arraylinha[0],
                'descricao' => str_replace('"', '', $arraylinha[1]),
                'preco' => $arraylinha[2]
            ];

              array_push($produtos, $produto);
        }

         fclose($arquivo);

        $arquivo = fopen('products.csv', 'a');

         $produto = [
            count($produtos) + 1,
            $descricao,
            $preco,
        ];

        fputcsv($arquivo, $produto, ';');

        fclose($arquivo);

        header('Location: telaProdutos.php');
        exit();

    } 
    else if ($acao === 'cadastroPessoa') {
        $nome = $_POST['nomePessoa'];
        $senha = $_POST['senhaPessoa'];
        $idade = $_POST['idadePessoa'];
        $sexo = $_POST['sexo'];

        $arquivo = fopen('pessoas.csv', 'r');

        $pessoas = [];

        while ($linha = fgetcsv($arquivo)) {
            $arraylinha = explode(';', $linha[0]);

            $pessoa = [
                'codigo' => $arraylinha[0],
                'nome' => $arraylinha[1],
                'senha' => $arraylinha[2],
                'idade' => $arraylinha[3],
                'sexo' => $arraylinha[4]
            ];

            array_push($pessoas, $pessoa);
        }

        fclose($arquivo);

        $arquivo = fopen('pessoas.csv', 'a');

        $pessoa = [
            count($pessoas) + 1,
            $nome,
            $senha,
            $idade,
            $sexo
        ];

        fputcsv($arquivo, $pessoa, ';');

        fclose($arquivo);

        header('Location: telaCadastroPessoa.php');
        exit();
    }    
?>