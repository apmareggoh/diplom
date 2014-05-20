<html>
<body>
<div style = "margin: 0 auto;width:1000px;border:2px solid black;padding:10px;">
<?
@mysql_connect("localhost", "root");
@mysql_select_db("diplom") or die("ERROR");
mysql_query("SET NAMES `UTF8`");
if($_POST['id']){
$sql2 = "select * from kosyaki";
$rez2 = mysql_query($sql2);
if(mysql_num_rows($rez2)==1)$row2 = mysql_fetch_assoc($rez2);
$sql = "select * from quests where id=".$_POST['id'];
$rez = mysql_query($sql);
if(mysql_num_rows($rez)==1)$row = mysql_fetch_assoc($rez);
if($_POST['tans1']!=1)$_POST['tans1']=0;
if($_POST['tans2']!=1)$_POST['tans2']=0;
if($_POST['tans3']!=1)$_POST['tans3']=0;
if($_POST['tans4']!=1)$_POST['tans4']=0;
if($_POST['tans1']==$row['tans1'] && $_POST['tans2']==$row['tans2'] && $_POST['tans3']==$row['tans3'] && $_POST['tans4']==$row['tans4']){
	mysql_query("UPDATE test SET koef".$row['group']."=koef".$row['group']."-0.3");
	}else{
	mysql_query("UPDATE test SET koef".$row['group']."=koef".$row['group']."+0.2");
	mysql_query("UPDATE kosyaki SET kosyak='".$row2['kosyak'].",".$_POST['id']."'");
	}
}
$sql2 = "select * from test where id=1";
$rez2 = mysql_query($sql2);
$row2 = mysql_fetch_assoc($rez2);
$a1 = explode(',',$row2['pack1']);
$a2 = explode(',',$row2['pack2']);
$a3 = explode(',',$row2['pack3']);
$a4 = explode(',',$row2['pack4']);
$b[0]= $row2['bilo1'];
$b[1]= $row2['bilo2'];
$b[2]= $row2['bilo3'];
$b[3]= $row2['bilo4'];
$ok=0;
while(!$ok){
$mr = rand(1,4); // рандом на тип вопроса
if($b[$mr-1]<4){$ok=1; // проверка на количество вопросов из категории
$sql4 = "UPDATE test SET bilo".$mr."=bilo".$mr."+1";
mysql_query($sql4);
}
if($b[0]>=4 && $b[1]>=4 && $b[2]>=4 && $b[3]>=4){
$c[0]= $row2['koef1'];
$c[1]= $row2['koef2'];
$c[2]= $row2['koef3'];
$c[3]= $row2['koef4'];
$max=0;
$itog=10;
for($i=0;$i<4;$i++)
if($c[$i]>$max){$max=$c[$i];$itog=$i+1;}
$mr=$itog;
$sql4 = "UPDATE test SET bilo".$mr."=bilo".$mr."+1";
mysql_query($sql4);
$ok=1;
}
}
if(($b[0]+$b[1]+$b[2]+$b[3])<20){ // видимо количество вопросов по категориям
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
	$el[$i]=$row;
	$i++;
}
$kolvo = count($el);
$kolvo2 = count($a);
$new=0;
$i=0;
while($new==0){
$random = rand(1,$kolvo);
$j=0;
for($i=0;$i<$kolvo2;$i++)
	if ($el[$random-1]['id']==$a[$i])$j=1;
if($j==0){
$new=1;
$sql3 = "UPDATE test SET pack".$mr."='".$row2["pack".$mr].",".$el[$random-1]['id']."',koef1=koef1+0.1,koef2=koef2+0.1,koef3=koef3+0.1,koef4=koef4+0.1";
mysql_query($sql3);
}
}

//print_r($el);
}

?>
<table style = "width: 968px;">
  <tr>
    <td colspan="4" style = "border-bottom: 1px solid black;">
   <?echo $el[$random-1]['quest']?>
    </td>
  </tr>
  <tr >
  <form method="post" action="/test/test.php">
    <td style = "border-right: 1px dotted black;">
<?echo $el[$random-1]['ans4']?><input type="checkbox" name="tans4" value="1"/><br>
    </td><td style = "border-right: 1px dotted black;">
<?echo $el[$random-1]['ans2']?> True:<input type="checkbox" name="tans2" value="1"/><br>
    </td><td style = "border-right: 1px dotted black;">
<?echo $el[$random-1]['ans3']?> True:<input type="checkbox" name="tans3" value="1"/><br>
    </td><td>
<?echo $el[$random-1]['ans1']?> True:<input type="checkbox" name="tans1" value="1"/><br>
    </td></tr><tr><td>
<input type=hidden name="id" value="<?echo $el[$random-1]['id']?>"/><br>
<input type="Submit" name="submit" value="Next quest">
  </td></tr>
</form>
  </tr>
</table>
<?
}else {
echo "<b>Ваш тест закончен.</b><br>";
if($row2['koef1']<=2&&$row2['koef1']>=1.5)echo "Вы гуру в общих сведениях о деревьях. Поставьте оценку преподавателю.<br>";
if($row2['koef1']<=3&&$row2['koef1']>2)echo "Вы неплохо разбираетесь в общих сведениях о деревьях. Давайте вашу зачетку.<br>";
if($row2['koef1']>3)echo "Наверно, когда преподавали общие сведения о деревьях, Вы были в запое. Проспитесь и пройдите заново.<br>";
if($row2['koef2']<=2&&$row2['koef2']>=1.5)echo "Во всём, что касается бинарных деревьев, Вы совершенны.<br>";
if($row2['koef2']<=3&&$row2['koef2']>2)echo "Скайнет вами доволен. Бинарные деревья вы неплохо изучили.<br>";
if($row2['koef2']>3)echo "Странно, но с бинарными деревьями не сложилось. До свидания.<br>";
if($row2['koef3']<=2&&$row2['koef3']>=1.5)echo "n-арные деревья поклоняются Вам. Вы их Йода.<br>";
if($row2['koef3']<=3&&$row2['koef3']>2)echo "Докопаться можно, но ладно. n-арные деревья приняты.<br>";
if($row2['koef3']>3)echo "Фигня. n-арные деревья от вас убежавли и уже не вернуться. Пересдача.<br>";
if($row2['koef4']<=2&&$row2['koef4']>=1.5)echo "Сильноветвящие деревья - ваща страсть. Вы круты!<br>";
if($row2['koef4']<=3&&$row2['koef4']>2)echo "Сильноветвящие деревья ставят вам зачод.<br>";
if($row2['koef4']>3)echo "Астрологи объявили неделю перезачета. Количество вопросов по сильноветвящим деревьям увеличено вдвое.<br>";
$sql = "select * from kosyaki";
$rez = mysql_query($sql);
$row = mysql_fetch_assoc($rez);
$kos = explode(',',$row['kosyak']);
$num = count($kos);
$v1=0;$v2=0;$v3=0;$v4=0;$v5=0;$v6=0;$v7=0;$v8=0;$v9=0;$v10=0;$v11=0;$v12=0;
	echo "<b>Ваши косяки :</b> <br>";
for($i=1;$i<$num;$i++){
	$sql2 = "select * from quests where quests.id=".$kos[$i];
	$rez2 = mysql_query($sql2);
	$row2 = mysql_fetch_assoc($rez2);
	if($row2['podgroup']==1)if($v1==0){echo "Почитайте основную теорию по деревьям<br>";$v1=1;}
	if($row2['podgroup']==2)if($v2==0){echo "Обратите внимание на общие сведения о бинартых деревьях<br>";$v2=1;}
	if($row2['podgroup']==3)if($v3==0){echo "Изучите префиксные коды.<br>";$v3=1;}
	if($row2['podgroup']==4)if($v4==0){echo "Вы ошибались в обходах бинарных деревьев.<br>";$v4=1;}
	if($row2['podgroup']==5)if($v5==0){echo "Прошивку надо подучить.<br>";$v5=1;}
	if($row2['podgroup']==6)if($v6==0){echo "Надо больше внимания уделять высотам деревьев.<br>";$v6=1;}
	if($row2['podgroup']==7)if($v7==0){echo "Освежите в памяти АВЛ-деревья<br>";$v7=1;}
	if($row2['podgroup']==8)if($v8==0){echo "Я знаю, что существуют деревья Фибоначчи. А Вы?<br>";$v8=1;}
	if($row2['podgroup']==9)if($v9==0){echo "BB деревья - не Ваш конек.<br>";$v9=1;}
	if($row2['podgroup']==10)if($v10==0){echo "Общие данные о n-арных деревьях страдают<br>";$v10=1;}
	if($row2['podgroup']==11)if($v11==0){echo "Общие данные о сильноветвящихся деревьях, видимо, из Вашей головы выдул ветер.<br>";$v11=1;}
	if($row2['podgroup']==12)if($v12==0){echo "2-3 деревья стоит изучать основательнее.<br>";$v12=1;}
	}
}
?>
</div>
</body>
</html>