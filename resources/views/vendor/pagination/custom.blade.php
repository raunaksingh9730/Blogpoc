@if ($paginator->hasPages())
    <div class="pager justify-content-between">
       
        @if ($paginator->onFirstPage())
            <a class="disabled"><span>← Previous</span></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <a    class="disabled"><span>{{ $element }}</span></a>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active my-active"><span>{{ $page }}</span></a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a>
        @else
            <a class="disabled"><span>Next →</span></a>
        @endif
    </div>
@endif      