<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
	<title>Cadastro de Cidadão</title>
</head>
<body>
    <section class="form__section">

        <div class="container form__section-container">

            <h2>Cadastar Cidadão</h2>

            <form action="create.php" method="post">

                <input type="text" name="nome" placeholder="Insira o seu nome"/>

                <input type="number" name="telefone" placeholder="Insira o seu contacto"/>

                <input type="text" name="endereco" placeholder="Insira o endereço"/>

                <input type="text" name="email" placeholder="Insira o e-mail"/>

                <!-- Seleção da cidade e país -->
                <?php
                include 'conex.php';

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
                <input type="submit" name="salvar" class="btn" value="Cadastrar"> 
                <small>Já cadastrou então liste os dados? <a href="list_dados.php">Listar dados</a></small>	
            </form>
        </div>
    </section>
<script src="validate.js"></script>
</body>
</html>
