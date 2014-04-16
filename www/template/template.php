<? echo '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>GreenyBox</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="/template/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/template/js/cufon-yui.js"></script>
<script type="text/javascript" src="/template/js/arial.js"></script>
<script type="text/javascript" src="/template/js/cuf_run.js"></script>
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
      <input type = "submit" onclick = "addElement()" value = "Добавить узел"/>
      <div id = "text"></div>
        <div class="resize_bg">
        <div id = "svg">
</div>';

if ( $title ) {
  echo '<h2>' . $title . '</h2>';
}
if ( $image ) {
  echo '<img alt="" width="455" height="273" scr = "' . $image . '"/>';
}
if ( $text ) {
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