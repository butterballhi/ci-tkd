<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('api', function($routes) {
    $routes->resource('kategori', ['controller' => 'Api\KategoriController']);
    $routes->resource('kuda-kuda', ['controller' => 'Api\KudaKudaController']);
    $routes->resource('tendangan', ['controller' => 'Api\TendanganController']);
    $routes->resource('pukulan', ['controller' => 'Api\PukulanController']);
    $routes->resource('tangkisan', ['controller' => 'Api\TangkisanController']);
    $routes->resource('poomsae', ['controller' => 'Api\PoomsaeController']);
    $routes->resource('kyorugi-info', ['controller' => 'Api\KyorugiInfoController']);
    $routes->resource('kelas-berat', ['controller' => 'Api\KelasBeratController']);
    $routes->resource('kyorugi-peralatan', ['controller' => 'Api\KyorugiPeralatanController']);
    $routes->resource('open-kyorugi-info', ['controller' => 'Api\OpenKyorugiInfoController']);
});