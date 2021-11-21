<!DOCTYPE html>
<html lang="{{ $page->language ?? 'it' }}">
<head>

    @include('_parts.meta')

</head>
<body>

    @include('_parts.header')

    <main class="py-3">
        <div class="container">

            <section class="{{ $page->getFilename() }}">

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">

                        <small class="text-muted">
                            {{ $page->anno }}
                            @if($page->cliente)
                                ― per {{ $page->cliente }}
                            @endif
                        </small>
                        <h1>{{ $page->title }}</h1>

                    </div>
                </div>

                @if( $page->image )
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-10">

                            <div class="mb-5">
                                <img src="/assets/images/portfolio/{{ $page->image }}" class="w-100">
                            </div>

                        </div>
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">

                        @yield('body')

                        {{-- <?php if (get_field('note')): ?>
                            <h5 class="mb-0 mt-4 d-inline me-1">Note</h5>
                            <?php the_field('note') ?>
                        <?php endif; ?> --}}

                        {{-- <?php if ($skills = get_field('skills')): ?>
                            <ul class="tags">
                                <?php foreach ($skills as $skill) : ?>
                                    <li>
                                        <span><?php echo $skill ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?> --}}

                        {{-- <?php if (get_field('minore')): ?>
                            <hr>
                            <small class="text-muted">Progetto minore o discontinuato. Potrebbe non essere più presente online o essere stato modificato.</small>
                                <?php endif; ?> --}}

                    </div>
                </div>

            </section>

        </div>
    </main>

    @include('_parts.footer')

</body>
</html>
