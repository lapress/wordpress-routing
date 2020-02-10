<?php

namespace LaPress\WordPress\Routing\Http\Controllers;

use App\Http\Controllers\Controller;
use LaPress\WordPress\Routing\Http\BootstrapTrait;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class BaseController extends Controller
{
    use BootstrapTrait;

    public function __construct()
    {
        $this->middleware('wp-admin');
    }
}
