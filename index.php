<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/helpers/ViewHelper.php';
require "init.php";


$url = [isset($_GET['url']) ? $_GET['url'] : ''];
$smerovac = new SmerovacKontroler();
$smerovac->zpracuj($url);
$smerovac->vypisPohled();