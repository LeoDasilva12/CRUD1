<?php
// Substitua as credenciais do banco de dados
include 'conex.php';

// Recebe os dados do formulário
$id_cliente = $_POST['id_cliente'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$email = $_POST['email'];
$id_cidade = $_POST['cidade'];

// Atualiza os dados na tabela cliente
$sql = "UPDATE cliente
        SET nome_cliente='$nome', telefone_cliente='$telefone', endereco_cliente='$endereco', email_cliente='$email', id_cidade='$id_cidade'
        WHERE id_cliente='$id_cliente'";

if ($conn->query($sql) === TRUE) {
    echo "Cliente atualizado com sucesso!";
} else {
    echo "Erro ao atualizar cliente: " . $conn->error;
}

$conn->close();

// Redireciona de volta à página principal após a atualização
header("Location: list_dados.php");
exit();
?>
