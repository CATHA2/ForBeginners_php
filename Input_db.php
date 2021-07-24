<?php
    $conn = new mysqli("localhost", "root", "root", "local_mariadb");
    // Проверяем соединение
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(empty($_POST['name'])) exit("Поле имени не заполнено");
    if(empty($_POST['lastname'])) exit("Поле фамилии не заполнено");
    if(empty($_POST['bdate'])) exit("Поле дня не заполнено");
    if(empty($_POST['inn'])) exit("Поле инн не заполнено");
    if(empty($_POST['login'])) exit("Поле логина не заполнено");
    if(empty($_POST['password'])) exit("Поле пароля не заполнено");

    $name = $conn->real_escape_string($_POST["name"]);
    $lastname = $conn->real_escape_string($_POST["lastname"]);
    $bday = $conn->real_escape_string($_POST["bdate"]);
    $inn = $conn->real_escape_string($_POST["inn"]);
    $login = $conn->real_escape_string($_POST["login"]);
    $pass = $conn->real_escape_string($_POST["password"]);
    $sql = "INSERT INTO users VALUES (null , '$name', '$lastname', '$bday', '$inn', '$login', '$pass')";
    $result = mysqli_query($conn, $sql);
    $conn->close();
   header("Location: Input.php");
?>