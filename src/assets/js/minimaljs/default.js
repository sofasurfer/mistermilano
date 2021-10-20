    
    /*

        General global functions

    */
   
    function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }

    function setCookie(key, value) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString()+"; path=/";
    }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }




    /*

        When page is loaded

    */

    $(function() {

        /*
            Cookie Disclaimer
        */
        if ( !getCookie('cookiebanner') ) {
            $('#cookie-notice').show();
            $('#accept-cookie-notice').click(function(event){
              event.preventDefault();
              setCookie('cookiebanner','TRUE');
              $('#cookie-notice').hide();
            });
        }


    });
