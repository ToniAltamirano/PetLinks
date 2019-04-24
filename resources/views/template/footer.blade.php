<footer class="bg-dark h-100">
        <div class="container-fluid h-100">
            <div id="footer-top" class="row bg-secondary py-1">
                    <div id="header_wrapper">
                        <div id="inner_header_wrapper">
                            <div class="social-icons">
                                <ul class="social-icons">
                                    <li>
                                        <a class="fa fa-facebook-f ml-2" href="http://www.facebook.com/protectoramataro" target="_blank" rel="noopener noreferrer" aria-label="{{ __('footer.facebook_aria-label') }}"></a>
                                    </li>
                                    <li>
                                        <a class="fa fa-twitter ml-2" href="http://www.twitter.com/protemataro" target="_blank" rel="noopener noreferrer" aria-label="{{ __('footer.twitter_aria-label') }}"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-11 mx-auto h-100 pt-3">
                <div id="footer-mid" class="row">
                    <div class="col-sm-6 col-md-2 mt-2 text-center text-md-left">
                        <h3>{{ __('footer.contact_header') }}</h3>
                        <ul class="m-0 pl-1">
                            <li><a href="{{ url('info/centres') }}">{{ __('footer.address') }}</a></li>
                            <li><a href="{{ url('info/horaris') }}">{{ __('footer.schedule') }}</a></li>
                            <li><a href="{{ url('info/contacta') }}">{{ __('footer.contact') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-2 mt-4 mt-md-2 text-center text-md-left">
                        <h3>{{ __('footer.about_header') }}</h3>
                        <ul class="m-0 pl-1">
                            <li><a href="{{ url('info/spam') }}">{{ __('footer.spam') }}</a></li>
                            <li><a href="{{ url('multimedia/video ') }}"> Video </a></li>
                            <li><a href="{{ url('info/daina') }}">{{ __('footer.daina') }}</a></li>
                            <li><a href="{{ url('info/macropadrins') }}">{{ __('footer.macropadrins') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 offset-md-2 mt-4 mt-md-3 h-100 w-100 text-center">
                        <a href="{{ url('/') }}" class="w-100 mx-auto">
                            <img class="mx-auto" src="{{ asset('img/spam_logo_blanco.png') }}" alt="LOGO" width="180" height="180">
                        </a>
                    </div>
                </div>
            </div>
            <div id="footer-bottom" class="row mt-4">
                <p class="col-6 ml-5 font-weight-light">{{ __('footer.fotografies') }}<a href="https://www.facebook.com/antuablondephotography" target="_blank" rel="noopener noreferrer">Antuà Blonde Photografy </a>
                    {{ __('footer.fotografies_2') }}
                        <br>
                        {{ __('footer.fotografies_3') }}
                    <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" target="_blank" rel="noopener noreferrer">{{ __('footer.license') }}</a>
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
