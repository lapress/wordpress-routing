<?php

namespace LaPress\WordPress\Routing\Http\Controllers;


use LaPress\WordPress\Routing\Http\Controllers\BaseController;

class WpJsonController extends BaseController
{
    public function show()
    {
        return $this->script()->run('index.php');
    }
}
