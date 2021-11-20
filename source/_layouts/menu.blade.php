<div class="offcanvas offcanvas-end" tabindex="-1" id="menu" aria-labelledby="menu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="menu">
            @foreach ($page->menu as $menu)
                <li class="menu-item">
                    <a href="{{ $page->baseUrl . $menu['url'] }}">
                        {{ $menu['label'] }} ==> {{ $menu['url'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
