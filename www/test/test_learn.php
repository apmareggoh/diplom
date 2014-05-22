<?
print_r($_POST);
echo '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Тест</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../template/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/template/js/cufon-yui.js"></script>
<script type="text/javascript" src="../template/js/arial.js"></script>
<script type="text/javascript" src="../template/js/cuf_run.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="/"><span>Бинарные</span>Деревья <small>БГТУ 2014 </small></a></h1>
      </div>
      <div class="menu">
        <ul>';
require('../template/main_menu.php');
echo '</ul>
      </div>
      <div class="clr"></div>
    </div>
    <div class="headert_text_resize">
      <div class="headert_text">
        <h2>Дипломная работа</h2>
        <p>Выполнена весной 2014 года на базе Брянского Государственного Технического Университета</p>
      </div>
      <img src="../template/images/img_main.jpg" alt="" width="455" height="273" />
      <div class="clr"></div>
    </div>
  </div>
  <div class="body">
    <div class="body_resize">
      <div class="left">
        <div class="resize_bg">';
$flag = 0;
@mysql_connect("localhost", "root");
@mysql_select_db("diplom") or die("ERROR");
mysql_query("SET NAMES `UTF8`");
if($_POST['id']){
  $sql2 = "select * from kosyaki";
  $rez2 = mysql_query($sql2);
  $flag = 0;
  if(mysql_num_rows($rez2)==1)$row2 = mysql_fetch_assoc($rez2);
  $sql = "select * from quests where id=".$_POST['id'];
  $rez = mysql_query($sql);
  if(mysql_num_rows($rez))$row = mysql_fetch_assoc($rez);
  if($_POST['tans1']!=1)$_POST['tans1']=0;
  if($_POST['tans2']!=1)$_POST['tans2']=0;
  if($_POST['tans3']!=1)$_POST['tans3']=0;
  if($_POST['tans4']!=1)$_POST['tans4']=0;
  echo $_POST['tans1']."-".$row['tans1']."=".$_POST['tans2']."-".$row['tans2']."=".$_POST['tans3']."-".$row['tans3']."=".$_POST['tans4']."-".$row['tans4'];
  if($_POST['tans1']==$row['tans1'] && $_POST['tans2']==$row['tans2'] && $_POST['tans3']==$row['tans3'] && $_POST['tans4']==$row['tans4']){
    // Ошибка
    mysql_query("UPDATE test SET koef".$row['group']."=koef".$row['group']."-0.3");
    $flag = 0;
    echo "0000000000000000000000000";
  }else{
    $flag = 1;
    echo "111111111111111111";
    ?>

    <?
  }
}
if($flag==0){
$sql2 = "select * from test where id=1";
$rez2 = mysql_query($sql2);
$row2 = mysql_fetch_assoc($rez2);
$a1 = explode(',',$row2['pack1']); // какие были??
$b[0]= $row2['bilo1']; // сколько было
$ok=0;
while(!$ok){
  $mr = 1; // тип теста
  $maximum = 3; // Сколько давать вопросов
  if($b[$mr-1]<$maximum){
    $ok=1; // проверка на количество вопросов из категории
    $sql4 = "UPDATE test SET bilo".$mr."=bilo".$mr."+1";
    if(!$flag)mysql_query($sql4);
  }
  if($b[0]>=$maximum){
    $c[0]= $row2['koef1'];
    $max=0;
    $itog=10;
    for($i=0;$i<1;$i++)
      if($c[$i]>$max){
        $max=$c[$i];
        $itog=$i+1;
      }
    $mr=$itog;
    $sql4 = "UPDATE test SET bilo".$mr."=bilo".$mr."+1";
    if(!$flag)mysql_query($sql4);
    $ok=1;
  }
}
if(($b[0])<$maximum){ // видимо количество вопросов по категориям
  switch($mr){
    case 1:$a=$a1;
      break;
    case 2:$a=$a2;
      break;
    case 3:$a=$a3;
      break;
    case 4:$a=$a4;
      break;
  }
  $i=0;
  $sql = "select * from quests where quests.group=".$mr;
  $rez = mysql_query($sql);
  if(mysql_num_rows($rez)>0){
    while($row = mysql_fetch_assoc($rez)){
      $el[$i]=$row; // все вопросы группы?
      $i++;
    }
    $kolvo = count($el); // количество вопросов?
    $kolvo2 = count($a); // количетсво уже пройденных?
    $new=0;
    $i=0;
    while($new==0){
      $random = rand(1,$kolvo); // выбираем вопрос
      $j=0;
      for($i=0;$i<$kolvo2;$i++) // Ищем в уже пройденных
        if ($el[$random-1]['id']==$a[$i])
          $j=1;
      if($j==0){// Если не найдено
        $new=1; // Конец
        if(!$flag) $sql3 = "UPDATE test SET pack".$mr."='".$row2["pack".$mr].",".$el[$random-1]['id']."',koef1=koef1+0.1,koef2=koef2+0.1,koef3=koef3+0.1,koef4=koef4+0.1";
        mysql_query($sql3);
      }
    }

//print_r($el);
  }

  ?>
  <?if($flag){$random = $_POST['id'];}?>
  <table style = "width: 968px;">
    <tr>
      <td colspan="4" style = "border-bottom: 1px solid black; text-align: center;">
        <?echo $el[$random-1]['quest']?>
      </td>
    </tr>
    <tr >
      <form method="post" action="/test/test_learn.php">
        <td style = "border-right: 1px dotted black; width: 24%; vertical-align: top;">
          <?echo $el[$random-1]['ans4']?>True:<input type="checkbox" name="tans4" value="1"/><br>
        </td><td style = "border-right: 1px dotted black; width: 24%; vertical-align: top;">
          <?echo $el[$random-1]['ans2']?> True:<input type="checkbox" name="tans2" value="1"/><br>
        </td><td style = "border-right: 1px dotted black; width: 24%; vertical-align: top;">
          <?echo $el[$random-1]['ans3']?> True:<input type="checkbox" name="tans3" value="1"/><br>
        </td><td style = "width: 24%; vertical-align: top;">
          <?echo $el[$random-1]['ans1']?> True:<input type="checkbox" name="tans1" value="1"/><br>
        </td></tr><tr><td>
        <input type=hidden name="id" value="<?echo $el[$random-1]['id']?>"/><br>
        <input type="Submit" name="submit" value="Следующий вопрос">
      </td></tr>
    </form>
    </tr>
  </table>
<?}


else {
  echo "<b>Ваш тест закончен.</b><br>";
  if($row2['koef1']<=2&&$row2['koef1']>=1.5)$number = 1;
  if($row2['koef1']<=3&&$row2['koef1']>2)$number = 2;
  if($row2['koef1']>3)$number = 3;
  if($mr == 1){
    $text[1]='У вас всё плохо с темой 1<br>';
    $text[2]='У вас всё средне с темой 1<br>';
    $text[3]='У вас всё хорошо с темой 1<br>';
  }

  echo $text[$number];
  $sql = "select * from kosyaki";
  $rez = mysql_query($sql);
  $row = mysql_fetch_assoc($rez);
  $kos = explode(',',$row['kosyak']);
  $num = count($kos);
  $v1=0;$v2=0;$v3=0;$v4=0;$v5=0;$v6=0;$v7=0;$v8=0;$v9=0;$v10=0;$v11=0;$v12=0;
}
}
else{
  ?>
  <table style = "width: 968px;">
    <tr>
      <td colspan="4" style = "border-bottom: 1px solid black; text-align: center;">
        <?echo $row['quest']?>
      </td>
    </tr>
    <tr >
      <form method="post" action="/test/test_learn.php">
        <td style = "border-right: 1px dotted black; width: 24%; vertical-align: top;">
          <?echo $row['ans4']?>True:<input type="checkbox" name="tans4" value="1"/><br>
        </td><td style = "border-right: 1px dotted black; width: 24%; vertical-align: top;">
          <?echo $row['ans2']?> True:<input type="checkbox" name="tans2" value="1"/><br>
        </td><td style = "border-right: 1px dotted black; width: 24%; vertical-align: top;">
          <?echo $row['ans3']?> True:<input type="checkbox" name="tans3" value="1"/><br>
        </td><td style = "width: 24%; vertical-align: top;">
          <?echo $row['ans1']?> True:<input type="checkbox" name="tans1" value="1"/><br>
        </td></tr><tr><td>
        <input type=hidden name="id" value="<?echo $row['id']?>"/><br>
        <input type="Submit" name="submit" value="Следующий вопрос">
      </td></tr>
    </form>
    </tr>
  </table>
<?
}

?>

<div class="clr"></div>
</div>
</div>
<div class="footer">
  <div class="footer_resize">
    <p class="lf">Copyright &copy; <a href="#">BSTU</a>. All Rights Reserved</p>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
</div>
</div>
</body>
</html>