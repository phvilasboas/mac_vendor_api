<?php

// Nome do arquivo do banco de dados SQLite
$dbFile = '/home/db/iee.sqlite';

try {
    // Conexão com o banco de dados SQLite
    $pdo = new PDO('sqlite:' . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die('Erro de conexão com o banco de dados: ' . $e->getMessage());
}

// Função para consultar o OUI no banco de dados SQLite
function consultarOUI($mac) {
    global $pdo;

    // Formata o MAC removendo dois pontos e convertendo para maiúsculas
    $formattedMAC = strtoupper(str_replace('-', '', $mac));

    // Se o comprimento do MAC for maior que 6, considera apenas os primeiros 6 caracteres
    if (strlen($formattedMAC) > 6) {
        $formattedOUI = substr($formattedMAC, 0, 8);
    } else {
        $formattedOUI = $formattedMAC;
    }

    // Adiciona o caractere '%' para tratar casos em que o endereço MAC possui mais caracteres
    $formattedOUIWithWildcard = $formattedOUI . '%';

    // Query SQL para consultar o OUI
    $sql = "SELECT nome FROM fabricantes WHERE mac_prefixo LIKE :oui";
    
    // Prepara a declaração
    $stmt = $pdo->prepare($sql);

    // Substitui o marcador de posição com o valor de $formattedOUIWithWildcard
    $stmt->bindParam(':oui', $formattedOUIWithWildcard, PDO::PARAM_STR);
    
    try {
        // Executa a consulta
        $stmt->execute();

        // Obtém o resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retorna o resultado ou uma mensagem de erro
        return $resultado ? $resultado['nome'] : 'Not Found';
    } catch (PDOException $e) {
        die('Erro na consulta SQL: ' . $e->getMessage());
    }
}

// Obtém o valor do parâmetro "mac" da consulta
$mac = isset($_GET['mac']) ? strtoupper($_GET['mac']) : '';

// Verifica se há um valor para $mac antes de chamar a função de consulta
if ($mac !== '') {
    // Chama a função de consulta
    $resultadoConsulta = consultarOUI($mac);

    // Retorna o resultado como JSON
    header('Content-Type: application/json');
    echo json_encode(['fabricante' => $resultadoConsulta]);
}
// Se $mac estiver vazio, não faz nada (não apresenta nada)
