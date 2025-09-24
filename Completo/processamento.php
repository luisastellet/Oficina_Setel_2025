<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Processamento</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+CU:wght@100..400&display=swap');
    </style>
</head>
<body>

    <?php

        // Ajustando a localização para utilizar o UTF-8.
        //
        //setlocale(LC_ALL, 'en_US.UTF-8');
        //
        //echo "Language: < " . setlocale(LC_COLLATE, "0") . " >";
        //
        $locale_str = setlocale(LC_COLLATE, "pt_BR.UTF-8");

        // Lendo o arquivo json.
        $json_data = file_get_contents('dados.json');
        $dados = json_decode($json_data, true);
    ?>

    <main>
        

        <?php
            // IMPORTANTE CONHECER O OPERADOR DE NAVE ESPACIAL:
        
            // Utiliza o operador de nave espacial <=> para comparar os valores da chave altura:
            // Retorna -1 se $b['altura'] for menor que $a['altura'].
            // Retorna 0 se forem iguais.
            // Retorna 1 se $b['altura'] for maior que $a['altura'].
            // Retorna o método de requisição utilizado (por exemplo, GET, POST, PUT, etc.).


            // ENTENDENDO OS TIPOS DE ORDENAÇÃO:

            // SORT() => Ordena um array em ordem crescente.
            // RSORT() => Ordena um array em ordem decrescente.
            // ASORT() => Ordena um array associativo em ordem crescente, mas prrserva as chaves associativas.
            // USORT() => Ordena um array utilizando uma função de comparação definida pelo usuário.
            // KSORT() => Ordena um array pelas chaves em ordem crescente.


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // O $_POST coleta dados de um form HTML com o método POST.
                $opcao_escolhida = $_POST['opcao_escolhida'];

                // Iniciando a tabela.
                echo "<table>";
                echo "<thead>";
                    // Tag de linha da tabela.
                    echo "<tr>";
                    //Tag para o cabeçalho da tabela.
                        echo "<th>Nome</th>";
                        echo "<th>Idade</th>";
                        echo "<th>Altura</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                // Deseja exibir a ordenação por nome.
                if($opcao_escolhida == 'opcao1') { // NOME

                    // Garantindo a ordenação por ordem alfabética.
                    usort($dados['alunos'], function($a, $b) {
                        return strcoll($a['nome'], $b['nome']);
                    });

                    // Varrendo o vetor aluno por aluno já na ordem desejada.
                    echo "<h2> Dados dispostos em ordem alfabética de nome :</h2>";
                    foreach ($dados['alunos'] as $aluno) {
                        echo "<tr>";
                        echo "<td>" . $aluno['nome'] . "</td>";
                        echo "<td>" . $aluno['idade'] . " anos" . "</td>";
                        echo "<td>" . $aluno['altura'] . "m" . "</td>";
                        echo "</tr>";
                    }                    

                // Deseja exibir a ordenação por idade.
                } else if($opcao_escolhida == 'opcao2') { // IDADE
        
                    // Garantindo que em caso de empate, priorizará a ordem alfabética.
                    usort($dados['alunos'], function($a, $b) {
                        return strcoll($a['nome'], $b['nome']);
                    });

                    // Utilizando a função usort() que ordena baseado em uma função de comparação.
                    usort($dados['alunos'], function($a, $b) {
                        // Quem for mais velho aparece primeiro
                        if($a['idade'] < $b['idade']) return 1;
                        else if($a['idade'] > $b['idade']) return -1;
                        return 0;
                        // return $b['idade'] <=> $a['idade'];
                    });
                    
                    // Varrendo o vetor aluno por aluno já na ordem desejada.
                    
                    echo "<h2> Dados dispostos em ordem decrescente de idade : </h2>";
                    foreach ($dados["alunos"] as $aluno) {
                        echo "<tr>";
                        echo "<td>" . $aluno['nome'] . "</td>";
                        echo "<td>" . $aluno['idade'] . " anos" . "</td>";
                        echo "<td>" . $aluno['altura'] . "m" . "</td>";
                        echo "</tr>";
                    }

                // Deseja exibir a ordenação por altura.
                } else if($opcao_escolhida == 'opcao3') { // ALTURA

                    // Garantindo que em caso de empate, priorizará a ordem alfabética.
                    usort($dados['alunos'], function($a, $b) {
                        return strcoll($a['nome'], $b['nome']);
                    });

                    // Utilizando a função usort() que ordena baseado em uma função de comparação.
                    usort($dados['alunos'], function($a, $b) {
                        // Quem for mais baixo aparece primeiro.
                        return $a['altura'] <=> $b['altura'];
                    });

                    // Varrendo o vetor aluno por aluno já na ordem desejada.
                    echo "<h2> Dados dispostos em ordem crescente de altura : </h2>";
                    foreach ($dados['alunos'] as $aluno) {
                        echo "<tr>";
                        echo "<td>" . $aluno['nome'] . "</td>";
                        echo "<td>" . $aluno['idade'] . " anos" . "</td>";
                        echo "<td>" . $aluno['altura'] . "m" . "</td>";
                        echo "</tr>";
                    }
        
                }
                echo "</tbody>";
                echo "</table>";
		echo "<p>Tabela gerada dinamicamente.<br>";
                echo '<i>Locale string</i> = "' . $locale_str . '".</p>';
            }

            ?>
            <div>
                <a href="http://localhost/oficina_setel/index1.php">
                    <input type="button" id="botao-voltar" value="Voltar">
                </a>
            </div>
    </main>

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
