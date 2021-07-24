<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>DB Test</title>
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
	.double-border-button {
  width: 140px;
  text-decoration: none;
  display: inline-block;
  margin: 10px 20px;
  padding: 10px 30px;
  position: relative;
  border: 2px solid #f1c40f;
  color: #f1c40f;
  font-family: 'Montserrat', sans-serif;
  transition: .4s;
}
.double-border-button:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  margin: auto;
  border: 2px solid rgba(0, 0, 0, 0);
  transition: .4s;
}
.double-border-button:hover:after {
  border-color: #f1c40f;
  width: calc(100% - 15px);
  height: calc(100% + 15px);
}
    </style>
</head>

<body>
<div class='outer'>
    <div class='middle'>
        <div class='inner' align="center">
            <a href="index.php" class="double-border-button">Menu</a><a href="memcached_save-f.php" class="double-border-button">Save.txt</a>
        </div>
        <div class='inner' align="center">
            <?php

            $mem = new Memcached();
            $mem->addServer("127.0.0.1", 11211);
            $vRevision = date("Y-m-d_H-i-s");
            echo "<h3> Memcached -> search_24h</h3><p>---------------------------------------------</p>";
            foreach ($mem->getAllKeys() as $s){
                echo $s." => ".$mem->get($s)."; <br>";
            }

            ?>
        </div>
    </div>
</div>
</body>

</html>

