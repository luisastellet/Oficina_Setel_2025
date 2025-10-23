<!DOCTYPE html>
<html lang="en">

<?php
    $jsonData = file_get_contents('dados.json');
    $data = json_decode($jsonData, true)
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficina de web - SeTel 25</title>

    <link rel="stylesheet" href="style.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+CU:wght@100..400&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');
    </style>
</head>
<body>
    <main>
        <h1>Oficina de Pacote web</h1>
        <p>Esta oficina está sendo oferecida durante a SeTel 205 pelos alunos do PET-Tele</p>

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

        <p>Obs: Tabela gerada dinamicamente</p>
    </main>

    <footer>
        <p>Desenvolvido por: Luisa Stellet e o grupo PET-Tele</p>

        <div>
            <a target="_blank" href="https://www.telecom.uff.br/pet/petws/index.php"><img src="site.png" alt="Logo"></a>
        </div>

    </footer>

</body>
</html>