@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Anterior Pagina Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')" >
                <a href="#"> 
                    <i class="material-icons">chevron_left</i> 
                </a>
            </li>
        @else
            <li class="waves-effect">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <i class="material-icons">chevron_left</i> 
                </a>
            </li>
        @endif

        {{-- Elementos de la Paginacion --}}
        @foreach ($elements as $element)
            
            @if (is_string($element))
                <li class="disabled" aria-disabled="true">{{ $element }}</li>
            @endif

            {{-- Arreglo de Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><a href="#">{{ $page }}</a></li>
                    @else
                        <li class="waves-effect"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Siguiente Pagina de Link --}}
        @if ($paginator->hasMorePages())
            <li class="waves-effect">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <i class="material-icons">chevron_right</i>
                </a>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a href="#">
                    <i class="material-icons">chevron_right</i>
                </a>
            </li>
        @endif
    </ul>
@endif