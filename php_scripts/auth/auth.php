<?php

// Данный файл всегда будит "включаться" в другие файлы
// директивой include поэтому следует запретить его самостоятельный вызов
// из строки запроса путём указания его имени
// Если не определена константа IN_ADMIN – завершаем работу скрипта
//if(!defined("IN_ADMIN")) die;

// Начинаем сессию
session_start();
// Помещаем содержимое файла в массив
$access = array();
$access = file("access.php");
// Разносим значения по переменным – пропуская первую строку файла - 0
$login = trim($access[1]);
$passw = trim($access[2]);

//$enter = $_POST['enter'];

echo "$enter";
// Проверям были ли посланы данные
if(!empty($_POST['enter']))
{
        $_SESSION['login'] = (md5($_POST['login']));
        $_SESSION['passw'] = (md5($_POST['passw']));
}

// Если ввода не было, или они не верны
// просим их ввести
if(empty($_SESSION['login']) or empty($_SESSION['passw']) or $login != $_SESSION['login'] or $passw != $_SESSION['passw'])
{
  header('Location: ../../inside.php');
  exit;
}

$_SESSION['access'] = "yes";
// Иначе если все в порядке перенаправляем в админ панель
header('Location: ../../admin.php');
exit;

?>