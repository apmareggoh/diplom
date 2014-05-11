<?php
/**
 * Created by PhpStorm.
 * User: йцукенг
 * Date: 10.03.14
 * Time: 11:01
 */
$title = 'Представление бинарных деревьев';
$image = '';
$text = file_get_contents('2.1.html');
$text .= '
<a href = "2.1.1.php">Представление бинарных деревьев с помощью массивов</a><br>
<a href = "2.1.2.php">Биномиальная куча</a><br>
<a href = "2.1.3.php">Представление бинарных деревьев с помощью списков</a><br>
';
$text .='<a href = "../learn.php">Назад</a>';
require('../template/template_l.php');

