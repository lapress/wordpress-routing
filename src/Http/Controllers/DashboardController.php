<?php

namespace LaPress\WordPress\Routing\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class DashboardController extends BaseController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Request $request)
    {
        // need trail '/'
        if (!Str::endsWith($request->getPathInfo(), '/')) {
            // make valid url
            $url = $request->getSchemeAndHttpHost().$request->getBaseUrl().$request->getPathInfo().'/';

            $qs = $request->getQueryString();
            if ($qs !== null) {
                $url .= '?'.$qs;
            }

            // redirect to valid url
            return redirect()->to($url);
        }

        return $this->script()->runAdminWithMenu('index.php');
    }
}
