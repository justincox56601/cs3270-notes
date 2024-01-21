<?php
/**
 * Let's take a break today from digging into php, and use what we know to create a website.
 * 
 * Creat a new folder and call it whatever you want.
 * inside of that folder create an index.php and give it basic HTML markup.  Then run it in php 
 * server to make sure everything is working fine.  Notice that php server may serve the wrong file
 * or give you a 404 not found error.  The first thing to do is to check any other open files, and 
 * stop the server in them.  then close all windows that are running one of those pages.  this should
 * reset the working directory for the server. 
 * 
 * 1) give the page a header tag and a main tag inside of the body element
 * 2) create a script.js file and a style.css file and link those to the webpage
 * 3) test the script.js file by using alert('hello from the other side) and making sure it pops up
 * when you load the page
 * 4) test css file by using be background-color property on the body and confirming it changes
 * 5) empty those files and leave them for now
 * 6) inside the main element creat an article element.  inside of that put an image, h2, p,. and a elements
 * 7) create an article title for the h2 element, google a random image for the image element and inside
 * of the <p> element use the command lorem50.  this will gerenate 50 words of Lorem Ipsum text for you. for
 * a tag, create a new php file with the article name and give it some boiler plate. so you can hook up the href
 * 8) add some styling to make the article look better
 * 9) add a header component with an image and an H1 element with the text HOME
 * 10) style the haeder to put the image in the background and the text centered
 * 11) duplicate the article element 3-5 times and update the images, titles, and links
 * 12) now create the header and stylings for your first article 
 * 
 *  this seems like a lot of work, lets refactor.  what is the same on every page and what is different?
 * 
 * 1) lets update our file structure.  there are two common ways to do it.  modules and services (not the offifial names).
 * I tend to prefer to use modules.  In the modules archetecture we have everything needed for a specific module included 
 * in the module eg:
 * -modules
 * --header
 * ---header.view.php
 * ---header.controller.php
 * ---header.service.php
 * --footer
 * ---footer.view.php
 * ---footer.controller.php
 * ---footer.service.php
 * 
 * where as in the services archetecture, we put services, views, and controllers all together
 * -views
 * --header.view.php
 * --foote.view.php
 * -services
 * --header.service.php
 * --footer.service.php
 * 
 * the decision is truly up to you and your employer will already have a set way of doing it do you will just
 * jump in with whatever they are already doing.
 * 
 * start by creating a new folder called src, everything accept index.php, style.css, and script.js, and
 * some config items, will go in here from now on and we will want to import those files.  For the sake of 
 * keeping everyone on the same page, lets go ahead and make 3 new folders inside of the src folder.
 * views, controllers, models
 * 
 * Next, lets take a look at our first page.  lets pull out EVERYTHING that is content and put it into a $data associative array.  
 * what we have left should be basically html template.  This HTML markup is what we can put into our views.  SO make a new file
 * in the views directory called header.view.php. and in there lets place all of our header markup.
 * 
 * once that is done, we can remove the header from our home page, and use the include_once() method to include the header
 * template into our current page.  Once we have that done, lets look to see where else we can refactor code to make our pages
 * cleaner.
 */
?>