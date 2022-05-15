<?php

namespace App\Http\Controllers;

use App\Http\Utils\AppUtils;
use Illuminate\Http\Request;

class AdminBaseController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->layout = "admin";
        $this->assign('show_sidebar', true);
        $this->assign('module', 'Users');

        $menus = AppUtils::ADMIN_MENU;
        $this->checkMenusActive($menus, 'admin');
        $this->assign('menus', $menus);
        $this->assign('action', 'List');

        $this->addMeta('title', 'Admin Manager');
    }

    public function addButtonCreate($title, $action)
    {
        $this->assign('admin_btn_add', ['title' => $title, 'action' => $action]);
    }

    public function addIconPage($icon)
    {
        $this->assign('admin_icon_page', $icon);
    }

}
