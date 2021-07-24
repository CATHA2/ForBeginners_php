<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Full Info</title>
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
                echo "<p><h2>Получено объектов: $rowsCount</h2></p>";
                echo "<table><tr><th>Id</th><th>Name</th><th>Namelast</th><th>BDay</th><th>   </th><th>INN</th><th>Login</th><th>Password</th></tr>";
                foreach($result as $row){
                    echo "<tr>";
                    echo "<td align=\"center\" nowrap>".$row["ID"]."</td>";
                    echo "<td align=\"center\" nowrap>".$row["NAME"]."</td>";
                    echo "<td align=\"center\" nowrap>".$row["NAMELAST"]."</td>";
                    echo "<td align=\"center\" nowrap>".$row["BDAY"]."</td>";
                    echo "<td align=\"center\" width=\"10px\" nowrap> </td>";
                    echo "<td align=\"center\" nowrap>".$row["INN"]."</td>";
                    echo "<td align=\"center\" nowrap>".$row["LOGIN"]."</td>";
                    echo "<td align=\"center\" nowrap>".$row["PASSWORD"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
                $result->free();
            } else{
                echo "Ошибка: " . $conn->error;
            }
            $conn->close();
            ?>
        </div>
    </div>
</div>
</body>

</html>