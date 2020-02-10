<?php

namespace LaPress\WordPress\Routing\Http\Controllers;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class AjaxAdminController extends BaseController
{
    /**
     * @return string
     */
    public function edit()
    {
        return $this->script()->runAdmin('admin-ajax.php');
    }

    /**
     * @return string
     */
    public function update()
    {
        return $this->script()->runAdmin('admin-ajax.php');
    }
}
