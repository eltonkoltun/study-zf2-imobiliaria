<?php

// ====================================================================================================================
// Usuários
// ====================================================================================================================

return array(
    // ================================================================================================================
    // ACL
    // ================================================================================================================
    'acl' => array(
        'master, admin' => array(
            'usuarios.controller.usuarios',
        ),
    ),
    // ================================================================================================================
    // Controllers
    // ================================================================================================================
    'controllers' => array(
        'invokables' => array(
            'usuarios.controller.login' => 'Usuarios\Controller\LoginController',
            'usuarios.controller.usuarios' => 'Usuarios\Controller\UsuariosController',
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
                    'Usuarios\Entity' => __NAMESPACE__ . '_entities'
                ),
            ),
        ),
    ),
    // ================================================================================================================
    // Navigation
    // ================================================================================================================
    'navigation' => array(
        'default' => array(
            'usuarios' => array(
                'label' => 'Usuários',
                'type' => 'uri',
                'order' => 10,
                'pages' => array(
                    'usuarios' => array(
                        'label' => 'Usuários',
                        'route' => 'usuarios',
                        'resource' => 'usuarios.controller.usuarios',
                        'pages' => array(
                            'form' => array(
                                'visible' => false,
                                'route' => 'usuarios|form',
                            ),
                        ),
                    ),
                ),
            ),
            'logout' => array(
                'label' => 'Sair',
                'route' => 'logout',
                'order' => 999,
            ),
        ),
    ),
    // ================================================================================================================
    // Router
    // ================================================================================================================
    'router' => array(
        'routes' => array(
            /*
             * LOGIN / LOGOUT
             */
            'login' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'usuarios.controller.login',
                        'action' => 'login',
                    ),
                ),
            ),
            'logout' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/logout',
                    'defaults' => array(
                        'controller' => 'usuarios.controller.login',
                        'action' => 'logout',
                    ),
                ),
            ),
            /*
             * USUARIOS
             */
            'usuarios' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/usuarios[/:pagina]',
                    'constraints' => array(
                        'pagina' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'usuarios.controller.usuarios',
                        'action' => 'index',
                    ),
                ),
            ),
            'usuarios|form' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/usuarios/form[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'usuarios.controller.usuarios',
                        'action' => 'form',
                    ),
                ),
            ),
            'usuarios|excluir' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/usuarios/excluir[/:id]',
                    'defaults' => array(
                        'controller' => 'usuarios.controller.usuarios',
                        'action' => 'excluir',
                    ),
                ),
            ),
            'usuarios|visivel' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/usuarios/visivel[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'usuarios.controller.usuarios',
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
            'usuarios.form.login' => 'Usuarios\Form\LoginForm',
            'usuarios.form.usuario' => 'Usuarios\Form\UsuarioForm',
            'usuarios.form.usuario_search' => 'Usuarios\Form\UsuarioSearchForm',
//            'usuarios.mailer.usuarios' => 'Usuarios\Mailer\UsuariosMailer',
            'usuarios.service.usuarios' => 'Usuarios\Service\UsuariosService',
            'usuarios.session.usuarios' => 'Usuarios\Session\UsuariosSession',
        ),
    ),
    // ================================================================================================================
    // View helpers
    // ================================================================================================================
    'view_helpers' => array(
        'invokables' => array(
            'nomeUsuarioLogado' => 'Usuarios\View\Helper\NomeUsuarioLogado',
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
            'usuarios/login/login' => __DIR__ . '/../view/controller/login/login.twig',
            // USUARIOS
            'usuarios/usuarios/index' => __DIR__ . '/../view/controller/usuarios/index.twig',
            'usuarios/usuarios/form' => __DIR__ . '/../view/controller/usuarios/form.twig',
        ),
    ),
);
