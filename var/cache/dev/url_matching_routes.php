<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/acciones-extranet/lista' => [[['_route' => 'usuarios_extranet', '_controller' => 'App\\Controller\\AccionesExtranetController::listaUsuariosExtranet'], null, null, null, false, false, null]],
        '/dashboard/change/password' => [[['_route' => 'change_password', '_controller' => 'App\\Controller\\ChangePasswordController::index'], null, null, null, false, false, null]],
        '/dashboard' => [[['_route' => 'dashboard', '_controller' => 'App\\Controller\\DashboardController::index'], null, null, null, false, false, null]],
        '/testflash' => [[['_route' => 'testflash', '_controller' => 'App\\Controller\\DashboardController::testflash'], null, null, null, false, false, null]],
        '/menu' => [[['_route' => 'menu', '_controller' => 'App\\Controller\\MenuController::index'], null, null, null, false, false, null]],
        '/nacionalidad' => [[['_route' => 'nacionalidad_index', '_controller' => 'App\\Controller\\NacionalidadController::index'], null, ['GET' => 0], null, true, false, null]],
        '/nacionalidad/new' => [[['_route' => 'nacionalidad_new', '_controller' => 'App\\Controller\\NacionalidadController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/oauth/login' => [[['_route' => 'oauth_login', '_controller' => 'App\\Controller\\OAuthController::index'], null, null, null, false, false, null]],
        '/oauth/logout' => [[['_route' => 'oauth_logout', '_controller' => 'App\\Controller\\OAuthController::logout'], null, ['GET' => 0], null, false, false, null]],
        '/oauth/callback' => [[['_route' => 'oauth_check', '_controller' => 'App\\Controller\\OAuthController::check'], null, null, null, false, false, null]],
        '/pruebas-de-inputs' => [[['_route' => 'prueba', '_controller' => 'App\\Controller\\PruebaController::index'], null, null, null, false, false, null]],
        '/sexo' => [[['_route' => 'sexo_index', '_controller' => 'App\\Controller\\SexoController::index'], null, ['GET' => 0], null, true, false, null]],
        '/sexo/new' => [[['_route' => 'sexo_new', '_controller' => 'App\\Controller\\SexoController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/dashboard/nueva-solicitud' => [[['_route' => 'nueva-solicitud', '_controller' => 'App\\Controller\\SolicitudController::nuevaSolicitud'], null, null, null, false, false, null]],
        '/dashboard/solicitudes' => [[['_route' => 'solicitudes', '_controller' => 'App\\Controller\\SolicitudController::solicitudes'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\DashboardController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|wdt/([^/]++)(*:24)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:69)'
                            .'|router(*:82)'
                            .'|exception(?'
                                .'|(*:101)'
                                .'|\\.css(*:114)'
                            .')'
                        .')'
                        .'|(*:124)'
                    .')'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:159)'
                .')'
                .'|/acciones\\-extranet/([^/]++)/(?'
                    .'|deshabilitar\\-usuario(*:221)'
                    .'|rehabilitar\\-usuario(*:249)'
                    .'|blanquear\\-password(*:276)'
                .')'
                .'|/nacionalidad/([^/]++)(?'
                    .'|(*:310)'
                    .'|/edit(*:323)'
                    .'|(*:331)'
                .')'
                .'|/s(?'
                    .'|exo/([^/]++)(?'
                        .'|(*:360)'
                        .'|/edit(*:373)'
                        .'|(*:381)'
                    .')'
                    .'|olicitud/([^/]++)/ver(*:411)'
                .')'
                .'|/dashboard/solicitud/([^/]++)/aceptada(*:458)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        24 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        69 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        82 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        101 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        114 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        124 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        159 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        221 => [[['_route' => 'deshabilitar_usuario', '_controller' => 'App\\Controller\\AccionesExtranetController::disableUser'], ['id'], null, null, false, false, null]],
        249 => [[['_route' => 'rehabilitar_usuario', '_controller' => 'App\\Controller\\AccionesExtranetController::reactivateUser'], ['id'], null, null, false, false, null]],
        276 => [[['_route' => 'blanquear_password_usuario', '_controller' => 'App\\Controller\\AccionesExtranetController::blanquearPassword'], ['id'], null, null, false, false, null]],
        310 => [[['_route' => 'nacionalidad_show', '_controller' => 'App\\Controller\\NacionalidadController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        323 => [[['_route' => 'nacionalidad_edit', '_controller' => 'App\\Controller\\NacionalidadController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        331 => [[['_route' => 'nacionalidad_delete', '_controller' => 'App\\Controller\\NacionalidadController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        360 => [[['_route' => 'sexo_show', '_controller' => 'App\\Controller\\SexoController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        373 => [[['_route' => 'sexo_edit', '_controller' => 'App\\Controller\\SexoController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        381 => [[['_route' => 'sexo_delete', '_controller' => 'App\\Controller\\SexoController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        411 => [[['_route' => 'verSolicitud', '_controller' => 'App\\Controller\\SolicitudController::verSolicitud'], ['hash'], null, null, false, false, null]],
        458 => [
            [['_route' => 'aceptarSolicitud', '_controller' => 'App\\Controller\\SolicitudController::aceptarSolicitud'], ['hash'], null, null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
