@if ($paginator->hasPages()	)
    <ul class="pagination">

        @if ($paginator->onFirstPage()	)

        @else
            <li><a href="{{ $paginator->previousPageUrl()	 }}" aria-label="Previous"><span aria-hidden="true"><i class="ti-arrow-left"></i></span></a></li>
        @endif

        @foreach ($elements as $element)

            @foreach ($element as $pages => $url)
                @if ($paginator->currentPage() == $pages 	)
                    <li class="active"><a href="{{ $url }}">{{  $pages }}</a> </li>
                @else
                    <li class=""><a href="{{ $url }}">{{  $pages }}</a> </li>
                @endif
            @endforeach

        @endforeach

        @if ($paginator->hasMorePages()	)
         <li><a href="{{ $paginator->nextPageUrl()	 }}" aria-label="Next"><span aria-hidden="true"><i class="ti-arrow-right"></i></span></a></li>
        @else

        @endif




    </ul>
@else

@endif



