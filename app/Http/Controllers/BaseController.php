<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BaseController extends Controller
{
    public $layout = "web";
    public $data = [];
    public $meta = [];

    public function __construct()
    {
        $this->addMeta('title', 'Shop Manager');
    }

    public function assign($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function addMeta($name, $value)
    {
        $this->meta[$name] = $value;
    }

    public function addStyleSheet($name, $content = "", $isLink = true)
    {
        if (!isset($this->meta['css'])) $this->meta['css'] = [];
        $style = "";
        if ($isLink) {
            $style = "<link rel=\"stylesheet\" href=\"$content\" />";
        } else {
            $style = "<style type=\"text/css\">$content</style>";
        }
        $this->meta['css'][$name] = $style;
    }

    public function addScript($name, $content = "", $isLink = true)
    {
        if (!isset($this->meta['js'])) $this->meta['js'] = [];
        $script = "";
        if ($isLink) {
            $script = "<script rel=\"text/javascript\" src=\"$content\"></script>";
        } else {
            $script = "<script type=\"text/javascript\">$content</script>";
        }
        $this->meta['js'][$name] = $script;
    }

    public function hideSideBar()
    {
        $this->assign('show_sidebar', false);
    }

    public function setMetaTitle($value)
    {
        $this->meta['title'] = $value;
    }

    public function setMetaDesc($value)
    {
        $this->meta['desc'] = $value;
    }

    public function render($view)
    {
        $this->data['meta'] = $this->meta;
        $view = $this->layout . '.' . $view;
        return view($view, $this->data);
    }

    public function raiseNotice($message)
    {
        $this->setMessage($message, 'notice');
    }

    public function raiseWarning($message)
    {
        $this->setMessage($message, 'warning');
    }

    public function raiseInfo($message)
    {
        $this->setMessage($message, 'info');
    }

    public function raiseSuccess($message)
    {
        $this->setMessage($message, 'success');
    }

    public function raiseDanger($message)
    {
        $this->setMessage($message, 'danger');
    }

    protected function setMessage($mess, $status)
    {
        $message = session('raise-message', []);
        $checkSum = md5(json_encode($mess) . $status);
        $message[$checkSum] = [$mess, $status];
        session(['raise-message' => $message]);
    }

    function checkMenusActive(&$items, $type = 'admin')
    {
        $hasActive = false;
        foreach ($items as $index => $item) {
            if ($this->menuIsActive($item)) {
                $hasActive = true;
            }
            if (!empty($item['childs'])) {
                if ($this->checkMenusActive($item['childs'], $type)) {
                    $item['hasActive'] = true;
                }
            }
            $this->processIconMenu($item, $type);
            $items[$index] = $item;
        }
        return $hasActive;
    }

    function menuIsActive(&$item)
    {
        $fields = ['icon', 'type', 'url'];
        $currentRouterName = Route::getFacadeRoot()->current()->getName();
        foreach ($fields as $field) {
            if (empty($item[$field])) {
                $item[$field] = '';
            }
        }
        if (empty($item['childs'])) {
            $item['childs'] = [];
        }
        $item['active'] = false;
        $item['hasActive'] = false;

        if ($item['type'] == 'router' and $item['url'] == $currentRouterName) {
            $item['active'] = true;
            return true;
        }
        return false;
    }

    public function processIconMenu(&$item, $type = 'admin')
    {
        $path = "/assets/$type/images/common";
        $icon =  $item['icon'];
        if ($icon) {
            if ($item['active']) {
                $item['icon'] = "$path/active/$icon.svg";
            } else {
                $item['icon'] = "$path/$icon.svg";
            }
        }
    }

    
}
