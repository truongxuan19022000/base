<?php
$_actions = ['showtitle' => true, 'showadd' => true, 'showdelete' => true];
if (!isset($actions)) {
    $actions = [];
}
$actions = array_merge($actions, $_actions);
?>
<div class="toolbar-box mb-3 mt-3">
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3 title">
            @if (isset($actions['showtitle']) AND $actions['showtitle'])
            {{ $title }}
            @endif

        </div>
        <div class="col-12 col-md-8 col-lg-9 toolbar">

            @if (isset($actions['showadd']) AND $actions['showadd'])
            <a href="{{ route('admin.'.$controller.'.create') }}" class="btn btn-info btn-sm">
                <i class="fas fa-plus"></i>
            </a>
            @endif

            @if (isset($actions['showdelete']) AND $actions['showdelete'])
            <button class="btn btn-danger btn-sm btn-delete-many" data-rel="{{ route('admin.'.$controller.'.deletemany') }}">
                <i class="fas fa-trash-alt"></i>
            </button>
            @endif
        </div>
    </div>
    </div>