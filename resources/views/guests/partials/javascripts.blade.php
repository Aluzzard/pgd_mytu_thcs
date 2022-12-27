<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src="{{ asset('assets/guests/'.$information_website->theme.'/mainstructure/js/bootstrap/bootstrap.min.js') }}"></script>
<!-- <script src="{{ asset('assets/guests/'.$information_website->theme.'/js/jquery/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('assets/guests/'.$information_website->theme.'/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/guests/'.$information_website->theme.'/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/guests/'.$information_website->theme.'/js/plugins.js') }}"></script>
<script src="{{ asset('assets/guests/'.$information_website->theme.'/js/active.js') }}"></script> -->
<script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>
<!-- <script src="{{ asset('assets/guests/default/modules/UIDetailImageLibrary/owl.carousel.min.js') }}"></script> -->

<!-- Share facebook -->
    <!-- Messenger Chat Plugin Code -->
    <!-- <div id="fb-root"></div> -->
    <!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="r0pRVkT1"></script> -->

    <!-- Your Chat Plugin code -->
    <!-- <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "813298132134439");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v13.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script> -->
<!-- End share facebook -->
@yield('scripts')
@include('modules.UIDropdownMenu.javascripts')
@include('modules.UIRealDateTime.javascripts')
@include('modules.UIImageLibrary.Detail.javascripts')
@include('modules.UIContactUs.javascripts')
@include('modules.UIVideoYoutube.javascripts')