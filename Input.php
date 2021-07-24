<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Input</title>
    <script type="text/javascript">
        function show_hide_password(target){
            var input = document.getElementById('password-input');
            if (input.getAttribute('type') == 'password') {
                target.classList.add('view');
                input.setAttribute('type', 'text');
            } else {
                target.classList.remove('view');
                input.setAttribute('type', 'password');
            }
            return false;
        }
    </script>
    <style>
    a {
        background-color: transparent;
        -webkit-text-decoration-skip: objects
    }

    a:active,
    a:hover {
        outline-width: 0
    }

    *,
    *:after,
    *:before {
        box-sizing: inherit;
        margin: 0;
        padding: 0;
        color: #F9F9F9;
    }

    html {
        box-sizing: border-box;
        font-size: 1px !important;
    }

    body {
        font: normal 14rem/21rem Arial, 'Helvetica CY', 'Nimbus Sans L', sans-serif;
        background-color: #003A66;
    }

    .outer {
        display: table;
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }

    .middle {
        display: table-cell;
        vertical-align: middle;
    }

    .inner {
        margin-left: auto;
        margin-right: auto;
        max-width: 570rem;
        min-width: 360rem;
        padding: 20rem;
    }

    h1 {
        line-height: 48rem;
        font-size: 48rem;
    }

    h2 {
        margin-top: 15rem;
        line-height: 26rem;
        font-size: 26rem;
        margin-bottom: 45rem;
    }

    .button {
        position: relative;
        display: inline-block;
        text-decoration: none;
        background-color: #FFCC66;
        color: #2A2A2A;
        padding: 8rem 16rem;
        border-radius: 5rem;
        overflow: hidden;
        font-size: 16rem;
        font-weight: bold;
    }

    i {
        border: solid #2A2A2A;
        border-width: 0 3rem 3rem 0;
        display: inline-block;
        padding: 3rem;
    }
	input {
		color: black;
		width: 170px;
  		height: 27px;
		}
	input:invalid {
  color: red
}
    .right {
        transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
    }
    </style>
</head>

<body>
<div class='outer'>
    <div class='middle'>
        <div class='inner' align="center">
            <a href="index.php" class="double-border-button">Menu</a>
            <?php
            $conn = new mysqli("localhost", "root", "root", "local_mariadb");
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM users";
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // количество полученных строк
                echo "<p><h2>Записей: $rowsCount</h2></p>";
                $result->free();
            } else{
                echo "Ошибка: " . $conn->error;
            }
            $conn->close();
            ?>
            <form action="Input_db.php" method="post"  align="center">
                <p>Name</p>
                <input type="text" name="name" placeholder="Введите имя" pattern="^[A-Za-zА-Яа-яЁё]+$">
                <p>Lastname</p>
                <input type="text" name="lastname" placeholder="Введите фамилию" pattern="^[A-Za-zА-Яа-яЁё]+$">
                <p>BDay</p>
                <input type="date" name="bdate">
                <p>INN</p>
                <input type="text" name="inn" placeholder="Введите инн" pattern="[0-9]{3,12}">
                <p>Login: </p>
                <input type="text" name="login" placeholder="Введите логин">

                <p>Password</p>
                <div class="password">
                    <input te type="password" id="password-input" placeholder="Введите пароль" name="password"><br>
                    <a href="#" class="password-control" onclick="return show_hide_password(this);">Показать пароль</a>
                </div><br>
                <input type="submit" value="Добавить" style="width: 130px;">
            </form>

        </div>
    </div>
</div>
</body>

</html>