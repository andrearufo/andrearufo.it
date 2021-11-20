<ul class="menu">
    @foreach ($page->menu as $menu)
        <li class="menu-item">
            <a href="{{ $page->baseUrl . $menu['url'] }}">
                {{ $menu['label'] }}
            </a>
        </li>
    @endforeach
</ul>
