<?php 
    include 'conex.php';

    // Função para exibir os dados
    function displayData($conn) {
        $sql = "SELECT cliente.id_cliente, cliente.nome_cliente, cliente.telefone_cliente, cliente.endereco_cliente, cliente.email_cliente, cidade.nome_cidade, pais.nome_pais
                FROM cliente
                INNER JOIN cidade ON cliente.id_cidade = cidade.id_cidade
                INNER JOIN pais ON cidade.sigla_pais = pais.sigla_pais";
        $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style1.css" rel='stylesheet' type='text/css' media="all">
    <link rel="stylesheet" href="table.css">
    <title>Ver Clientes</title>
</head>
<body>
    <section class="dashboard">
        <div class="container dashboard__container">
            <main>
                <h2>Manejar Cidadão</h2>
                <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Email</th>
                        <th>Cidade</th>
                        <th>País</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["nome_cliente"]."</td>
                        <td>".$row["telefone_cliente"]."</td>
                        <td>".$row["endereco_cliente"]."</td>
                        <td>".$row["email_cliente"]."</td>
                        <td>".$row["nome_cidade"]."</td>
                        <td>".$row["nome_pais"]."</td>
                        <td>
                            <a href='update.php?id=".$row["id_cliente"]."' class='btn sn'>Editar</a>
                        </td>
                        <td>
                        <a href='delete.php?id=".$row["id_cliente"]."' class='btn sn danger'>Eliminarr</a>
                        </td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum resultado encontrado.";
        }
    }

    // Exibir os dados
    displayData($conn);
    $conn->close();
    ?>
            </tbody>
        </table>
                </main>
            </div>
        <small><a href="index_cadastro.php">Cadastrar Cidadão</a></small>
    </section>
</body>
</html>