<?php
/**
 * Created by PhpStorm.
 * User: йцукенг
 * Date: 10.03.14
 * Time: 11:01
 */
$title = 'Сбалансированные деревья';
$image = '';
$text = file_get_contents('2.5.html');
$text .= '
<a href = "2.5.1.php">Идеально сбалансированные (оптимальные) деревья</a><br>
<a href = "2.5.2.php">АВЛ-деревья</a><br>
<a href = "2.5.3.php">Сбалансированные по весу деревья (ВВ-деревья)</a><br>
<a href = "2.5.4.php">Красно-черные деревья. Деревья промежутков</a><br>
<a href = "2.5.5.php">Расширяющиеся деревья</a><br>
<a href = "2.5.6.php">Выровненные деревья</a><br>
';
$text .='<a href = "../learn.php">Назад</a>';
require('../template/template_l.php');

