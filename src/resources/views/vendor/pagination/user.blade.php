@if ($paginator->hasPages())
<nav class="p-pagination">
    <ul>
        <!-- 前へ移動ボタン -->
        @if ($paginator->onFirstPage())
        <li class="disabled">＜</li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}">＜</a>
        </li>
        @endif

        <!-- ページ番号　-->
        @foreach ($elements as $element)
        @if (is_string($element))
        <li class="disabled">
            {{ $element }}
        </li>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active">
            {{ $page }}
        </li>
        @else
        <li class="active">
            <a href="{{ $url }}">{{ $page }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        <!-- 次へ移動ボタン -->
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}">＞</a>
        </li>
        @else
        <li class="disabled">＞</li>
        @endif
    </ul>
</nav>
@endif