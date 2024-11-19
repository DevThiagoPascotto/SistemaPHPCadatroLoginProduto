<?php 
  
    include("conexao.php");

    $name = $_POST['name'];
    $idade = $_POST['idade'];
   
    $abrir = $_POST['abrir'];
    $dobrar = $_POST['dobrar'];

    $inserir = $pdo->prepare("insert into demo (name,idade,abrir,dobrar)
                     values ('$name', '$idade', '$abrir','$dobrar')");
    $inserir->execute();

    header("location:produtos.php");


?>