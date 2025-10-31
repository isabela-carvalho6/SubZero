<?php
// get_bares.php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "dev_pub");

if ($conn->connect_error) {
    die(json_encode(["erro" => "Erro na conexão com o banco"]));
}

$sql = "SELECT nome_completo AS nome, email, latitude, longitude, estado, cidade, senha FROM bar";
$result = $conn->query($sql);

$bares = [];


while ($row = $result->fetch_assoc()) {
    $bares[] = [
        "nome" => $row["nome"],
        "email" => $row["email"],
        "latitude" => $row["latitude"],
        "longitude" => $row["longitude"],
        "estado" => $row["estado"],
        "cidade" => $row["cidade"],
        "senha" => $row["senha"]
    ];
}

echo json_encode($bares);
?>
