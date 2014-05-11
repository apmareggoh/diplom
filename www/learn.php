<?php
/**
 * Created by PhpStorm.
 * User: йцукенг
 * Date: 10.03.14
 * Time: 11:01
 */
$title = 'Бинарные деревья';
$image = '';
$text = file_get_contents('learn/2.html');
$text .= '
<a href = "learn/2.1.php">Представление бинарных деревьев</a><br>
<a href = "learn/2.2.php">Операции обхода и редактирования бинарных деревьев</a><br>
<a href = "learn/2.3.php">Прошитые деревья</a><br>
<a href = "learn/2.4.php">Преобразование упорядоченного дерева в двоичное дерево</a><br>
<a href = "learn/2.5.php">Сбалансированные деревья</a><br>
<a href = "learn/2.6.php">Приложения бинарных деревьев</a><br>
';
require('template/template_l_main.php');

