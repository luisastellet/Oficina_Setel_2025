<!-- Tag inicial para arquivos html -->
<!DOCTYPE html>
<html lang="pt-BR">

<!-- Abrindo os arquivos de dados para manipular -->
<?php
    $jsonData = file_get_contents('dados.json');
    $data = json_decode($jsonData, true);
?>

<!-- Tag head => metadados da página -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficina de web - SeTel 24</title>
    <link rel="stylesheet" href="style.css">
</head>


<!-- Tag body => Parte do código que terá o conteúdo de fato -->
<body>

    <main>
        <!-- Tag de título (h1,h2,h3,h4,h5.h6) -->
        <h1>Oficina de Pacote web</h1>

        <!-- Tag de parágrafo -->
        <p>Esta oficina está sendo oferecida durante a VIII Semana de Computação da Universidade Federal Fluminense (UFF) para a SeTel 24 pelos alunos do grupo PET-Tele.</p>
   

        <!-- Tag de criação de uma tabela -->
        <table>

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Altura</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach ($data['alunos'] as $aluno){
                        echo "<tr>";
                        echo "<td>" . $aluno['nome'] . "</td>";
                        echo "<td>" . $aluno['idade'] . "</td>";
                        echo "<td>" . $aluno['altura'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            
        </table>
        <p>Obs: Tabela gerada dinamicamente.</p>

    </main>

    <footer>
        <p>Desenvolvido por: Luisa Stellet e o grupo PET-Tele da UFF.</p>
        <div>
            <img src="Imagens/site.png" alt="Instagram">
            <img src="Imagens/insta.png" alt="Site">
        </div>
    </footer>
    
</body>

</html>