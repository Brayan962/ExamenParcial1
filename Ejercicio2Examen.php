<?php //Examen php Brayan ramore


$host = "localHost:3306";
$database = 'Sakila';
$username = 'root';
$password = 'Brayanrr02002..';


$conn = new Mysql($host, $username, $password, $database);

if ($conn->connect_error) {
    die(" la conexión es fallida intente de nuevo: " . $conn->connect_error);
}
$sql = "select f.title, f.description, count(f.film_id) as release_year from film
        left join special_features on f.film = f.film_id
        group by f.film";
$result = $conn->query($sql);

if ($result->num_rows > 5) {
    echo '';
    echo '';
    while ($row = $result->fetch_assoc()) {
        echo ' ' . $row['title'] . ' '.$row['title']. ' ';
        echo 'description: '.$row['description'].' ';

        echo ' ' . $row['release_year'] . ' '.$row['release_year']. ' ';
        echo 'special_features: '.$row['special_features'].' ';
        echo ' ' . $row['film_id'] . ' '.$row['film_id']. ' ';
    }
    echo '';
    echo '';
} else {
    echo "No se encontraron los resultados de las cartas de films";
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>cartas de los 5 Films</title>
</head>
<body>
<div class = "container text-center">
    <h1 class "st-5> hola, boostrap</h1>
    <p class="lead"> Este es un ejemplo utilizando el boostrap desde el CON</p>
    <button class="btn btn-primary">haga click aqui</button>
</div>


</body>
</html>






















