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

    <!-- Tag title => Título da página -->
    <title>Oficina de web - SeTel 24</title>

    <!-- Tag link => Importando um arquivo css -->
    <link rel="stylesheet" href="style.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+CU:wght@100..400&display=swap');
    </style>
</head>


<!-- Tag body => Parte do código que terá o conteúdo de fato -->
<body>

    <main>
        <!-- Tag de título (h1,h2,h3,h4,h5.h6) -->
        <h1>Oficina de Pacote web</h1>

        <!-- Tag de parágrafo -->
        <p>Esta oficina está sendo oferecida durante a XV Semana de Telecomunicações (SeTel 2024) pelos alunos do grupo PET-Tele.</p>
   

        <!-- Tag de criação de uma tabela -->
        <table>

            <!-- Tag de cabeçalho da tabela -->
            <thead>
                <!-- Tag de linha da tabela -->
                <tr>
                    <!-- Tag para o cabeçalho da tabela -->
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Altura</th>
                </tr>
            </thead>

            <!-- Tag de corpo da tabela -->
            <tbody>
                <?php
                    // Usando um foreach, que itera sobre cada aluno
                    foreach ($data['alunos'] as $aluno){
                        // O echo faz aparecer na tela e o "." concatena os elementos 
                        echo "<tr>";
                        // Acessando os dados de cada aluno por meio das chaves/keys
                        echo "<td>" . $aluno['nome'] . "</td>";
                        echo "<td>" . $aluno['idade'] . " anos" . "</td>";
                        echo "<td>" . $aluno['altura'] . "m" . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            
        </table>
        <p>Obs: Tabela gerada dinamicamente.</p>

    </main>

    <!-- Tag de rodapé -->
    <footer>
        <p>Desenvolvido por: Luisa Stellet e o grupo PET-Tele da UFF.</p>

        <!-- Tag de div (como se fosse uma caixinha) -->
        <div>
            <!-- Tag de imagem -->
            <a target="_blank" href="https://www.telecom.uff.br/pet/petws/index.php"><img src="Imagens/site.png" alt="Site"></a>
            <a target="_blank" href="https://www.instagram.com/petteleuff/"><img src="Imagens/insta.png" alt="Instagram"></a>
        </div>
    </footer>
    
</body>

</html>