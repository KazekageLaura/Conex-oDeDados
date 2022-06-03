<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar função de conexão com o banco de dados.</title>
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
    <?php
    function conexao(){
        $mysqli_connection = new MySQLi('localhost', 'root', '', 'test');
        if($mysqli_connection->connect_error){
            echo "DESCONECTADO! Erro: " . $mysqli_connection->connect_error;
            echo "<br>";
        }else{
            echo "CONECTADO!";
            echo "<br>";
            echo "<br>";
            echo "Lista das bases de dados encontradas no servidor conectado: ";
            echo "<br>";
        }
        return $mysqli_connection;
    }
    $con=conexao();
    #exibe os registros
    $con->set_charset("utf8");
 
    $r	= $con->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA");
    // ou 
    // $r = $con->query("SHOW DATABASES");
 
    while ($row = $r->fetch_object()) {
        $db = $row->SCHEMA_NAME;
        // ou
        // $db = $row->Database;
        echo $db."<br>";
     }
    
    ?>
</body>
</html>