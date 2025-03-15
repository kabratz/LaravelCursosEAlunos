<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach ($links as $link)
        @if (!$loop->last)
        <li class="breadcrumb-item">
            <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
        </li>
        @else
        <li class="breadcrumb-item active" aria-current="page">{{ $link['label'] }}</li>
        @endif
        @endforeach
    </ol>
</nav>

<style>
    .breadcrumb {
        display: flex;
        list-style: none;
        padding: 10px;
        background: #f8f9fa;
        border-radius: 5px;
    }

    .breadcrumb-item {
        margin-right: 10px;
    }

    .breadcrumb-item a {
        text-decoration: none;
        color: #007bff;
    }

    .breadcrumb-item a:hover {
        text-decoration: underline;
    }
</style>