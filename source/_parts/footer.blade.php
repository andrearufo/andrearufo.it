<footer id="footer" class="py-3 border-top">
    <div class="container">

        <div class="row justify-content-between">
            <div class="col-lg-4 col-xl-3">

                <div class="footer-item">
                    <div class="footer-item-title">
                        Contatti
                    </div>
                    <div class="footer-item-content">
                        <ul>
                            <li><a target="_blank" href="mailto:&#105;&#110;&#102;&#111;&#064;&#097;&#110;&#100;&#114;&#101;&#097;&#114;&#117;&#102;&#111;&#046;&#105;&#116;">&#105;&#110;&#102;&#111;&#064;&#097;&#110;&#100;&#114;&#101;&#097;&#114;&#117;&#102;&#111;&#046;&#105;&#116;</a></li>
                            <li><a target="_blank" href="tel:+393386213493">+39 338 62 13 493</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-xl-3">

                <div class="footer-item">
                    <div class="footer-item-title">
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
