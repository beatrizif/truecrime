

<?php
$P1 = $_POST['P1'];
$P2 = $_POST['P2'];
$P3 = $_POST['P3'];
$P4 = $_POST['P4'];
$P5 = $_POST['P5'];
$P6 = $_POST['P6'];

try {
    $conn = new PDO('sqlite:database.sqlite');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Corrigindo a tabela
    $conn->exec("CREATE TABLE IF NOT EXISTS tb_avaliacoes (
        id INTEGER PRIMARY KEY,
        P1 VARCHAR(45) NOT NULL,
        P2 VARCHAR(45) NOT NULL,
        P3 VARCHAR(45) NOT NULL,
        P4 VARCHAR(45) NOT NULL,
        P5 VARCHAR(45) NOT NULL,
        P6 VARCHAR(45) NOT NULL
    )");

    // Usando instrução preparada para evitar SQL injection
    $stmt = $conn->prepare("INSERT INTO tb_avaliacoes (P1, P2, P3, P4, P5, P6) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$P1, $P2, $P3, $P4, $P5, $P6]);

    echo "<center><script>
alert('Formulário enviado com sucesso!');
window.location.href = '../contact.html';
</script>;</center>";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
