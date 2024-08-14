<?php
// Substitua as credenciais do banco de dados
include 'conex.php';

// Obtém o ID do cliente a ser editado
$id_cliente = $_GET['id'];

// Obtém os dados do cliente para preencher o formulário de edição
$sql = "SELECT cliente.nome_cliente, cliente.telefone_cliente, cliente.endereco_cliente, cliente.email_cliente, cidade.id_cidade
        FROM cliente
        INNER JOIN cidade ON cliente.id_cidade = cidade.id_cidade
        WHERE cliente.id_cliente = $id_cliente";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $nome = $row['nome_cliente'];
    $telefone = $row['telefone_cliente'];
    $endereco = $row['endereco_cliente'];
    $email = $row['email_cliente'];
    $id_cidade = $row['id_cidade'];
} else {
    echo "Cliente não encontrado.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cidadão</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Editar Cidadão</h2>
            <form action="edit.php" method="post">

                <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
                <input type="text" name="nome" value="<?php echo $nome; ?>" required>
                <input type="text" name="telefone" value="<?php echo $telefone; ?>">
                <input type="text" name="endereco" value="<?php echo $endereco; ?>">
                <input type="email" name="email" value="<?php echo $email; ?>" required>

                <?php
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $sql = "SELECT cidade.id_cidade, cidade.nome_cidade, pais.nome_pais
                    FROM cidade
                    INNER JOIN pais ON cidade.sigla_pais = pais.sigla_pais";

                    $result = $conn->query($sql);
                ?>

                <select name="cidade" required>
                    <?php
                        while ($row = $result->fetch_assoc()) {
                        $selected = ($row['id_cidade'] == $id_cidade) ? 'selected' : '';
                        echo "<option value='{$row['id_cidade']}' $selected>{$row['nome_cidade']}, {$row['nome_pais']}</option>";
                        }
                    ?>
                </select>

                <input type="submit" class="btn" value="Atualizar">
            </form>
        </div>
    </section>
</body>
</html>