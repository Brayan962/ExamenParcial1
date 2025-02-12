<?php //Examen php Brayan ramirez


$host = "localHost:3306";
$database = 'Sakila';
$username = 'root';
$password = 'Brayanrr02002..';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT category_id, name, last_update FROM category ORDER BY last_update DESC LIMIT 5";
    $sql = "select c.name as category_name, COUNT(i.category_id) as last_update
            from category c
            join f.category f on i.category_id = i.category_id
            group by i.category_id
            order by c.name";

    require("config.php");
    try {
        $conn = new PDO("mysql:host = $host;dbname=$database", $username, $password);
        $consulta = "SELECT * FROM category";
        $stnt = $conn->query($consulta);
        $empleados = $stnt->fetchAll(PDO::FETCH_ASSOC);


    } catch (PDOException $pe) {
        die("Could not connect to the database $database :" . $pe->getMessage());
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $category_id = $_POST["category_id"] ?? null;
        $name = $_POST["name"] ?? null;
        $last_update = $_POST["last_update"] ?? null;


        if ($category_id && $name) {
            $sql = "INSERT INTO category (category_id, name, last_update) VALUES (:first_name, :last_name, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['first_name' => $category_id, 'last_name' => $name]);
            echo "las catgorias son agregado correctamente";
        } else {
            echo "los campos son obligatorios";

        }
    }

    $stmt = $pdo->query($sql);
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: no se a encontrado la categoria que solicita " . $e->getMessage();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title> Los registros mas actuales en la misma tabla de las categorias </title>
</head>
<body>
<div class = "container text-center">
    <h1 class "st-5> hola, boostrap</h1>
    <p class="lead"> Este es un ejemplo utilizando el boostrap desde el CON</p>
    <button class="btn btn-primary">haga click aqui</button>
</div>


</body>
</html>

