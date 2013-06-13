<?php
require_once 'vendor/serbanghita/Mobile-Detect/Mobile_Detect.php';
require_once 'vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();


$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$scriptVersion = $detect->getScriptVersion();


$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    #'cache' => 'compilation_cache',
));

$parse_url = parse_url($_SERVER['REQUEST_URI']);
$path = $parse_url['path'];
$querystring =  isset($parse_url['query']) ? $parse_url['query'] : '' ;


switch ($path) {
  case '/goal':
    if ($querystring != 'goal') {
      //redirect to homepage
      header("Location: \ ");
    } else {
      print $twig->render('goal.tmpl', array());
    }
    break;
  default:
    print $twig->render('index.tmpl', array());
    break;
}

