<?php
// get_bares.php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "dev_pub");

if ($conn->connect_error) {
    die(json_encode(["erro" => "Erro na conexão com o banco"]));
}

$sql = "SELECT nome_completo AS nome, endereco_completo, tipo FROM bar";
$result = $conn->query($sql);

$bares = [];

while ($row = $result->fetch_assoc()) {
    $bares[] = [
        "nome" => $row["nome"],
        "endereco" => $row["endereco_completo"],
        "tipo" => $row["tipo"]
    ];
}

echo json_encode($bares);
?>
