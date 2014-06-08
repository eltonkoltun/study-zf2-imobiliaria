<?php

// ====================================================================================================================
// Filtros
// ====================================================================================================================

return array(
    // ================================================================================================================
    // ACL
    // ================================================================================================================
    'acl' => array(
        'master, admin, super' => array(
            'filtros.controller.filtros',
        ),
    ),
    // ================================================================================================================
    // Controllers
    // ================================================================================================================
    'controllers' => array(
        'invokables' => array(
            'filtros.controller.filtros' => 'Filtros\Controller\FiltrosController',
        ),
    ),
    // ================================================================================================================
    // Doctrine
    // ================================================================================================================
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Entity'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Filtros\Entity' => __NAMESPACE__ . '_entities'
                ),
            ),
        ),
    ),
    // ================================================================================================================
    // Navigation
    // ================================================================================================================
    'navigation' => array(
        'default' => array(
            'filtros' => array(
                'label' => 'Filtros',
                'type' => 'uri',
                'order' => 900,
                'pages' => array(
                    'filtros' => array(
                        'label' => 'Filtros',
                        'route' => 'filtros',
                        'resource' => 'filtros.controller.filtros',
                        'pages' => array(
                            'form' => array(
                                'visible' => false,
                                'route' => 'filtros|form',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    // ================================================================================================================
    // Router
    // ================================================================================================================
    'router' => array(
        'routes' => array(
            /*
             * FILTROS
             */
            'filtros' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/filtros[/:pagina]',
                    'constraints' => array(
                        'pagina' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'filtros.controller.filtros',
                        'action' => 'index',
                    ),
                ),
            ),
            'filtros|form' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/filtros/form[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'filtros.controller.filtros',
                        'action' => 'form',
                    ),
                ),
            ),
            'filtros|excluir' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/filtros/excluir[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'filtros.controller.filtros',
                        'action' => 'excluir',
                    ),
                ),
            ),
            'filtros|visivel' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/filtros/visivel[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'filtros.controller.filtros',
                        'action' => 'visivel',
                    ),
                ),
            ),
        ),
    ),
    // ================================================================================================================
    // Service manager
    // ================================================================================================================
    'service_manager' => array(
        // ------------------------------------------------------------------------------------------------------------
        // invokables
        // ------------------------------------------------------------------------------------------------------------
        'invokables' => array(
            'filtros.form.filtro' => 'Filtros\Form\FiltroForm',
            'filtros.form.filtro_search' => 'Filtros\Form\FiltroSearchForm',
            'filtros.service.filtros' => 'Filtros\Service\FiltrosService',
        ),
    ),
    // ================================================================================================================
    // View manager
    // ================================================================================================================
    'view_manager' => array(
        // ------------------------------------------------------------------------------------------------------------
        // template map (localização das views dos controller, helpers e widgets)
        // ------------------------------------------------------------------------------------------------------------
        'template_map' => array(
            // Filtros
            'filtros/filtros/index' => __DIR__ . '/../view/controller/filtros/index.twig',
            'filtros/filtros/form' => __DIR__ . '/../view/controller/filtros/form.twig',
        ),
    ),
);
