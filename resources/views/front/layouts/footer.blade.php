<footer class="site__footer">
    <div class="site-footer">
        <div class="container">
            <div class="site-footer__widgets">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="site-footer__widget footer-contacts">
                            <h5 class="footer-contacts__title">مبتکران آذر ذهن</h5>
                            <div class="footer-contacts__text" style="text-align: justify">این فروشگاه اینترنتی به مدیریت دکتر علی یزدانی مفتخر است قطعات کامل رباتیک در تبریز را
                                بصورت آنلاین و همچنین حضوری ارائه نماید .</div>
                            <ul class="footer-contacts__contacts">
                                <li><i class="footer-contacts__icon fas fa-globe-americas"></i>
                                    تبریز - چهار راه محققی - پاساژ چهل ستون نو - زیرزمین - پلاک 4
                                </li>
                                <li><i class="footer-contacts__icon far fa-envelope"></i>MazTabriz@gmail.com</li>
                                <li>
                                    <i class="footer-contacts__icon fas fa-mobile-alt">
                                    </i> <span class="ltr_text">(041) 3557 6982</span> --
                                    <span class="ltr_text">09364113060</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2"></div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="site-footer__widget footer-links">
                            <h5 class="footer-links__title">لینک ها </h5>
                            <ul class="footer-links__list">
                                <li class="footer-links__item"><a href="{{route('home')}}" class="footer-links__link">خانه </a>
                                </li>
                                <li class="footer-links__item"><a href="{{route('fag')}}" class="footer-links__link">سوالات شما </a></li>
                                <li class="footer-links__item"><a href="{{route('about')}}" class="footer-links__link">درباره ما</a>
                                </li>
                                <li class="footer-links__item"><a href="{{route('contact')}}" class="footer-links__link">تماس با ما</a></li>
                            </ul>
                        </div>
                    </div>
{{--                    <div class="col-6 col-md-3 col-lg-2">--}}
{{--                        <ul class="footer-newsletter__social-links justify-content-center">--}}
{{--                            <li class="footer-newsletter__social-link footer-newsletter__social-link--facebook"><a--}}
{{--                                    href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>--}}
{{--                            <li class="footer-newsletter__social-link footer-newsletter__social-link--twitter"><a--}}
{{--                                    href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>--}}
{{--                            <li class="footer-newsletter__social-link footer-newsletter__social-link--youtube"><a--}}
{{--                                    href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>--}}
{{--                            <li class="footer-newsletter__social-link footer-newsletter__social-link--instagram"><a--}}
{{--                                    href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>--}}
{{--                            <li class="footer-newsletter__social-link footer-newsletter__social-link--rss"><a href="#"--}}
{{--                                                                                                              target="_blank"><i--}}
{{--                                        class="fas fa-rss"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="site-footer__widget footer-newsletter">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{asset('/front/image/melat.jpg')}}" width="100%" alt="">
                                </div>
                                <div class="col-md-6">
                                    <a referrerpolicy="origin" target="_blank"
                                       href="https://trustseal.enamad.ir/?id=94212&amp;Code=4!vxqK$pSu7MJx57fbix"><img
                                            referrerpolicy="origin"
                                            src="https://Trustseal.eNamad.ir/logo.aspx?id=94212&amp;Code=4!vxqK$pSu7MJx57fbix"
                                            alt="" style="cursor:pointer" id="4!vxqK$pSu7MJx57fbix"></a>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <img src="{{asset('/front/image/logo1.jpg')}}" width="100%" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@yield('js2')

<script src="/front/vendor/jquery-3.3.1/jquery.min.js"></script>
<script src="/front/vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js"></script>
<script src="/front/vendor/owl-carousel-2.3.4/owl.carousel.min.js"></script>
<script src="/front/vendor/nouislider-12.1.0/nouislider.min.js"></script>
<script src="/front/vendor/lightgallery-1.6.12/js/lightgallery.min.js"></script>
<script src="/front/vendor/lightgallery-1.6.12/js/lg-thumbnail.min.js"></script>
<script src="/front/vendor/lightgallery-1.6.12/js/lg-zoom.min.js"></script>
<script src="/front/js/number.js"></script>
<script src="/front/js/main.js"></script>
<script src="/front/vendor/svg4everybody-2.1.9/svg4everybody.min.js"></script>
<script>
    svg4everybody();
    window.setTimeout(function () {
        $(".alert").slideUp(700, function () {
            $(this).remove();
        });
    }, 3000);
    

</script>

@yield('js')


</div>
<!-- site / end -->
</body>

</html>
