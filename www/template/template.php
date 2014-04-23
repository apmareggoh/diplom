<? echo '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>GreenyBox</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="/template/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/template/js/cufon-yui.js"></script>
<script type="text/javascript" src="/template/js/arial.js"></script>
<script type="text/javascript" src="/template/js/cuf_run.js"></script>
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
require('template/main_menu.php');
echo '</ul>
      </div>
      <div class="clr"></div>
    </div>
    <div class="headert_text_resize">
      <div class="headert_text">
        <h2>Дипломная работа</h2>
        <p>Выполнена весной 2014 года на базе Брянского Государственного Технического Университета</p>
      </div>
      <img src="/template/images/img_main.jpg" alt="" width="455" height="273" />
      <div class="clr"></div>
    </div>
  </div>
  <div class="body">
    <div class="body_resize">
      <div class="left">
      <input type = "submit" id = "addElement" onclick = "addElement(0)" value = "Добавить узел" style = "display:none;"/>
      <div style = "display: inline-block;background:white;height:150px;">
      <div id = "panelForm" style = "margin-left:1px;width:289px;float:left;border:1px solid #97c950;height: 100%;padding:5px;height: 140px;">
        <input type="radio" onclick="usersClick()" value=""/>Пошаговое построение дерева<br>
        <input type="radio" onclick="avtomaticTree()" />Автоматическое построение дерева<br>
        <input type="radio" onclick = "optima()"/>Оптимизированное построение дерева<br>
      </div>
      <div id = "text" style = "width:654px;float:right;border:1px solid #11ff50;height: 140px;padding:5px;"></div>
      </div>
        <div class="resize_bg">
        <div id = "svg" style = "background-image: url(\'/template/images/background.svg\');background-repeat: no-repeat;\">
</div>';

if ($title) {
    echo '<h2>' . $title . '</h2>';
}
if ($image) {
    echo '<img alt="" width="455" height="273" scr = "' . $image . '"/>';
}
if ($text) {
    echo $text;
}
echo '

        </div>
      </div>
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
</html>';