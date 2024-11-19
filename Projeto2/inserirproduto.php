<?php 
  
    include("conexao.php");

    $name = $_POST['name'];
    $valor  = $_POST['valor'];
    $marca  = $_POST['marca'];
    

   
    

    $inserir = $pdo->prepare("insert into produto (name,valor,marca)
                     values ('$name', '$valor', '$marca')");
    $inserir->execute();

    header("location:produtos.php");


?>