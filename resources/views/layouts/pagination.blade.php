@if ($paginator->hasPages())
    @php $perpage = 20; @endphp
    <div class="d-flex flex-stack flex-wrap pt-10">
        <div class="fs-6 fw-semibold text-gray-700">
        </div>
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item previous disabled">
                    <a href="#" class="page-link">
                        Previous
                    </a>
                </li>
            @else
                <li class="page-item previous">
                    <a href="{{ $paginator->withQueryString()->previousPageUrl() }}" class="page-link">
                        Previous
                    </a>
                </li>
            @endif
            @php
                $start = $paginator->currentPage() - 2;
                $end = $paginator->currentPage() + 2;
                if($start < 1) {
                    $start = 1;
                    $end += 1;
                }
                if($end >= $paginator->lastPage() ) $end = $paginator->lastPage();
            @endphp


            @if($start > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->withQueryString()->url(1) }}">{{1}}</a>
                </li>
                @if($paginator->currentPage() != 4)
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                @endif
            @endif
                @for ($i = $start; $i <= $end; $i++)
                    <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $paginator->withQueryString()->url($i) }}">{{$i}}</a>
                    </li>
                @endfor
            @if($end < $paginator->lastPage())
                @if($paginator->currentPage() + 3 != $paginator->lastPage())
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                @endif
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($paginator->withQueryString()->lastPage()) }}">{{$paginator->lastPage()}}</a>
                </li>
            @endif


            @if ($paginator->hasMorePages())
                <li class="page-item next">
                    <a class="page-link" href="{{ $paginator->withQueryString()->nextPageUrl() }}" >
                        Next
                    </a>
                </li>
            @else
                <li class="page-item next disabled">
                    <a href="#" class="page-link">
                        Next
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif




