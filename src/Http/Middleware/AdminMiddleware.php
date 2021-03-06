<?php

namespace LaPress\WordPress\Routing\Http\Middleware;

use Closure;
use LaPress\WordPress\Routing\Http\BootstrapTrait;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class AdminMiddleware
{
    use BootstrapTrait;
    /**
     * @param         $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $this->setVariables();

        $globals = $this->getGlobalsKeys();

        $this->bootstrap();

        $wordpressGlobals = $this->detectNewGlobals($globals);

        app()->instance('wordpress.globals', $wordpressGlobals);

        return $next($request);
    }

    private function bootstrap()
    {
        /*
         * In WordPress Administration Screens
         *
         * @since 2.3.2
         */
        if (!defined('WP_ADMIN')) {
            define('WP_ADMIN', true);
        }

        if (!defined('WP_NETWORK_ADMIN')) {
            define('WP_NETWORK_ADMIN', false);
        }

        if (!defined('WP_USER_ADMIN')) {
            define('WP_USER_ADMIN', false);
        }

        if (!WP_NETWORK_ADMIN && !WP_USER_ADMIN) {
//            define('WP_BLOG_ADMIN', true);
        }

        if (isset($_GET['import']) && !defined('WP_LOAD_IMPORTERS')) {
            define('WP_LOAD_IMPORTERS', true);
        }

        $this->runAdminBootstrapScript();

        if (env('WP_LINK_MANAGER', false)) {
            add_filter('pre_option_link_manager_enabled', '__return_true');
        }
    }
}
