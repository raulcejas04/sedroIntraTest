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
        '/api/add/user' => [[['_route' => 'api_add_user', '_controller' => 'App\\Controller\\APIController::addUserFromExtranet'], null, ['POST' => 0], null, false, false, null]],
        '/acciones-extranet/lista' => [[['_route' => 'usuarios_extranet', '_controller' => 'App\\Controller\\AccionesExtranetController::listaUsuariosExtranet'], null, null, null, false, false, null]],
        '/acciones-extranet/dashboard/pruebas-extranet' => [[['_route' => 'pruebas_extranet', '_controller' => 'App\\Controller\\AccionesExtranetController::pruebasEnExtranet'], null, null, null, false, false, null]],
        '/acciones-extranet/dashboard/pruebas-extranet/crear-grupo' => [[['_route' => 'pruebas_extranet_grupo', '_controller' => 'App\\Controller\\AccionesExtranetController::pruebasEnExtranetCrearGrupo'], null, null, null, false, false, null]],
        '/dashboard/change/password' => [[['_route' => 'change_password', '_controller' => 'App\\Controller\\ChangePasswordController::index'], null, null, null, false, false, null]],
        '/dashboard' => [[['_route' => 'dashboard', '_controller' => 'App\\Controller\\DashboardController::index'], null, null, null, false, false, null]],
        '/grupo' => [[['_route' => 'grupo_index', '_controller' => 'App\\Controller\\GrupoController::index'], null, ['GET' => 0], null, true, false, null]],
        '/grupo/new' => [[['_route' => 'grupo_new', '_controller' => 'App\\Controller\\GrupoController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/grupo/keycloak/new' => [[['_route' => 'grupo_keycloak_new', '_controller' => 'App\\Controller\\GrupoKeycloakController::newExtranetKeycloakGroup'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/menu' => [[['_route' => 'menu', '_controller' => 'App\\Controller\\MenuController::index'], null, null, null, false, false, null]],
        '/sidebarcontrol' => [[['_route' => 'sidebarcontrol', '_controller' => 'App\\Controller\\MenuController::sidebarcontrol'], null, null, null, false, false, null]],
        '/menuitem' => [[['_route' => 'menuitem_index', '_controller' => 'App\\Controller\\MenuitemController::index'], null, ['GET' => 0], null, true, false, null]],
        '/menuitem/new' => [[['_route' => 'menuitem_new', '_controller' => 'App\\Controller\\MenuitemController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/nacionalidad' => [[['_route' => 'nacionalidad_index', '_controller' => 'App\\Controller\\NacionalidadController::index'], null, ['GET' => 0], null, true, false, null]],
        '/nacionalidad/new' => [[['_route' => 'nacionalidad_new', '_controller' => 'App\\Controller\\NacionalidadController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/oauth/login' => [[['_route' => 'oauth_login', '_controller' => 'App\\Controller\\OAuthController::index'], null, null, null, false, false, null]],
        '/oauth/logout' => [[['_route' => 'oauth_logout', '_controller' => 'App\\Controller\\OAuthController::logout'], null, ['GET' => 0], null, false, false, null]],
        '/oauth/callback' => [[['_route' => 'oauth_check', '_controller' => 'App\\Controller\\OAuthController::check'], null, null, null, false, false, null]],
        '/dashboard/personas/lista' => [[['_route' => 'listaPersonas', '_controller' => 'App\\Controller\\PersonasFisicasJuridicasController::index'], null, null, null, false, false, null]],
        '/pruebas-de-inputs' => [[['_route' => 'prueba', '_controller' => 'App\\Controller\\PruebaController::index'], null, null, null, false, false, null]],
        '/testflash' => [[['_route' => 'testflash', '_controller' => 'App\\Controller\\PruebaController::testflash'], null, null, null, false, false, null]],
        '/pruebagus' => [[['_route' => 'pruebagus', '_controller' => 'App\\Controller\\PruebaController::pruebagus'], null, null, null, false, false, null]],
        '/rol/keycloak' => [[['_route' => 'rol_keycloak_index', '_controller' => 'App\\Controller\\RolKeycloakController::index'], null, ['GET' => 0], null, true, false, null]],
        '/rol/keycloak/new' => [[['_route' => 'rol_keycloak_new', '_controller' => 'App\\Controller\\RolKeycloakController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/sexo' => [[['_route' => 'sexo_index', '_controller' => 'App\\Controller\\SexoController::index'], null, ['GET' => 0], null, true, false, null]],
        '/sexo/new' => [[['_route' => 'sexo_new', '_controller' => 'App\\Controller\\SexoController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/dashboard/nueva-solicitud' => [[['_route' => 'nueva-solicitud', '_controller' => 'App\\Controller\\SolicitudController::nuevaSolicitud'], null, null, null, false, false, null]],
        '/dashboard/solicitudes' => [[['_route' => 'solicitudes', '_controller' => 'App\\Controller\\SolicitudController::solicitudes'], null, null, null, false, false, null]],
        '/misDatos' => [[['_route' => 'misDatos', '_controller' => 'App\\Controller\\UsuarioController::verMisDatos'], null, null, null, false, false, null]],
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
                .'|/grupo/(?'
                    .'|([^/]++)(?'
                        .'|(*:306)'
                        .'|/edit(*:319)'
                        .'|(*:327)'
                    .')'
                    .'|keycloak(?'
                        .'|(*:347)'
                        .'|/([^/]++)(?'
                            .'|(*:367)'
                            .'|/edit(*:380)'
                            .'|(*:388)'
                        .')'
                    .')'
                .')'
                .'|/menuitem/([^/]++)(?'
                    .'|(*:420)'
                    .'|/edit(*:433)'
                    .'|(*:441)'
                .')'
                .'|/nacionalidad/([^/]++)(?'
                    .'|(*:475)'
                    .'|/edit(*:488)'
                    .'|(*:496)'
                .')'
                .'|/da(?'
                    .'|tavalidator/([^/]++)(*:531)'
                    .'|shboard/solicitud/([^/]++)/aceptar\\-solicitud(*:584)'
                .')'
                .'|/rol/keycloak/([^/]++)(?'
                    .'|(*:618)'
                    .'|/edit(*:631)'
                    .'|(*:639)'
                .')'
                .'|/s(?'
                    .'|exo/([^/]++)(?'
                        .'|(*:668)'
                        .'|/edit(*:681)'
                        .'|(*:689)'
                    .')'
                    .'|olicitud/([^/]++)/ver(*:719)'
                .')'
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
        306 => [[['_route' => 'grupo_show', '_controller' => 'App\\Controller\\GrupoController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        319 => [[['_route' => 'grupo_edit', '_controller' => 'App\\Controller\\GrupoController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        327 => [[['_route' => 'grupo_delete', '_controller' => 'App\\Controller\\GrupoController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        347 => [[['_route' => 'grupo_keycloak_index', '_controller' => 'App\\Controller\\GrupoKeycloakController::index'], [], ['GET' => 0], null, true, false, null]],
        367 => [[['_route' => 'grupo_keycloak_show', '_controller' => 'App\\Controller\\GrupoKeycloakController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        380 => [[['_route' => 'grupo_keycloak_edit', '_controller' => 'App\\Controller\\GrupoKeycloakController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        388 => [[['_route' => 'grupo_keycloak_delete', '_controller' => 'App\\Controller\\GrupoKeycloakController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        420 => [[['_route' => 'menuitem_show', '_controller' => 'App\\Controller\\MenuitemController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        433 => [[['_route' => 'menuitem_edit', '_controller' => 'App\\Controller\\MenuitemController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        441 => [[['_route' => 'menuitem_delete', '_controller' => 'App\\Controller\\MenuitemController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        475 => [[['_route' => 'nacionalidad_show', '_controller' => 'App\\Controller\\NacionalidadController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        488 => [[['_route' => 'nacionalidad_edit', '_controller' => 'App\\Controller\\NacionalidadController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        496 => [[['_route' => 'nacionalidad_delete', '_controller' => 'App\\Controller\\NacionalidadController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        531 => [[['_route' => 'datavalidator', '_controller' => 'App\\Controller\\PruebaController::datavalidator'], ['id'], ['GET' => 0], null, false, true, null]],
        584 => [[['_route' => 'aceptarSolicitud', '_controller' => 'App\\Controller\\SolicitudController::aceptarSolicitud'], ['hash'], null, null, false, false, null]],
        618 => [[['_route' => 'rol_keycloak_show', '_controller' => 'App\\Controller\\RolKeycloakController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        631 => [[['_route' => 'rol_keycloak_edit', '_controller' => 'App\\Controller\\RolKeycloakController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        639 => [[['_route' => 'rol_keycloak_delete', '_controller' => 'App\\Controller\\RolKeycloakController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        668 => [[['_route' => 'sexo_show', '_controller' => 'App\\Controller\\SexoController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        681 => [[['_route' => 'sexo_edit', '_controller' => 'App\\Controller\\SexoController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        689 => [[['_route' => 'sexo_delete', '_controller' => 'App\\Controller\\SexoController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        719 => [
            [['_route' => 'verSolicitud', '_controller' => 'App\\Controller\\SolicitudController::verSolicitud'], ['hash'], null, null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
