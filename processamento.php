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
        // Lendo o arquivo json.
        $json_data = file_get_contents('dados.json');
        $dados = json_decode($json_data, true);

        // Função para remover acentos já que o php utiliza o ASCII.
        function remover_acento($string){
            // Vetor com os caracteres acentuados.
            $palavra_acentuada  = ['à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ü', 'Ú'];
            // Vetor com os caracteres não acentuados que devem substituir os acentuados acima.
            $palavra_nao_acentuada = ['a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U'];
            return str_replace($palavra_acentuada, $palavra_nao_acentuada, $string);
        }

        function ordem_alfabetica($vetor){
            $vetor_nomes   = array();
            $vetor_ordenado = array();
            if (count($vetor) > 0) {

                // Montei um vetor_nomes mantendo org_vetor_keys.
                // Isso é relevante para voltarmos com os acentos no final.
                foreach ($vetor as $k => $v) {
                    $vetor_nomes[$k] = remover_acento($v['nome']);
                }
                unset($v);

                // asort() ordena os valores, mantendo as chaves.
                asort($vetor_nomes);

                // Copiando os registros do org_vetor, usando o vetor_nomes ordenado.
                //Voltando com os acentos.
                foreach ($vetor_nomes as $k => $v) {
                    $vetor_ordenado[$k] = $vetor[$k];
                }
                unset($v);
            }
            return $vetor_ordenado;
        }
    ?>

    <main>
        

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

                // Iniiando a tabela.
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

                    // Garantindo que em caso de empate, priorizará a ordem alfabética.
                    $vetor_ordenado = ordem_alfabetica($dados["alunos"]);

                    // Varrendo o vetor aluno por aluno já na ordem desejada.
                    echo "<h2> Dados dispostos em ordem alfabética de nome:</h2>";
                    foreach ($vetor_ordenado as $aluno) {
                        echo "<tr>";
                        echo "<td>" . $aluno['nome'] . "</td>";
                        echo "<td>" . $aluno['idade'] . " anos" . "</td>";
                        echo "<td>" . $aluno['altura'] . "m" . "</td>";
                        echo "</tr>";
                    }                    

                // Deseja exibir a ordenação por idade.
                } else if($opcao_escolhida == 'opcao2') { // IDADE
        
                    // Garantindo que em caso de empate, priorizará a ordem alfabética.
                    $vetor_ordenado = ordem_alfabetica($dados["alunos"]);

                    // Utilizando a função usort() que ordena baseado em uma função de comparação.
                    usort($vetor_ordenado, function($a, $b) {
                        // Quem for mais novo aparece primeiro
                        return $a['idade'] <=> $b['idade'];
                    });
                    
                    // Varrendo o vetor aluno por aluno já na ordem desejada.
                    
                    echo "<h2> Dados dispostos em ordem crescente de idade: </h2>";
                    foreach ($vetor_ordenado as $aluno) {
                        echo "<tr>";
                        echo "<td>" . $aluno['nome'] . "</td>";
                        echo "<td>" . $aluno['idade'] . " anos" . "</td>";
                        echo "<td>" . $aluno['altura'] . "m" . "</td>";
                        echo "</tr>";
                    }

                // Deseja exibir a ordenação por altura.
                } else if($opcao_escolhida == 'opcao3') { // ALTURA

                    // Garantindo que em caso de empate, priorizará a ordem alfabética.
                    $vetor_ordenado = ordem_alfabetica($dados["alunos"]);

                    // Utilizando a função usort() que ordena baseado em uma função de comparação.
                    usort($vetor_ordenado, function($a, $b) {
                        // Quem for mais alto aparece primeiro.
                        return $b['altura'] <=> $a['altura'];
                    });

                    // Varrendo o vetor aluno por aluno já na ordem desejada.
                    echo "<h2> Dados dispostos em ordem descresente de altura: </h2>";
                    foreach ($vetor_ordenado as $aluno) {
                        echo "<tr>";
                        echo "<td>" . $aluno['nome'] . "</td>";
                        echo "<td>" . $aluno['idade'] . " anos" . "</td>";
                        echo "<td>" . $aluno['altura'] . "m" . "</td>";
                        echo "</tr>";
                    }
        
                }
                echo "</tbody>";
                echo "</table>";
                echo "<p> OBS: Tabela gerada dinamicamente. </p>";
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