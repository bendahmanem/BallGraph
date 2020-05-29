<?php

return [
    'homepage' => [
        'path' => '/',
        'method' => 'get',
        'action' => 'Index::index'
    ],


    'tp1-get' => [
        'path' => '/tp1',
        'method' => 'get',
        'action' => 'Tp1::getView'
    ],

    'tp1-renderData' => [
        'path' => '/tp1',
        'method' => 'post',
        'action' => 'Tp1::renderData'
    ],

    'tp2-get' => [
        'path' => '/tp2',
        'method' => 'get',
        'action' => 'Tp2::getView'
    ],

    'tp2-renderData' => [
        'path' => '/tp2',
        'method' => 'post',
        'action' => 'Tp2::renderData'
    ],

    'tp3-get' => [
        'path' => '/tp3',
        'method' => 'get',
        'action' => 'Tp3::getView'
    ],

    'tp3-renderData' => [
        'path' => '/tp3',
        'method' => 'post',
        'action' => 'Tp3::renderData'
    ],

    'tp4-get' => [
        'path' => '/tp4',
        'method' => 'get',
        'action' => 'Tp4::getView'
    ],

    'tp4-renderData' => [
        'path' => '/tp4',
        'method' => 'post',
        'action' => 'Tp4::renderData'
    ],
];