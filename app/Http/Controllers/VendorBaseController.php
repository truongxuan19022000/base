<?php

namespace App\Http\Controllers;

use App\Http\Utils\AppUtils;
use Illuminate\Http\Request;

class VendorBaseController extends BaseController
{
    public $layout = "vendor";
    public $data = [];
    public $meta = [];

    public function __construct()
    {
        parent::__construct();

        $this->assign('module', 'Users');
        $this->assign('action', 'List');
        $this->assign('menu', AppUtils::VENDOR_MENU);
        $this->addMeta('title', 'Vendor Manager');
    }
}
