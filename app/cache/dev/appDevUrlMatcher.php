<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/images')) {
            if (0 === strpos($pathinfo, '/images/184a34a')) {
                // _assetic_184a34a
                if ($pathinfo === '/images/184a34a.jpeg') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '184a34a',  'pos' => NULL,  '_format' => 'jpeg',  '_route' => '_assetic_184a34a',);
                }

                // _assetic_184a34a_0
                if ($pathinfo === '/images/184a34a_welcome_image_1.jpeg') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '184a34a',  'pos' => 0,  '_format' => 'jpeg',  '_route' => '_assetic_184a34a_0',);
                }

            }

            if (0 === strpos($pathinfo, '/images/86b28a9')) {
                // _assetic_86b28a9
                if ($pathinfo === '/images/86b28a9.gif') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '86b28a9',  'pos' => NULL,  '_format' => 'gif',  '_route' => '_assetic_86b28a9',);
                }

                // _assetic_86b28a9_0
                if ($pathinfo === '/images/86b28a9_announce_img_1.gif') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '86b28a9',  'pos' => 0,  '_format' => 'gif',  '_route' => '_assetic_86b28a9_0',);
                }

            }

            if (0 === strpos($pathinfo, '/images/5ffc5fa')) {
                // _assetic_5ffc5fa
                if ($pathinfo === '/images/5ffc5fa.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '5ffc5fa',  'pos' => NULL,  '_format' => 'png',  '_route' => '_assetic_5ffc5fa',);
                }

                // _assetic_5ffc5fa_0
                if ($pathinfo === '/images/5ffc5fa_edit_1.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '5ffc5fa',  'pos' => 0,  '_format' => 'png',  '_route' => '_assetic_5ffc5fa_0',);
                }

            }

            if (0 === strpos($pathinfo, '/images/30a1ae4')) {
                // _assetic_30a1ae4
                if ($pathinfo === '/images/30a1ae4.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '30a1ae4',  'pos' => NULL,  '_format' => 'png',  '_route' => '_assetic_30a1ae4',);
                }

                // _assetic_30a1ae4_0
                if ($pathinfo === '/images/30a1ae4_delete_1.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '30a1ae4',  'pos' => 0,  '_format' => 'png',  '_route' => '_assetic_30a1ae4_0',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/css/style')) {
            // _assetic_c856ad0
            if ($pathinfo === '/css/style.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'c856ad0',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_c856ad0',);
            }

            if (0 === strpos($pathinfo, '/css/style_')) {
                // _assetic_c856ad0_0
                if ($pathinfo === '/css/style_bootstrap_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'c856ad0',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_c856ad0_0',);
                }

                // _assetic_c856ad0_1
                if ($pathinfo === '/css/style_index_2.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'c856ad0',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_c856ad0_1',);
                }

                if (0 === strpos($pathinfo, '/css/style_jquery')) {
                    // _assetic_c856ad0_2
                    if ($pathinfo === '/css/style_jquery-ui-1.10.4.custom.min_3.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'c856ad0',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_c856ad0_2',);
                    }

                    // _assetic_c856ad0_3
                    if ($pathinfo === '/css/style_jquery.ui.timepicker_4.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'c856ad0',  'pos' => 3,  '_format' => 'css',  '_route' => '_assetic_c856ad0_3',);
                    }

                }

                // _assetic_c856ad0_4
                if ($pathinfo === '/css/style_pickmeup_5.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'c856ad0',  'pos' => 4,  '_format' => 'css',  '_route' => '_assetic_c856ad0_4',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/js/b0f5dd0')) {
            // _assetic_b0f5dd0
            if ($pathinfo === '/js/b0f5dd0.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0',);
            }

            if (0 === strpos($pathinfo, '/js/b0f5dd0_part_')) {
                if (0 === strpos($pathinfo, '/js/b0f5dd0_part_1_jquery')) {
                    if (0 === strpos($pathinfo, '/js/b0f5dd0_part_1_jquery-')) {
                        // _assetic_b0f5dd0_0
                        if ($pathinfo === '/js/b0f5dd0_part_1_jquery-1.10.2_1.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0_0',);
                        }

                        // _assetic_b0f5dd0_1
                        if ($pathinfo === '/js/b0f5dd0_part_1_jquery-2.0.3_2.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0_1',);
                        }

                        // _assetic_b0f5dd0_2
                        if ($pathinfo === '/js/b0f5dd0_part_1_jquery-ui-1.10.4.custom.min_3.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0_2',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/js/b0f5dd0_part_1_jquery.')) {
                        // _assetic_b0f5dd0_3
                        if ($pathinfo === '/js/b0f5dd0_part_1_jquery.inputmask_4.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => 3,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0_3',);
                        }

                        // _assetic_b0f5dd0_4
                        if ($pathinfo === '/js/b0f5dd0_part_1_jquery.maskedinput_5.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => 4,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0_4',);
                        }

                        // _assetic_b0f5dd0_5
                        if ($pathinfo === '/js/b0f5dd0_part_1_jquery.pickmeup_6.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => 5,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0_5',);
                        }

                        // _assetic_b0f5dd0_6
                        if ($pathinfo === '/js/b0f5dd0_part_1_jquery.ui.timepicker_7.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => 6,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0_6',);
                        }

                        // _assetic_b0f5dd0_7
                        if ($pathinfo === '/js/b0f5dd0_part_1_jquery.validate_8.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => 7,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0_7',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/js/b0f5dd0_part_2_')) {
                    // _assetic_b0f5dd0_8
                    if ($pathinfo === '/js/b0f5dd0_part_2_ajax_1.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => 8,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0_8',);
                    }

                    // _assetic_b0f5dd0_9
                    if ($pathinfo === '/js/b0f5dd0_part_2_form_validation_2.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => 9,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0_9',);
                    }

                    // _assetic_b0f5dd0_10
                    if ($pathinfo === '/js/b0f5dd0_part_2_link-handler_3.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => 10,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0_10',);
                    }

                    // _assetic_b0f5dd0_11
                    if ($pathinfo === '/js/b0f5dd0_part_2_script_4.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => 11,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0_11',);
                    }

                    // _assetic_b0f5dd0_12
                    if ($pathinfo === '/js/b0f5dd0_part_2_upload_5.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'b0f5dd0',  'pos' => 12,  '_format' => 'js',  '_route' => '_assetic_b0f5dd0_12',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/images/5c989a1')) {
            // _assetic_5c989a1
            if ($pathinfo === '/images/5c989a1.jpg') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '5c989a1',  'pos' => NULL,  '_format' => 'jpg',  '_route' => '_assetic_5c989a1',);
            }

            // _assetic_5c989a1_0
            if ($pathinfo === '/images/5c989a1_logo_1.jpg') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '5c989a1',  'pos' => 0,  '_format' => 'jpg',  '_route' => '_assetic_5c989a1_0',);
            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/hello')) {
            // ljms_tpl_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ljms_tpl_homepage')), array (  '_controller' => 'Ljms\\TplBundle\\Controller\\DefaultController::indexAction',));
            }

            // ljms_core_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ljms_core_homepage')), array (  '_controller' => 'Ljms\\CoreBundle\\Controller\\DefaultController::indexAction',));
            }

        }

        // about_index
        if ($pathinfo === '/about') {
            return array (  '_controller' => 'Ljms\\HomeBundle\\Controller\\AboutController::indexAction',  '_route' => 'about_index',);
        }

        // contact_index
        if ($pathinfo === '/contact') {
            return array (  '_controller' => 'Ljms\\HomeBundle\\Controller\\ContactController::indexAction',  '_route' => 'contact_index',);
        }

        if (0 === strpos($pathinfo, '/home')) {
            // home_index
            if ($pathinfo === '/home') {
                return array (  '_controller' => 'Ljms\\HomeBundle\\Controller\\HomeController::indexAction',  '_route' => 'home_index',);
            }

            // home_get_schedule
            if ($pathinfo === '/home/get') {
                return array (  '_controller' => 'Ljms\\HomeBundle\\Controller\\HomeController::getAction',  '_route' => 'home_get_schedule',);
            }

            // home_schedule
            if (0 === strpos($pathinfo, '/home/schedule') && preg_match('#^/home/schedule/(?P<year>[^/]++)/(?P<month>[^/]++)/(?P<day>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'home_schedule')), array (  '_controller' => 'Ljms\\HomeBundle\\Controller\\HomeController::scheduleAction',));
            }

            // home_division_info
            if ($pathinfo === '/home/division') {
                return array (  '_controller' => 'Ljms\\HomeBundle\\Controller\\HomeController::divisionAction',  '_route' => 'home_division_info',);
            }

        }

        // sponsors_index
        if ($pathinfo === '/sponsors') {
            return array (  '_controller' => 'Ljms\\HomeBundle\\Controller\\SponsorsController::indexAction',  '_route' => 'sponsors_index',);
        }

        // admin_recover
        if ($pathinfo === '/forgot') {
            return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\AdminController::recoverAction',  '_route' => 'admin_recover',);
        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/divisions')) {
                // division_index
                if ($pathinfo === '/admin/divisions') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\DivisionController::indexAction',  '_route' => 'division_index',);
                }

                // division_add
                if ($pathinfo === '/admin/divisions/add') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\DivisionController::addAction',  '_route' => 'division_add',);
                }

                // division_edit
                if (0 === strpos($pathinfo, '/admin/divisions/edit') && preg_match('#^/admin/divisions/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'division_edit')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\DivisionController::editAction',));
                }

                // division_delete
                if (0 === strpos($pathinfo, '/admin/divisions/delete') && preg_match('#^/admin/divisions/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_division_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'division_delete')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\DivisionController::deleteAction',));
                }
                not_division_delete:

                if (0 === strpos($pathinfo, '/admin/divisions/g')) {
                    // division_group
                    if ($pathinfo === '/admin/divisions/group') {
                        return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\DivisionController::groupAction',  '_route' => 'division_group',);
                    }

                    // division_get
                    if ($pathinfo === '/admin/divisions/get') {
                        return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\DivisionController::getAction',  '_route' => 'division_get',);
                    }

                }

                // division_add_logo
                if ($pathinfo === '/admin/divisions/logo') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\DivisionController::addLogoAction',  '_route' => 'division_add_logo',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/guardian')) {
                // guardian_index
                if ($pathinfo === '/admin/guardian') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\GuardianController::indexAction',  '_route' => 'guardian_index',);
                }

                // guardian_add
                if ($pathinfo === '/admin/guardian/add') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\GuardianController::addAction',  '_route' => 'guardian_add',);
                }

                // guardian_edit
                if (0 === strpos($pathinfo, '/admin/guardian/edit') && preg_match('#^/admin/guardian/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'guardian_edit')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\GuardianController::editAction',));
                }

                // guardian_delete
                if (0 === strpos($pathinfo, '/admin/guardian/delete') && preg_match('#^/admin/guardian/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_guardian_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'guardian_delete')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\GuardianController::deleteAction',));
                }
                not_guardian_delete:

                // guardian_group
                if ($pathinfo === '/admin/guardian/group') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\GuardianController::groupAction',  '_route' => 'guardian_group',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/location')) {
                // location_index
                if ($pathinfo === '/admin/location') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\LocationController::indexAction',  '_route' => 'location_index',);
                }

                // location_add
                if ($pathinfo === '/admin/location/add') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\LocationController::addAction',  '_route' => 'location_add',);
                }

                // location_edit
                if (0 === strpos($pathinfo, '/admin/location/edit') && preg_match('#^/admin/location/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'location_edit')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\LocationController::editAction',));
                }

                // location_delete
                if (0 === strpos($pathinfo, '/admin/location/delete') && preg_match('#^/admin/location/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_location_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'location_delete')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\LocationController::deleteAction',));
                }
                not_location_delete:

                // location_group
                if ($pathinfo === '/admin/location/group') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\LocationController::groupAction',  '_route' => 'location_group',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/p')) {
                if (0 === strpos($pathinfo, '/admin/players')) {
                    // player_index
                    if ($pathinfo === '/admin/players') {
                        return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\PlayerController::indexAction',  '_route' => 'player_index',);
                    }

                    // player_add
                    if (0 === strpos($pathinfo, '/admin/players/add') && preg_match('#^/admin/players/add/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'player_add')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\PlayerController::addAction',));
                    }

                    // player_edit
                    if (0 === strpos($pathinfo, '/admin/players/edit') && preg_match('#^/admin/players/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'player_edit')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\PlayerController::editAction',));
                    }

                    // player_delete
                    if (0 === strpos($pathinfo, '/admin/players/delete') && preg_match('#^/admin/players/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_player_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'player_delete')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\PlayerController::deleteAction',));
                    }
                    not_player_delete:

                    // player_group
                    if ($pathinfo === '/admin/players/group') {
                        return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\PlayerController::groupAction',  '_route' => 'player_group',);
                    }

                }

                // profile_index
                if ($pathinfo === '/admin/profile') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\ProfileController::indexAction',  '_route' => 'profile_index',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/schedule')) {
                // schedule_index
                if ($pathinfo === '/admin/schedule') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\ScheduleController::indexAction',  '_route' => 'schedule_index',);
                }

                // schedule_add
                if ($pathinfo === '/admin/schedule/add') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\ScheduleController::addAction',  '_route' => 'schedule_add',);
                }

                // schedule_edit
                if (0 === strpos($pathinfo, '/admin/schedule/edit') && preg_match('#^/admin/schedule/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_edit')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\ScheduleController::editAction',));
                }

                // schedule_delete
                if (0 === strpos($pathinfo, '/admin/schedule/delete') && preg_match('#^/admin/schedule/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_schedule_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_delete')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\ScheduleController::deleteAction',));
                }
                not_schedule_delete:

                // schedule_result
                if (0 === strpos($pathinfo, '/admin/schedule/result') && preg_match('#^/admin/schedule/result/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_result')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\ScheduleController::resultAction',));
                }

                // schedule_group
                if ($pathinfo === '/admin/schedule/group') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\ScheduleController::groupAction',  '_route' => 'schedule_group',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/teams')) {
                // team_index
                if ($pathinfo === '/admin/teams') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\TeamController::indexAction',  '_route' => 'team_index',);
                }

                // team_add
                if ($pathinfo === '/admin/teams/add') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\TeamController::addAction',  '_route' => 'team_add',);
                }

                // team_edit
                if (0 === strpos($pathinfo, '/admin/teams/edit') && preg_match('#^/admin/teams/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'team_edit')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\TeamController::editAction',));
                }

                // team_delete
                if (0 === strpos($pathinfo, '/admin/teams/delete') && preg_match('#^/admin/teams/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_team_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'team_delete')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\TeamController::deleteAction',));
                }
                not_team_delete:

                // team_group
                if ($pathinfo === '/admin/teams/group') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\TeamController::groupAction',  '_route' => 'team_group',);
                }

                // team_assign
                if (0 === strpos($pathinfo, '/admin/teams/assign') && preg_match('#^/admin/teams/assign/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'team_assign')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\TeamController::assignAction',));
                }

                // team_get
                if ($pathinfo === '/admin/teams/get') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\TeamController::getAction',  '_route' => 'team_get',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/users')) {
                // users_index
                if ($pathinfo === '/admin/users') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\UsersController::indexAction',  '_route' => 'users_index',);
                }

                // users_add
                if ($pathinfo === '/admin/users/add') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\UsersController::addAction',  '_route' => 'users_add',);
                }

                // users_edit
                if (0 === strpos($pathinfo, '/admin/users/edit') && preg_match('#^/admin/users/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_edit')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\UsersController::editAction',));
                }

                // users_delete
                if (0 === strpos($pathinfo, '/admin/users/delete') && preg_match('#^/admin/users/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_users_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_delete')), array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\UsersController::deleteAction',));
                }
                not_users_delete:

                // users_group
                if ($pathinfo === '/admin/users/group') {
                    return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\UsersController::groupAction',  '_route' => 'users_group',);
                }

            }

            // login
            if ($pathinfo === '/admin') {
                return array (  '_controller' => 'Ljms\\AdminBundle\\Controller\\AdminController::loginAction',  '_route' => 'login',);
            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            // login_check
            if ($pathinfo === '/login_check') {
                return array('_route' => 'login_check');
            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
