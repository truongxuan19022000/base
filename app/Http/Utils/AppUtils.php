<?php

/**
 * Defined const variable
 */

namespace App\Http\Utils;

class AppUtils
{
    const DEFAUL_LIMIT = 60;
    // type: route, static, label, divider
    const ADMIN_MENU = [
        [
            'name' => 'ダッシュボード', 'icon' => 'icon-nav', 'type' => 'router', 'url' => 'admin.dashboard',
        ],
        [
            'name' => 'ユーザー管理', 'icon' => 'icon-nav01', 'type' => 'router', 'url' => 'admin.users.index',
        ],
        [
            'name' => 'ベンダー管理', 'icon' => 'icon-nav02', 'type' => 'router', 'url' => 'admin.users.index',
        ],
        [
            'name' => '商品管理', 'icon' => 'icon-nav03',
        ],
        [
            'name' => '案件管理', 'icon' => 'icon-nav04', 'type' => 'router', 'url' => 'admin.users.index',
        ],
        [
            'name' => '請求管理', 'icon' => 'icon-nav05', 'type' => 'router', 'url' => 'admin.users.index',
        ],
        [
            'name' => 'サイト管理', 'icon' => 'icon-nav06',
            'childs' => [
                [
                    'name' => '- お知らせ', 'type' => 'router', 'url' => 'admin.users.index', 'icon' => '',
                ],
                [
                    'name' => '- 導入事例', 'type' => 'router', 'url' => 'admin.users.index', 'icon' => '',
                ],
                [
                    'name' => '- スライドショー', 'type' => 'router', 'url' => 'admin.users.index', 'icon' => '',
                ],
            ],
        ],
        [
            'name' => '', 'icon' => '', 'type' => 'divider',
        ],
        [
            'name' => '補助金マスタ', 'icon' => 'icon-nav07', 'type' => 'router', 'url' => 'admin.users.index',
        ],
        [
            'name' => 'アカウント管理', 'icon' => 'icon-nav08', 'type' => 'router', 'url' => 'admin.users.index',
        ],
    ];
    const VENDOR_MENU = [
        [
            'name' => '商品管理', 'icon' => '/assets/vendor/images/common/icon-nav-pro.svg', 'type' => 'router', 'url' => 'vendor.product',
        ],
        [
            'name' => '申込管理', 'icon' =>'/assets/vendor/images/common/icon-nav-app.svg', 'type' => 'router', 'url' => 'vendor.dashboard',
        ],
        [
            'name' => '登録情報', 'icon' => '/assets/vendor/images/common/icon-nav-reg.svg', 'type' => 'router', 'url' => 'vendor.dashboard',
        ],

    ];
    public static function showMessage()
    {
        $arr_message = session('raise-message');
        if (!empty($arr_message)) {

            foreach ($arr_message as $message) {
                echo '<div class="mt-3 ml-3 mr-3 alert alert-' . $message[1] . ' alert-dismissible" data-time-close="5000">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>' .
                    '<strong>' . ucfirst($message[1]) . '!</strong> ' . trans($message[0]) . '
                  </div>';
            }
        }
        session()->forget('raise-message');
    }
}
