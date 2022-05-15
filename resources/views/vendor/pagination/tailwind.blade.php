@if ($paginator->hasPages())
    <div class="paging">
        <div class="paging-number">
            件数：<span class="number f-roboto">{{$paginator->total()}}</span>
        </div>
        <div class="pagination">
            <ul>
                @if ($paginator->onFirstPage())
                    <li class="previous disabled">
                        <a>
                            <img class="svg"
                                 src="{{asset('/assets/admin/images/common/icon-arrow-pagin.svg')}}"
                                 alt=""></a></li>
                @else
                    <li class="previous">
                        <a href="{{ $paginator->previousPageUrl() }}">
                            <img class="svg"
                                 src="{{asset('/assets/admin/images/common/icon-arrow-pagin.svg')}}"
                                 alt=""></a></li>
                @endif
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li>
                            <a class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">{{$element}}</a>
                        </li>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><a>{{$page}}</a></li>
                            @else
                                <li><a href="{{$url}}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if ($paginator->hasMorePages())
                    <li class="next">
                        <a href="{{ $paginator->nextPageUrl() }}">
                            <img class="svg" src="{{asset('/assets/admin/images/common/icon-arrow-pagin.svg')}}"
                                 alt=""></a></li>
                @else
                    <li class="next"><a href="#">
                            <img class="svg" src="{{asset('/assets/admin/images/common/icon-arrow-pagin.svg')}}"
                                 alt=""></a></li>
                @endif
            </ul>
        </div>
    </div>
@endif
