<?php

namespace LaPress\WordPress\Routing\Http\Controllers;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class MaintenanceController extends BaseController
{
    public function __construct()
    {
    }
    /**
     * @return string
     */
    public function show()
    {
        return $this->script()->runAdmin('maint/repair.php');
    }
}
