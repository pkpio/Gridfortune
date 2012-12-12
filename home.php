
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId  : '181323078583708',
      status : true, // check login status
      cookie : true, // enable cookies to allow the server to access the session
      xfbml  : true  // parse XFBML
    });
  };

  (function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
  }());
</script>

<script type="text/javascript">
function newInvite(){
     FB.ui({ method: 'apprequests',
          message: 'I use this app to play sports at IITB. Come join me at http://apps.facebook.com/spatchaker/'});
    }
</script>

<p>Hello <?php echo $user_profile['name']; ?> !</p>
<p>If you're new here, start by filling in <a href="edit_profile.php">your details</a>.</p>
<p>Set up a match <a href="matchcenter.php">here</a>.</p>
<p>Ask your Facebook friends to start using the app <a href="#" onClick="newInvite(); return false;">here</a>.</p>
<p></p>
