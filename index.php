<?php
// Подключение к базе данных PostgreSQL
$host = "localhost";
$port = "5432";
$dbname = "library";
$user = "postgres";
$password = "12345678";
$db = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
// Проверка соединения с базой данных
if (!$db) {
    die("Ошибка соединения: " . pg_last_error());
}
// Получение данных из POST запроса
$name = $_POST['name'];
// Проверка наличия данных
if (!$name) {
    die("Введите имя");
}
// Проверка на корректность данных (например, длина имени)
if (strlen($name) > 50) {
    die("Имя слишком длинное");
}
// Подготовка и выполнение запроса на добавление данных в базу
$query = "INSERT INTO employee (name) VALUES ('$name')";
$result = pg_query($db, $query);
if (!$result) {
    die("Ошибка в запросе: " . pg_last_error());
}
echo "Данные добавлены успешно";
// Закрытие соединения с базой данных
pg_close($db);
?>