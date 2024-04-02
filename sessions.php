<?php
/**
 * COOKIES and SESSIONS
 * 
 * The web is designed to be stateless.  After each transaction between the web client and a web server, the connection is terminated, and the neither the client or the server have any recollection of what just happend.  Each new request is handled as a completely new request.  this works well for static websites, but not when you need to track a user, like during a banking app for example.
 * 
 * Cookies and sessions are used to let programs remember past requests.  Cookies are small bits of data stored on the users browser, while sessions can handle much larger amounts of data and store information on the server.  Cookies and sessions are used in conjunction to save application state across multiple requests.
 * 
 * COOKIES
 * Cookies are small packets of information stored on the brower.  It is persistent, meaning it is maintained between page loads and even browsing sessions.  Depending on the expiration date set on them, we will even last after you shut your computer off.  You can see all of the cookies stored in your browser right now.
 * 
 * open up your console (right click the web page and click inspect on the sub menu.  or press f12).  Click on Application, then expand the Cookies section. 
 * 
 * Cookies are a text file made up of key=value pairs, often nicknamed 'crumbs'.  A maximum of 20 pairs can be saved to a cookie, and only 1 cookie per website.  Cookies can store any information as long as it stays under the 4kb (4096 bytes) maximum size.  But since they are publicly exposed, should only contain non personal informaiton such as preferences, or the pages visisted on the website.
 * 
 * Cookies can be manually disabled or cleared from modern browsers.  for example in chrome, go to chrome://settings > Privacy and Security 
 * 
 * COOKIES IN PHP
 * It is important to remember that cookies are a part of the http header, and therefore need to be instantiated immediately in a file.  not even a blank linke between the opening php tag and the setcookie() method.
 * 
 * setcookie(
 *     string $name,
 *     string $value = "",
 *     int $expires_or_options = 0,
 *     string $path = "",
 *     string $domain = "",
 *     bool $secure = false,
 *     bool $httponly = false
 * ): bool
 * 
 * $name and $value are the only two required fields
 * $name - the name of the cookie
 * $value - the value for the cookie
 * $expires_or_options - optional values for when this cookie expires.  default is the end of the browsings session (0)
 * $path - optional website path.  default is website root directory (/)
 * $domain - optional.  default is the domain of this current website
 * $secure - optional. determines if the cookies will ONLY be available via https connections. default is false.
 * $httponly - optional. determines if the cookie is accessible ONLY via the http protocol.  meaning scripts are unable to access it.  default is false
 * 
 * IN CLASS EXERCISE
 * 1) create a new php file called cookies.php
 * 2) immediately after your opening PHP tags run the setcookie() method a couple of times.  The $name and $value are up to you.
 * 3) close your PHP tags, and add in some html boilerplate and a hello world message
 * 4) run this script in your test server
 * 5) open your console > application > cookies > http://localhost and take a look at the cookies you have set.  This menu will show you the different parameters such as name, value, domain, path, expires, etc... 
 * 6) edit your cookies to play with the optional parameters of the setcookie() method and take a look at how they change the cookies in your browser.
 * 
 * ACCESSING COOKIES VIA CODE
 * PHP has the $_COOKIE super global that can be accessed inyour code at any time.  
 * update yoru cookie.php file by adding a php script in the html section to print out the $_COOKIE super global
 * 
 * <pre>
 * <?php print_r($_COOKIE);?>
 * </pre>
 * 
 * what happens if you go to a new site and pick up some more cookies?  will this print out ALL of the cookies you ahve picked up?  try it out.  navigate to google or facebook, confirm you have new cookies, and then navigate to yoru cookie.php page again.  what happens?
 * 
 * USING COOKIES
 * Lets go ahead and start using some cookies.  The $_COOKIE super gloabl is an array, which means we can access it's elements to use in our code.  So lets make some changes.  
 * 
 * 1) At the top of your code, lets get rid of the second setcookie() call, and chnge the first one to setcookie('user', '{your name}').
 * 2) in your html get rid of the <pre> tags and the print statement.  Lets preplace it with 
 * 
 *      <p> Hello <?= $_COOKIE['user']?></p>
 * 
 * 3) refresh your page.  what happens?  
 * 
 * Notice that the user cookie was set.  You can see that in your console, but you get a warning "undefined array key 'user' ..." this is because even though you have set the cookie, the cookie doesn't actually become available until the next page load.  Go ahead an refresh your page, the warning is gone and the cookie is now available.  This is something to be careful of when you are using and setting cookies. 
 * 
 * IN CLASS ACTIVITY
 * 1) create 2 new files.  login.php and admin.php
 * 2) in login.php create a simiple login form with a field for username, password, and submit.  Leave the action blank (defaults to current page) and set the method to POST since we are dealing with sensitive info
 * 3) confirm  your login page works by checking for the presence of the $_POST['username] varaible, and then echoing it out onto the screen.  either a simple echo, or inside an <h1> welcome {username} </h1> message.
 * 4) lets update our code.  Inside of the block that checks for the $_POST['username] lets add the stecookie() method so we can set the user cookie and set it equal to the username.
 * 5) Now lets update the welcome message from above.  instead of basing the welcome message on the $_POST['username], base it on the $_COOKIE['user'].
 * 6) You will notice that you have the same issue that happened earlier.  even though the cookie got set when you checked for the $_POST['username], it isn't available on this page render.  Simply refreshing your page, will solve it this time.  But that is not good behavior for a web page.  Come up with a simple solution to solve that issue
 * NOTE:  when working with and testing cookies, you will want to manually clear your cookies every test.  do this through the console > application ? cookies  panel.  right click your site and select clear from the dropdown.
 * 7) since COOKIES are all about saving state between web pages, lets set that up.  Open your admin.php file and add a PHP section followed by some HTML boilerplate.  
 * 8) In the PHP section run a check for if the $_COOKIE['user'] is set. If it isn't run the following code
 * 
 *      header('location: http://localhost:3000/login.php')
 * 
 * 9) After the if check, set a $user variable to equal $_COOKIE['user'] and create a h1 tag in the html to display a welcome message to the the user.  Something like <h1> Wlecome to the admin area <?= $user ?></h1>
 * 10) go back to your login.php page and add the following code to the block where you check to see if the $_POST['username'] is set.  It should go right after you call setcookie();
 *      header('location: http://localhost:3000/admin.php')
 * 
 * 11) clear your cookies and lets try it out.  You may have to do a little debugging, but you have effectively created a log in system.  Of course there is a lot more verification and password checking to do, but this is the basics of it.
 * 
 * SESSIONS
 * Sessions are very similar to cookies but they ar stored on the server instead of the browser.  When using sessions the Session Id is sent to the client as a cookie, but no other information is sent.  The session variables and data are then stored on the server using that session id as a key to the data.  This way, no personal data is being transferred across the connection.  However, that is not to say it is completely safe.  If you dont' log out of a site, anyone who uses your browser is still technically logged in as you and all personal data that you would have access to, they do as well.
 * 
 * SESSIONS IN PHP
 * Just like cookies, you start a php file off with sessions.  no other output can come before it.  The method is session_start().  unlike cookies, we don't have a setsession method, instead we use the $_SESSION array.  
 * 
 * Lets see this in action.  go ahead and remove all of the PHP from your login page.  Lets start fresh.
 * 1) first linke after the opening pohp tag put session_start();
 * 2) open your login.php page, clear out all the cookies, and refresh.  Take a look at your console > application > cookies > localhost:3000  You will see now that you have 1 COOKIE called PHPSESSID.  it is a long alphanumeric string.  perfect
 * 3) lets recreate our check for if the $_POST['username'] is set.  In that block, we will set $_SESSION['user'] = {your name}.  Then update the welcome message to display $_SESSION['user']  instead of the $user variable for now.  Also make sure to udpate the if(isset($user)) check to if(isset($_SESSION['user'])) for now.  What happens?
 * 
 * Correct, unlike with cookies, these variables are available right away after you set them.  But again, the only thing actually sent to the client is yoru session id.  the user value is not sent. 
 * 
 * lets update the login page.
 * 1) just after the session_start() call, do a check for if(isset($_SESSION['user])).  it that is set, then we are already logged in and can skip the login step.  inside the block add the following method 
 * 
 *      header('location: http://localhost:3000/admin.php');
 * 
 * 2) after that check, create another check to see if the $_POST['username'] is set.  if it is, you will want to set the $user, adn the $_SESSION['user'] to the $_POST['username'] value.  then use the same header function as above.  The shorthand is below
 * 
 *      $user = $_SESSION['user'] = $_POST['user'];
 *      header('location: http://localhost:3000/admin.php');
 * 
 * 3) In the admin.php file, we need to make some changes as well.  first, add session_start() right after the opening php tags.
 * 4) updated the COOKIE check to be a SESSION check. and set the user to equal $_SESSION['user'] instead of $_COOKIE['user']
 * 5) Delete your cookies from the browser and test out your new login system.  
 * 
 * BONUS
 * here we simply set the current user ans session user to whatever name was passed in from the login form. Now obviously that is no buneo.  Ideally, when the login form is submitted, you would query your databse to see if the username exists, and if the password (password hash) matches what you have stored in the database.  For some bonus work and practice, set this up.  create a method that will take in a username, and password, and then query your database for that user, and compare if the password supplied matches what is in the database. This method should return true / false depending on the outcome.  Once the method returns true, then the session['user'] or a global user variable can be set.  If it returns false, maybe a try again error message pops up for the user. 
 */