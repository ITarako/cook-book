<nav aria-label="breadcrumb" class="mt-3">
    <ol class="breadcrumb">
        @if ($breadcrumbs)
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Домой</a></li>
        @endif
        @foreach ($breadcrumbs as $item)
            @if (!$loop->last)
                <li class="breadcrumb-item"><a href="{{ $item['url'] }}">{{ $item['title'] }}</a></li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $item['title'] }}</li>
            @endif
        @endforeach
    </ol>
</nav>
