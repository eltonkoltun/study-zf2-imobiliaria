<?php

// ====================================================================================================================
// É inserido em todos os ambientes (desenvolvimento, staging, produção, etc.).
// ====================================================================================================================

define('APP_ID', 'noLoop_imobiliaria');
define('APP_NAME', 'No Loop - Imobiliaria');

define('APP_VERSION', '1.3.0');

return array(
    // ================================================================================================================
    // PHP (verificar se é realmente necessário - talvez a configuração no php.ini seja suficiente neste caso).
    // ================================================================================================================
    // 'phpSettings' => array(
    //     'date.timezone' => 'America/Sao_Paulo',
    // ),
    // ================================================================================================================
    // Configuração comum do doctrine.
    // ================================================================================================================
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'charset'  => 'utf8',
                ),
            ),
        ),
    ),
    // ================================================================================================================
    // Geração de cache para os templates (twig).
    // ================================================================================================================
    'zfctwig' => array(
        'environment_options' => array(
            'cache' => 'data/cache/templates',
            'auto_reload' => true
        ),
    ),
);
