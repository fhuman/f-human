<div class="welcome-wrap">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <!--
                    * this is my bad habit to comment around, here and there!
                    * the plan is to do proper welcome to the visitor...
                    * to do so, the first thing we must know is-
                    * "whether s/he is a first time visitor, or, returning"
                    * simplest way is to use Cookies!
                    * thanks a lot to javaScript and a bit of jQuery for saving our ass finishing hassles
                        of such Cookie needing cases!
                    * this is intorduction, comments can guide through the actual system this website is-
                        running on, based on, developed on, and whatever that requires the word 'ON'
                -->

                <!-- if the visitor is here for the first time: -->
                <!-- draw the wrapper, of-course -->
                <div id="new-comer">
                    <h2>
                        Hey There,
                        <br>
                        This is your very first visit in our site.
                        <br>
                        Please start by typing your name...
                    </h2>
                    <!-- how to get username? -->    
                    <div class="input-field col s6">
                        <!-- an Input field where user can input their name(s) -->
                        <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                        <!-- lavel for the input field -->
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s3">
                        <!-- and the action button! it is able to-
                             prevent you and/or guide you to the next 
                              next level -->
                        <a class="waves-effect waves-light btn" id="cookie-action">
                            <i class="material-icons right">cloud</i>
                            Let me in, please!
                        </a>
                    </div>
                </div>
                
                
                      
                <div id="old-pal">
                    <!-- and if s/he is returning, let's welcome 
                        * the id="theName" is calling the variable in function,
                        * and gets the theName value as userName from the-
                        * rest of the function
                        * *** functions are defined below, also with comments
                    -->
                    <h1>Welcome <span id="theName"></span></h1>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    /*
    * function to set Cookie
    * very basic Cookie, just to get the name from UserInput
    * and an expiration date for the cookie
    */
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }
    /*
    * function to get Cookie
    * it will check for existing cookies
    * and return asked value
    */
    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1);
            if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
        }
        return "";
    }
    /*
    * both functions (set & get) runs behind the scene
    * but this checkCookie will run onScreen
    * this will return an welcome screen
    * if the user is a first time visitor, ask his/her name
    * and if user is just returned, welcome him/her
    */
    function checkCookie() {
        // define how to get the name
        var user = getCookie("username");
        // if the user is not NULL/returned, welcome him/her
        if (user != "") {
            // no need to show userInput as s/he is existing
            $("#new-comer").hide();
            // show actual welcome screen
            $("#old-pal").show();
            // and the name we just defined above
            $("#theName").text(user);
        //and if this is first time
        } else {
            // show userInput as this the first visit
            $("#new-comer").show();
            // we don't have the name yet, s o hide the actual welcome screen
            $("#old-pal").hide();
            // and things will happen right after user clicks the button in userInput
            $("#cookie-action").click(function () {
                // grab the value from user input
                var userName = $("#first_name").val();
                // check if the user input has NO value and return warning
                if (userName == null || userName == "") {
                    alert("failed");
                // and if user input has a value, call the setCookie function
                } else {
                    setCookie("username", userName, 365);
                    // cookieSet is done, return to the existing user's welcome screen
                    // and so, hide userInput page
                    $("#new-comer").hide();
                    /* 
                    * again, get the cookie name
                    * it requries reloading the whole page
                    * instead, let's define the username again
                    * it doesn't require refreshing the whole page
                    */
                    var userRefresh = getCookie("username");
                    // show the actual welcome screen
                    $("#old-pal").show();
                    // show the username
                    $("#theName").text(userRefresh);
                }
            });
        }
    }
    
    $(document).ready(function () {
        // call the checkCookie function
        checkCookie();
    });
</script>
