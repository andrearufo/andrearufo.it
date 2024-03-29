<footer id="footer" class="py-3 border-top">
    <div class="container">

        <div class="row justify-content-between">
            <div class="col-lg-5 col-xl-4">

                <div class="footer-item">
                    <div class="footer-item-title">
                        Contatti
                    </div>
                    <div class="footer-item-content">
                        <ul>
                            <li><a target="_blank" href="mailto:a.rufo@axio.studio">a.rufo@axio.studio</a></li>
                            <li><a target="_blank" href="tel:+393386213493">+39 338 62 13 493</a></li>
                        </ul>
                    </div>

                    <div class="footer-item-title mt-3">
                        Socials
                    </div>
                    <div class="footer-item-content">
                        <ul>
                            @foreach ($page->socials as $key => $value)
                                <li>
                                    <a target="_blank" href="{{ $value }}">{{ $key }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-lg text-lg-right">

                <div class="footer-item">
                    <div class="footer-item-content">
                        <a href="https://www.iubenda.com/privacy-policy/867456" class="iubenda-black iubenda-embed" title="Privacy Policy ">Privacy Policy</a>
                        <script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
                    </div>

                    <div class="footer-item-content">
                        Tutti i marchi riportati appartengono ai legittimi proprietari; marchi di terzi, nomi di prodotti, nomi commerciali, nomi corporativi e società citati possono essere marchi di proprietà dei rispettivi titolari o marchi registrati d’altre società e vengono utilizzati a puro scopo esplicativo ed a beneficio del possessore, senza alcun fine di violazione dei diritti di Copyright vigenti.
                    </div>

                    <div class="footer-item-content mt-1">
                        <div class="text-muted">
                            <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank" class="text-decoration-none">
                                <i class="fab fa-creative-commons"></i>
                                <i class="fab fa-creative-commons-by"></i>
                                <i class="fab fa-creative-commons-nc-eu"></i>
                                <i class="fab fa-creative-commons-sa"></i>
                                4.0 2021
                            </a>
                            <span class="px-1">©</span>
                            Andrea Rufo
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div id="cookie">
        <div id="cookie-wrapper">
            <div id="cookie-content">
                <i class="fad fa-cookie-bite me-2"></i>
                Questo sito <em>potrebbe</em> usare i cookie
            </div>
            <button id="cookie-ok">Ok</button>
        </div>
    </div>
</footer>

<script defer src="{{ mix('js/main.js', 'assets/build') }}"></script>
<script src="https://kit.fontawesome.com/7319c752cd.js" crossorigin="anonymous"></script>
