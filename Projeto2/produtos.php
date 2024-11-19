<?php 
    //session_start(); 
    include("conexao.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1>Consulta dos dados</h1>
    <br>
    <div class="containder">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                if (isset($_SESSION['status'])) {
                    echo "<h4>" . $_SESSION['status'] . "</h4>";
                    unset($_SESSION['status']);
                }
                ?>

                
             

            

       <section>

            <table class="table table-striped">
                <tr>
                    
                    <th>Nome</th>
                    <th>valor</th>
                    <th>marca</th>
                    
                   
                    
                    

                    <th> &nbsp; </th>                    
                </tr>
                
                  
                <?php
                    $consulta = $pdo->prepare("SELECT * from produto;");
                    $consulta->execute();

                   while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
                        
                        echo "<tr>";
                                               
                                                    echo "<td>" . $linha["name"] . "</td>";      
                                                    echo "<td>" . $linha["valor"] . "</td>";   
                                                                 
                                                    echo "<td>" . $linha["marca"] . "</td>";
                                                 
                        echo "<td>"; 

                                echo "<a href=excluirCheck.php?id=$linha[0]> Excluir </a>";
                            echo "</td>";
                        echo "</tr>"    ;                       

                   }
                ?>


            </table>

            <div class="card-header">

                        <h6 align="right"> Check lista Quiosque Morumbi TELEFONE: (11)5555-5555</h6>

                    </div>
                    <div class="card-body">

                </section>
        <section>

          

      
</body>

</html>