<?php
$_actions = ['showtitle' => true, 'showsave' => true, 'showclose' => true];
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

            @if (isset($actions['showsave']) AND $actions['showsave'])
            <button data-rel="{{ route('admin.'.$controller.'.store') }}" class="btn btn-success btn-sm btn-save-form">
                <i class="fas fa-save"></i>
            </button>
            @endif

            @if (isset($actions['showclose']) AND $actions['showclose'])
            <a href="{{ route('admin.'.$controller.'.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-times"></i>
            </a>
            @endif
        </div>
    </div>
</div>