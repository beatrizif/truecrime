<?php
$P1 = $_POST['P1'];
$P2 = $_POST['P2'];
$P3 = $_POST['P3'];
$P4 = $_POST['P4'];
$P5 = $_POST['P5'];
$P6 = $_POST['P6'];

$conn = new PDO('mysql:host=127.0.0.1:3306;dbname=db_truecrime', 'root', 'mjsm2004');

try{ 
$stmt = $conn->prepare("INSERT INTO tb_avaliacoes (P1, P2, P3,P4,P5,P6)
 VALUES ('".$P1."', '".$P2."', '".$P3."', '".$P4."', '".$P5."', '".$P6."' );");
$stmt->execute();
echo "<center><script>
alert('Formulário enviado com sucesso!');
window.location.href = '../contact.html';
</script>;</center>";
} catch(PDOException $e) {
    echo "<br>" . $e->getMessage();
  }

?>
