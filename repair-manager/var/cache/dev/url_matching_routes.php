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
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/audit' => [[['_route' => 'audit_log_index', '_controller' => 'App\\Controller\\AuditLogController::index'], null, null, null, true, false, null]],
        '/audit/test' => [[['_route' => 'app_audit_test', '_controller' => 'App\\Controller\\AuditTestController::testAudit'], null, null, null, false, false, null]],
        '/dashboard' => [
            [['_route' => 'dashboard_index', '_controller' => 'App\\Controller\\DashboardController::index'], null, null, null, true, false, null],
            [['_route' => 'app_dashboard', '_controller' => 'App\\Controller\\HomeController::dashboard'], null, null, null, false, false, null],
        ],
        '/dashboard/refresh-stats' => [[['_route' => 'dashboard_refresh_stats', '_controller' => 'App\\Controller\\DashboardController::refreshStats'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/repair' => [[['_route' => 'repair_index', '_controller' => 'App\\Controller\\RepairController::index'], null, ['GET' => 0], null, true, false, null]],
        '/repair/new' => [[['_route' => 'repair_new', '_controller' => 'App\\Controller\\RepairController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/roles' => [[['_route' => 'app_role_management', '_controller' => 'App\\Controller\\RoleController::index'], null, null, null, true, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/status' => [[['_route' => 'app_status_index', '_controller' => 'App\\Controller\\StatusController::index'], null, ['GET' => 0], null, true, false, null]],
        '/status/new' => [[['_route' => 'app_status_new', '_controller' => 'App\\Controller\\StatusController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/user' => [[['_route' => 'app_user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/user/new' => [[['_route' => 'app_user_new', '_controller' => 'App\\Controller\\UserController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/admin/(?'
                    .'|audit/([^/]++)(*:226)'
                    .'|roles/update/([^/]++)(*:255)'
                    .'|user/([^/]++)(?'
                        .'|(*:279)'
                        .'|/edit(*:292)'
                        .'|(*:300)'
                    .')'
                .')'
                .'|/repair/(?'
                    .'|([^/]++)(?'
                        .'|(*:332)'
                        .'|/(?'
                            .'|edit(*:348)'
                            .'|delete(*:362)'
                            .'|priority(*:378)'
                        .')'
                    .')'
                    .'|tracking/([^/]++)(*:405)'
                    .'|([^/]++)/generate\\-tracking(*:440)'
                    .'|tracking/error(*:462)'
                .')'
                .'|/status/([^/]++)(?'
                    .'|(*:490)'
                    .'|/edit(*:503)'
                    .'|(*:511)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        226 => [[['_route' => 'audit_log_show', '_controller' => 'App\\Controller\\AuditLogController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        255 => [[['_route' => 'app_role_update', '_controller' => 'App\\Controller\\RoleController::update'], ['id'], ['POST' => 0], null, false, true, null]],
        279 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        292 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        300 => [[['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        332 => [[['_route' => 'repair_show', '_controller' => 'App\\Controller\\RepairController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        348 => [[['_route' => 'repair_edit', '_controller' => 'App\\Controller\\RepairController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        362 => [[['_route' => 'repair_delete', '_controller' => 'App\\Controller\\RepairController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        378 => [[['_route' => 'repair_toggle_priority', '_controller' => 'App\\Controller\\RepairController::togglePriority'], ['id'], ['POST' => 0], null, false, false, null]],
        405 => [[['_route' => 'repair_tracking', '_controller' => 'App\\Controller\\TrackingController::track'], ['token'], null, null, false, true, null]],
        440 => [[['_route' => 'repair_generate_tracking', '_controller' => 'App\\Controller\\TrackingController::generateTrackingToken'], ['id'], null, null, false, false, null]],
        462 => [[['_route' => 'repair_tracking_error', '_controller' => 'App\\Controller\\TrackingController::error'], [], null, null, false, false, null]],
        490 => [[['_route' => 'app_status_show', '_controller' => 'App\\Controller\\StatusController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        503 => [[['_route' => 'app_status_edit', '_controller' => 'App\\Controller\\StatusController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        511 => [
            [['_route' => 'app_status_delete', '_controller' => 'App\\Controller\\StatusController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
