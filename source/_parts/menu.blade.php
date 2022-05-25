<ul class="menu">
    @foreach ($page->menu as $menu)
        <li class="menu-item {{ $page->selected($menu['url']) }}" data-url="{{ $menu['url'] }}" data-path="{{ $page->getPath() }}">
            <a href="{{ $page->baseUrl . $menu['url'] }}">
                {{ $menu['label'] }}
            </a>
        </li>
    @endforeach
</ul>
