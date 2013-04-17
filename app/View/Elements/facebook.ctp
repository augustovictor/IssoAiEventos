<?php
Configure::load('facebook');
$app_id = Configure::read('Facebook.appId');
//$app_id = $configs['appId'];
?>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        // init the FB JS SDK
        FB.init({
            appId: '<?= $app_id ?>', // App ID from the app dashboard
            channelUrl: '<?= FULL_BASE_URL ?>/channel.php', // Channel file for x-domain comms
            status: true, // Check Facebook Login status
            xfbml: true                                  // Look for social plugins on the page
        });

        // Additional initialization code such as adding Event Listeners goes here
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                FB.api('/me/picture', function(response) {
                    $('#profile_picture').attr('src', response.data.url);
                });
            } else if (response.status === 'not_authorized') {
                // not_authorized
            } else {
                // not_logged_in
            }
        });
    };

    // Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/pt_BR/all.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function ajaxLogin(response) {
        $.ajax({
            type: 'post',
            url: '<?= $this->Html->url(array('controller' => 'participantes', 'action' => 'login'), true); ?>',
            data: {userID: response.authResponse.userID}
        }).success(function(resp) {
            window.location = resp;
        });
    }

    $(function() {
        $('#participante_login_link').click(function() {
            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    ajaxLogin(response);
                } else {
                    FB.login(function(resp) {
                        if (resp.authResponse) {
                            ajaxLogin(resp);
                        }
                    });
                }
            });
        });
    });
</script>