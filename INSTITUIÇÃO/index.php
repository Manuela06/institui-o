
<?php

include_once 'conexao.php';


// esse codigo exclui o item do banco de dados

if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
    $id = $_GET['id'];

    if ($id > 0) {
        //Abrir conexao com o banco de dados 
        $conexao = abrirBanco();
        //Preparar um SQL de Exclusão
        $sql = "DELETE FROM vales WHERE id = $id";
        //Executar comando no banco
        if ($conexao->query($sql) === TRUE) {
            echo "<script>alert('Contato excluido com sucesso!)</script>";
        } else {
            echo "Contato excluido com sucesso!";
        }
    }
    fecharBanco($conexao);

}


// fim excluir


if($_SERVER['REQUEST_METHOD']== "POST"){
    //Captura os dados digitados no form e salva em variaveis
    //para facilitar a manipulacao dos dados
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $date= $_POST['date'];
   
  

    //Vamos abrir a conexao com o banco de dados
    $conexao = abrirBanco();

    //vamos criar o SQL para realizar o insert dos dados no BD
    $sql = "INSERT INTO vales (descricao, valor, data_do_vale)
    VALUES  ('$descricao', '$valor','$date' )";

// var_dump($sql);
// exit;

    if($conexao->query($sql)=== TRUE) {
        echo ":) Sucesso ao cadastrar o contato :)";
    } else {
        echo ":( Erro ao cadastrar o contato :(";
    }

    fecharBanco($conexao);
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituicao</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    
</body>

<h1>GERENCIAR VALES</h1>

<hr>

<form action="" method="post">
    <label for="descricao">Descrição</label>
    <input type="text"require name="descricao"

   

    <label for="data">Data do Vale</label>
    <input type="date" name="date">

    <label for="valor" >Valor</label>
    <input type="text"require name="valor">

    
    <button type="submit">Cadastrar</button>

</form>

<div class="caixa">
    <section>
        <h2>CADASTRAR VALES</h2>
        <table border="1" class="table-listar">
            <th>
                <tr>
                    
                    <td>Descricao</td>
                    <td>Valor</td>
                    <td>Data_do_vale</td>
                    <td>Atualizado_em</td>
                    <td>Criado_em</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>

            <?php
            $conexao = abrirBanco();
            $query = "SELECT id, descricao, valor, data_do_vale, atualizado_em, criado_em
            FROM vales";
            $result = $conexao->query($query);
            if ($result->num_rows > 0) {
                while ($registros = $result->fetch_assoc()) {
                    // echo "<pre>";
                    // print_r($registros);
                    // echo "</pre>";
                    // exit;
                    ?>
                     <tr>
                        
                            <td><?= $registros['descricao'] ?></td>
                            <td><?= $registros['valor'] ?></td>
                            <td><?= date("d/m/Y", strtotime($registros['data_do_vale'])) ?></td>
                            <td><?= $registros['criado_em'] ?></td>
                            <td><?= $registros['atualizado_em'] ?></td>
                            <td>
                                <a href="editar.php?acao=editar&id=<?= $registros['id'] ?>"><button 
                                class="btn-editar">EDITAR</button></a>
                                <a href="?acao=excluir&id=<?= $registros['id'] ?>" onclick="return confirm
                                ('Tem certeza que deseja excluir?');">
                                    <button class="btn-excluir">EXCLUIR</button></a>
                                    </div>
                            </td>

                        </tr>
                                <?php

                }
            } else {
                ?>

                <tr>
                    <td colspan='7'>Nenhum registro encontrado no banco de dados</td>
                    <tr>
                        <?php

            }
            //Criar um laço de repetição para preencher a tabela
                    ?>
                    <tbody>

                    <table>
                        <section>
                            <section>
                                <img src="" class="">
                            </section>
                            </div>
                    </body>
                    </html>