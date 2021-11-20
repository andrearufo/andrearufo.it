<header class="sticky-top py-2 border-bottom">
    <div class="container">

        <div class="row align-items-center justify-content-between">
            <div class="col-auto col-logo">

                <a href="/">
                    <i class="fak fa-ar fa-lg text-secondary"></i>
                </a>

            </div>
            <div class="col-auto col-hamburger text-end d-lg-flex d-none">

                <div id="desktopmenu">
                    @include('_parts.menu')
                </div>

            </div>
            <div class="col-auto col-hamburger text-end d-lg-none d-flex">

                <button class="btn btn-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilemenu" aria-controls="mobilemenu">
                    <i class="fal fa-bars fa-lg"></i>
                </button>

            </div>
        </div>

    </div>
</header>

<div class="offcanvas offcanvas-end" tabindex="-1" id="mobilemenu" aria-labelledby="mobilemenu">
    <div class="offcanvas-header">

        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>

    </div>
    <div class="offcanvas-body">

        @include('_parts.menu')

    </div>
</div>
