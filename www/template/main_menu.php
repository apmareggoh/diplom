<?php
/**
 * Created by PhpStorm.
 * User: йцукенг
 * Date: 10.03.14
 * Time: 11:55
 */
echo '<li><a href="/" ' . ( $url[1] ? '' : 'class="active"' ) . '>Главная</a></li>
          <li><a href="learn.php"' . ( $url[1] == 'learn' ? 'class="active"' : '' ) . '>Учебник</a></li>
          <li><a href="services.html"' . ( $url[1] == 'tren' ? 'class="active"' : '' ) . '>Тренажер</a></li>
          <li><a href="about.html"' . ( $url[1] == 'test' ? 'class="active"' : '' ) . '>Тест</a></li>
          <li><a href="contact.html"' . ( $url[1] == 'about' ? 'class="active"' : '' ) . '>Контакты</a></li>';