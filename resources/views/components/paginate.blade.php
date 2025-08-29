@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage()) <!--Пагинатор - это счётчик страницы-->
            <li class="disabled"><span>Назад</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Назад</a></li>
        @endif       
        
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Вперед</a></li>
        @else
            <li class="disabled"><span>Вперед</span></li>
        @endif
    </ul>
@endif