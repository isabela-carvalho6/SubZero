<?php
// get_bares.php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "dev_pub");

if ($conn->connect_error) {
    die(json_encode(["erro" => "Erro na conexão com o banco"]));
}

$sql = "SELECT nome_completo AS nome, cep, numero, tipo, latitude, longitude FROM bar WHERE latitude IS NOT NULL AND longitude IS NOT NULL";
$result = $conn->query($sql);

$bares = [];

while ($row = $result->fetch_assoc()) {
    $bares[] = [
        "nome" => $row["nome"],
        "endereco" => "CEP: " . $row["cep"] . ", Nº " . $row["numero"],
        "tipo" => $row["tipo"],
        "latitude" => (float)$row["latitude"],
        "longitude" => (float)$row["longitude"]
    ];
}

echo json_encode($bares);
?>
