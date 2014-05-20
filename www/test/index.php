<html>
<body>
<?php
@mysql_connect( "localhost", "root" );
@mysql_select_db( "diplom" ) or die( "hui" );
$sql = "UPDATE test SET kosyak=0,pack1='0',pack2='0',pack3='0',pack4='0',bilo1='0',bilo2='0',bilo3='0',bilo4='0',koef1='1',koef2='1',koef3='1',koef4='1'";
mysql_query( $sql );
if ( $_POST['quest'] ) {
  $quest = $_POST['quest'];
  $ans1 = $_POST['ans1'];
  $ans2 = $_POST['ans2'];
  $ans3 = $_POST['ans3'];
  $ans4 = $_POST['ans4'];

  if ( $_POST['tans1'] ) {
    $tans1 = $_POST['tans1'];
  } else {
    $tans1 = 0;
  }
  if ( $_POST['tans2'] ) {
    $tans2 = $_POST['tans2'];
  } else {
    $tans2 = 0;
  }
  if ( $_POST['tans3'] ) {
    $tans3 = $_POST['tans3'];
  } else {
    $tans3 = 0;
  }
  if ( $_POST['tans4'] ) {
    $tans4 = $_POST['tans4'];
  } else {
    $tans4 = 0;
  }
  $group = $_POST['group'];
  $podgroup = $_POST['podgroup'];
  if ( $tans1 != 0 || $tans2 != 0 || $tans3 != 0 || $tans4 != 0 ) {
    $sql = "INSERT INTO quests(quest,ans1,ans2,ans3,ans4,tans1,tans2,tans3,tans4,quests.group,quests.podgroup)
VALUES('{$quest}','{$ans1}','{$ans2}','{$ans3}','{$ans4}','{$tans1}','{$tans2}','{$tans3}','{$tans4}','{$group}','{$podgroup}')
";

    $result = mysql_query( $sql );
    $id = mysql_insert_id();

    if ( is_uploaded_file( $_FILES["file1"]["tmp_name"] ) ) {
      $ext = substr( $_FILES["file1"]["name"], strpos( $_FILES["file1"]["name"], '.' ), strlen( $_FILES["file1"]["name"] ) - 1 );
      $xxx = time() . "1" . $ext;
      move_uploaded_file( $_FILES['file1']['tmp_name'], "../upload/" . $xxx );
      $query = "insert into `files` (`object`,`url`) values(" . $id . ",'" . $xxx . "')";
      mysql_query( $query );
      $ans1 .= '<br><img src="/upload/' . $xxx . '"/>';
    }
    if ( is_uploaded_file( $_FILES["file2"]["tmp_name"] ) ) {
      $ext = substr( $_FILES["file2"]["name"], strpos( $_FILES["file2"]["name"], '.' ), strlen( $_FILES["file2"]["name"] ) - 1 );
      $xxx = time() . "2" . $ext;
      move_uploaded_file( $_FILES['file2']['tmp_name'], "../upload/" . $xxx );
      $query = "insert into `files` (`object`,`url`) values(" . $id . ",'" . $xxx . "')";
      mysql_query( $query );
      $ans2 .= '<br><img src="/upload/' . $xxx . '"/>';
    }
    if ( is_uploaded_file( $_FILES["file3"]["tmp_name"] ) ) {
      $ext = substr( $_FILES["file3"]["name"], strpos( $_FILES["file3"]["name"], '.' ), strlen( $_FILES["file3"]["name"] ) - 1 );
      $xxx = time() . "3" . $ext;
      move_uploaded_file( $_FILES['file3']['tmp_name'], "../upload/" . $xxx );
      $query = "insert into `files` (`object`,`url`) values(" . $id . ",'" . $xxx . "')";
      mysql_query( $query );
      $ans3 .= '<br><img src="/upload/' . $xxx . '"/>';
    }
    if ( is_uploaded_file( $_FILES["file4"]["tmp_name"] ) ) {
      $ext = substr( $_FILES["file4"]["name"], strpos( $_FILES["file4"]["name"], '.' ), strlen( $_FILES["file4"]["name"] ) - 1 );
      $xxx = time() . "4" . $ext;
      move_uploaded_file( $_FILES['file4']['tmp_name'], "../upload/" . $xxx );
      $query = "insert into `files` (`object`,`url`) values(" . $id . ",'" . $xxx . "')";
      mysql_query( $query );
      $ans4 .= '<br><img src="/upload/' . $xxx . '"/>';
    }

    $sql = "update quests set ans1 = '" . $ans1 . "', ans2 = '" . $ans2 . "', ans3 = '" . $ans3 . "', ans4 = '" . $ans4 . "' where `id`=" . $id;
    echo htmlspecialchars($sql);
    mysql_query( $sql );

  } else echo "<h1>ERROR! Question must have 1 true answer!</h1>";
} else echo "<h1>ERROR! Question must have question!!!</h1>";
?>

<form method="post" action="/test/" enctype="multipart/form-data">
  <input type="Text" name="quest" value=""><br>
  <input type="Text" name="ans1" value="">True:<input type="checkbox" name="tans1" value="1"/><input type="file"
                                                                                                             name="file1"
                                                                                                             value=""><br>
  <input type="Text" name="ans2" value="">True:<input type="checkbox" name="tans2" value="1"/><input type="file"
                                                                                                             name="file2"
                                                                                                             value=""><br>
  <input type="Text" name="ans3" value="">True:<input type="checkbox" name="tans3" value="1"/><input type="file"
                                                                                                             name="file3"
                                                                                                             value=""><br>
  <input type="Text" name="ans4" value="">True:<input type="checkbox" name="tans4" value="1"/><input type="file"
                                                                                                             name="file4"
                                                                                                             value=""><br>
  Group:<input type="Text" name="group" value=""><br>
  Podgroup:<input type="Text" name="podgroup" value=""><br>
  <input type="Submit" name="submit" value="Insert this NOW!">
</form>
<a href="test.php">test me plz</a>
</body>
</html>