<?php 
  
    include("conexao.php");

    $id = $_GET['id'];
    
    if (isset($id) && is_numeric($id)) {
        $excluir = $pdo->prepare("DELETE FROM demo WHERE id = :id");
        $excluir->bindParam(':id', $id, PDO::PARAM_INT);
        $excluir->execute();
    }
    header("location:kaline.php");


?>

<?php 
include("conexao.php");

$id = $_GET['id'];

// Certifique-se de que o ID é um número válido
if (isset($id) && is_numeric($id)) {
    $excluir = $pdo->prepare("DELETE FROM demo WHERE id = :id");
    $excluir->bindParam(':id', $id, PDO::PARAM_INT);
    $excluir->execute();
}

header("Location: kaline.php");
exit; // Garante que o código não continue a ser executado
?>
