<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
      include_once("config.php");
      $id = $_GET["id"];
      $link = mysql_connect($hostAd, $userAd, $passwordAd) or die("Не удалось
        подключиться к MySQL" . mysql_error());
      mysql_select_db($dbAd, $link) or die("Не удалось
        подключиться к MySQL" . mysql_error());
      mysql_set_charset (utf8);
      $result = mysql_fetch_assoc(mysql_query ("SELECT * FROM ads  WHERE id
        = $id",$link));
      $name = $result["name"];
      $description = $result["description"];
      $sku = $result["sku"];
    ?>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <form class="" action="save.php?id=<?php
            echo $id;
          ?>" method="post">
            <div class="row">
              <div class="col-xs-2">
                <p>
                  <label for="">Наименование</label>
                </p>
              </div>
              <div class="col-xs-10">
                <p>
                  <input type="text" name="name" value="<?php
                    echo $name;
                  ?>">
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-2">
                <p>
                  <label for="">Артикулы</label>
                </p>
              </div>
              <div class="col-xs-10">
                <p>
                  <input type="text" name="sku" value="<?php
                    echo $sku;
                  ?>">
                  <i>вводить через запятую</i>
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-2">
                <label for="">
                  Текст объявления
                </label>
              </div>
              <div class="col-xs-10">
                <p>
                  <textarea name="description" rows="8" cols="40"><?php
                    echo nl2br($description);
                  ?></textarea>
                </p>
                <p>
                  <button type="submit" class="btn btn-default">
                    Сохранить
                  </button>
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
      mysql_close($link);
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
