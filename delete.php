<?php
// Substitua as credenciais do banco de dados
include 'conex.php';

// Obtém o ID do cliente a ser excluído
$id_cliente = $_GET['id'];

// Exclui o cliente da tabela cliente
$sql = "DELETE FROM cliente WHERE id_cliente='$id_cliente'";

if ($conn->query($sql) === TRUE) {
    echo "Cliente excluído com sucesso!";
} else {
    echo "Erro ao excluir cliente: " . $conn->error;
}

$conn->close();

// Redireciona de volta à página principal após a exclusão
header("Location: list_dados.php");
exit();
?>
