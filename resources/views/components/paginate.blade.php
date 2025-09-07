@if ($paginator->hasPages())
    <div class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage()) <!--Пагинатор - это счётчик страницы-->
            <span>Назад</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">Назад</a>
        @endif       
        
        @for($pageN = 1; $pageN <= $paginator->lastpage(); $pageN++)
            @if($pageN == $paginator->currentPage())
                <span>{{$pageN}}</span>
            @else
                <a href="{{$paginator->url($pageN)}}">{{$pageN}}</a>
            @endif
        @endfor

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">Вперед</a>
        @else
            <span>Вперед</span>
        @endif
    </div>
@endif