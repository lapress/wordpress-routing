<?php

namespace LaPress\WordPress\Routing\Http\Controllers;


use LaPress\WordPress\Routing\Http\Controllers\Admin\BaseController;

class WpJsonController extends BaseController
{
    public function show()
    {
        return $this->script()->run('index.php');
    }
}
