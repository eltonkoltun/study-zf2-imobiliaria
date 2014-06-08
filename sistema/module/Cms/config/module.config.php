<?php

// ====================================================================================================================
// Usuários
// ====================================================================================================================

return array(
    // ================================================================================================================
    // ACL
    // ================================================================================================================
    'acl' => array(
        'master, admin, super' => array(
            'cms.controller.cms',
        ),
    ),
    // ================================================================================================================
    // Controllers
    // ================================================================================================================
    'controllers' => array(
        'invokables' => array(
            'cms.controller.cms' => 'Cms\Controller\CmsController',
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
                    'Cms\Entity' => __NAMESPACE__ . '_entities'
                ),
            ),
        ),
    ),
    // ================================================================================================================
    // Navigation
    // ================================================================================================================
    'navigation' => array(
        'default' => array(
            'cms' => array(
                'label' => 'Páginas Editáveis',
                'type' => 'uri',
                'order' => 900,
                'pages' => array(
                    'cms' => array(
                        'label' => 'Páginas Editáveis',
                        'route' => 'cms',
                        'resource' => 'cms.controller.cms',
                        'pages' => array(
                            'form' => array(
                                'visible' => false,
                                'route' => 'cms|form',
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
             * CMS
             */
            'cms' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/cms[/:pagina]',
                    'constraints' => array(
                        'pagina' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'cms.controller.cms',
                        'action' => 'index',
                    ),
                ),
            ),
            'cms|form' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/cms/form[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'cms.controller.cms',
                        'action' => 'form',
                    ),
                ),
            ),
            'cms|excluir' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/cms/excluir[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'cms.controller.cms',
                        'action' => 'excluir',
                    ),
                ),
            ),
            'cms|visivel' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/cms/visivel[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'cms.controller.cms',
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
            'cms.form.cms' => 'Cms\Form\CmsForm',
            'cms.form.cms_search' => 'Cms\Form\CmsSearchForm',
            'cms.service.cms' => 'Cms\Service\CmsService',
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
            // CMS
            'cms/cms/index' => __DIR__ . '/../view/controller/cms/index.twig',
            'cms/cms/form' => __DIR__ . '/../view/controller/cms/form.twig',
        ),
    ),
);
