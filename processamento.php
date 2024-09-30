<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Processamento</title>
</head>
<body>

    <?php
        // Lendo o arquivo json.
        $json_data = file_get_contents('dados.json');
        $dados = json_decode($json_data, true);

        // Ajustes para ordenação correta, com base no UTF-8.
        setlocale(LC_ALL, 'pt_BR.utf-8');

    ?>

    <?php
        // IMPORTANTE CONHECER O OPERADOR DE NAVE ESPACIAL:
        
        // Utiliza o operador de nave espacial <=> para comparar os valores da chave altura:
        // Retorna -1 se $b['altura'] for menor que $a['altura'].
        // Retorna 0 se forem iguais.
        // Retorna 1 se $b['altura'] for maior que $a['altura'].

        // Retorna o método de requisição utilizado (por exemplo, GET, POST, PUT, etc.).
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // O $_POST coleta dados de um form HTML com o método POST.
            $opcao_escolhida = $_POST['opcao_escolhida'];

            // Deseja exibir a ordenação por nome.
            if($opcao_escolhida == 'opcao1') { // NOME

                // Garantindo que em caso de empate, priorizará a ordem alfabética.
                sort($dados["alunos"], SORT_LOCALE_STRING);

                // Varrendo o vetor aluno por aluno já na ordem desejada.
                foreach ($vetor_ordenado as $aluno) {
                    echo "<tr>";
                    echo "<td>" . $aluno['nome'] . "</td>";
                    echo "<td>" . $aluno['idade'] . " anos" . "</td>";
                    echo "<td>" . $aluno['altura'] . "m" . "</td>";
                    echo "</tr>";
                    echo "<p> OBS: Tabela gerada dinamicamente. </p>";
                    echo "<p> Critério: Ordem alfabética de nomes. </p>";
                }

            // Deseja exibir a ordenação por idade.
            } else if($opcao_escolhida == 'opcao2') { // IDADE
                
                // Garantindo que em caso de empate, priorizará a ordem alfabética.
                sort($dados["alunos"], SORT_LOCALE_STRING);

                // Utilizando a função usort() que ordena baseado em uma função de comparação.
                usort($vetor_ordenado, function($a, $b) {
                    // Quem for mais novo aparece primeiro
                    return $a['idade'] <=> $b['idade'];
                });

                // Varrendo o vetor aluno por aluno já na ordem desejada.
                foreach ($vetor_ordenado as $aluno) {
                    echo "<tr>";
                    echo "<td>" . $aluno['nome'] . "</td>";
                    echo "<td>" . $aluno['idade'] . " anos" . "</td>";
                    echo "<td>" . $aluno['altura'] . "m" . "</td>";
                    echo "</tr>";
                    echo "<p> OBS: Tabela gerada dinamicamente. </p>";
                    echo "<p> Critério: Ordem crescente de idades. </p>";
                }

            // Deseja exibir a ordenação por altura.
            } else if($opcao_escolhida == 'opcao3') { // ALTURA

                // Garantindo que em caso de empate, priorizará a ordem alfabética.
                sort($dados["alunos"], SORT_LOCALE_STRING);
                
                // Utilizando a função usort() que ordena baseado em uma função de comparação.
                usort($vetor_ordenado, function($a, $b) {
                    // Quem for mais alto aparece primeiro.
                    return $b['altura'] <=> $a['altura'];
                });

                // Varrendo o vetor aluno por aluno já na ordem desejada.
                foreach ($vetor_ordenado as $aluno) {
                    echo "<tr>";
                    echo "<td>" . $aluno['nome'] . "</td>";
                    echo "<td>" . $aluno['idade'] . " anos" . "</td>";
                    echo "<td>" . $aluno['altura'] . "m" . "</td>";
                    echo "</tr>";
                    echo "<p> OBS: Tabela gerada dinamicamente. </p>";
                    echo "<p> Critério: Ordem descresente de alturas. </p>";
                }
                
            }
        }

    ?>

</body>
</html>