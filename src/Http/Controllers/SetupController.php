<?php

namespace LaPress\WordPress\Routing\Http\Controllers;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class SetupController extends BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return $this->script()->runAdminWithMenu('setup-config.php');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function update()
    {
        return $this->script()->runAdminWithMenu('setup-config.php');
    }
}
