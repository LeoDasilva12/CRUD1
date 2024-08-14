<?php
include 'conex.php';

if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $id_cidade = $_POST['cidade'];

    // Adicionar o cliente
    $sql_add_cliente = "INSERT INTO cliente (nome_cliente, telefone_cliente, endereco_cliente, id_cidade, email_cliente) VALUES ('$nome', '$telefone', '$endereco', '$id_cidade', '$email')";

    if ($conn->query($sql_add_cliente) === TRUE) {
        echo "Cadastro feito com sucesso!";
    } else {
        echo "Erro ao cadastrar cliente: " . $conn->error;
    }

    header("Location: index_cadastro.php");
}

$conn->close();
?>
