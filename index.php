<?php

/**
 * Функция для вывода массивов для дебага
 *
 * @param array $array Массив с данными для вывода
 * @return bool
 */
function debug($array) {
    echo '<pre style="background: #000; color: lightgreen; padding: 10px;">';
    print_r($array);
    echo '</pre>';
    die();
}

/**
 * Функция подключения конфигов
 * @param string $configName
 * @return array
 */
function getConfig($configName) {
    $result = [];
    $configStr = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . $configName . '.yml');
    if (!empty($configStr)) {
        $array = explode("\n", $configStr);
        foreach ($array as $value) {
            if ($value) {
                $parts = explode(":", $value);
                if ($parts[1]) {
                    $result[$parts[0]] = $parts[1];
                }
            }
        }

        $result = clear_data($result);
    }

    return $result;
}

/**
 * Функция очистки массива от кода
 *
 * @param array $array Массив с данными для очистки
 * @return array
 */
function clear_data($array) {
    foreach ($array as $key => $value) {
        $array[$key] = strip_tags(trim(addslashes($value)));
    }
    return $array;
}


ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');

$router = new Router();
$router->run();




