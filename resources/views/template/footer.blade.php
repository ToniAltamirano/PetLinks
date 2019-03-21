<footer class="bg-dark">
        <div class="container-fluid">
            <div id="footer-top" class="row bg-secondary py-1">
                    {{-- <ul class="social-icons">
                        <li><a class="fa fa-rss" href="" target="_blank"></a></li>
                        <li><a class="fa fa-facebook" href="http://www.facebook.com/protectoramataro" target="_blank"></a></li>
                        <li><a class="fa fa-twitter" href="http://www.twitter.com/protemataro" target="_blank"></a></li>
                    </ul> --}}
                    <div id="header_wrapper">
                        <div id="inner_header_wrapper">
                            <div class="social-icons">
                                <ul>
                                    <li><a href="/es/rss.xml"><img src="{{ asset('img/rss.png') }}" alt="RSS Feed"></a></li>
                                    <li><a href="http://www.facebook.com/protectoramataro" target="_blank" rel="me"><img
                                                src="{{ asset('img/facebook.png') }}" alt="Facebook"></a></li>
                                    <li><a href="http://www.twitter.com/protemataro" target="_blank" rel="me"><img
                                                src="{{ asset('img/twitter.png') }}" alt="Twitter"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-11 mx-auto">
                <div id="footer-mid" class="row">
                    <div class="col-sm-6 col-md-2 mt-2 text-center text-md-left">
                        <h3>{{ __('footer.contact_header') }}</h3>
                        <ul class="m-0 pl-1">
                            <li><a href="{{ url('info/adreces') }}">{{ __('footer.address') }}</a></li>
                            <li><a href="{{ url('info/horaris') }}">{{ __('footer.schedule') }}</a></li>
                            <li><a href="{{ url('info/contacta') }}">{{ __('footer.contact') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-2 mt-2 text-center text-md-left">
                        <h3>{{ __('footer.about_header') }}</h3>
                        <ul class="m-0 pl-1">
                            <li><a href="{{ url('info/spam') }}">{{ __('footer.spam') }}</a></li>
                            <li><a href="{{ url('info/daina') }}">{{ __('footer.daina') }}</a></li>
                            <li><a href="{{ url('info/macropadrins') }}">{{ __('footer.macropadrins') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 offset-md-2 d-none d-md-inline-block w-100 h-100 mt-4">
                        <a href="{{ url('/') }}">
                            <img class="mx-auto align-self-middle" src="{{ asset('img/spam_logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div id="footer-bottom" class="row mt-5">
                <p class="col-11 mx-auto font-weight-light">{{ __('footer.fotografies') }}<a href="https://www.facebook.com/antuablondephotography" target="_blank">Antuà Blonde Photografy </a>
                    {{ __('footer.fotografies_2') }}
                        <br>
                        {{ __('footer.fotografies_3') }}
                    <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" target="_blank">{{ __('footer.license') }}</a>
                </p>
                <hr class="col-11 mx-auto bg-white mt-0">
                <div class="col-11 mx-auto row">
                    <div class="col-sm-6">
                        <p>Copyright &copy; 2019 {{ __('footer.copyright') }}</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ url('info/avis-legal') }}">{{ __('footer.legal') }}</a>
                        <a class="ml-4" href="{{ url('info/politica-privacitat') }}">{{ __('footer.privacy') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
