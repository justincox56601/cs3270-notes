In this example we have renamed all of the html files to php 
files and have recreated the same website (I literally copy 
and pasted all of the code) but this time we used the power 
of php to refactor everything.

One of the big concepts in development is DRY.  It stands 
for Don't Repeat Yourself.  So the fact that there is a 
lot of copy and paste of code in this project is a prime 
indicator that we will be doing some refacoring

The first thing we do is separate content from structure. You can 
think of the HTML of a page as its structure, and the text inside
of it as the content.  

starting with the main index.php page, we see that we can pull out
things such as teh page title and the list of articles.  Inside of 
each article we can pull out the title, author, image, etc..  All 
of these things can be put into the $data object.  What we are left
with is teh scafolding of the page.  Inside of that scafolding we can 
simply echo out the content that needs to go there.

This may seem like a lot to do to get the same result we used to have, 
but keep in mind, soon all of our page content will come from the
database instead of a hard coded object like it is now.  

Now that we have separated the conent from the structure of the page, we
can see that the header, navigation, and footers of any page on our website 
will always be nearly exactly the same.  This is a good candidate for us
to abstract the <head>, <header> and <nav> elements into their own 
separate view files.  Then we can use the include() and include_once
functions to add those to any page we want.

the advantage to doing this is now we only have to create a single header
file, and any changes we need to make are all located in that single 
file.  We no longer need to copy it all over the place, and will not need 
to hunt all over the place when we need to make changes.

There are 4 files that all have similar functions.  include(), include_once(), 
require(), require_once().  the primary difference between the normal and
once() version is that if we some how manage to accidentally include the same
file a second time, include_once and require_once will on include/require it
the first time.  Incldue and include_once() will give a warning if the requested
file cannot be found.  Where as the requre versions will crash the site.
there are use cases for all of the versions.

Look through the different article pages and you will see that in addition to
the header and footer sections, the main article section was also the same
between articles so we refactored that into it's own article.view.php file.

Once all of the different views are refactored, it is time fix our file
structure into something a bit more organized.  In general, the only files
you want in the main directory are your min index, css, and js file.  everything
else should be in the src directory since they aren't public files.  However, 
in this example we are unable to do that completely, since that would require a setup 
that hasn't been taught in class yet.

If you look, almost every directory has it's own index.php file.  Inside most of 
them is a single command die();  this does exactly what you think it does.  
It kills execution of the file.  remember if someone tries to access a
directory, teh first thing the server will look for is an index file.  if it 
finds one, the server will run it.  if not, depending on the server settings, 
it will show a list of directory files.  This is a security risk, so one of
the ways we can limit this is with teh die() command in places where people 
shouldn't be accessing.

The final part that you may have noticed that hasn't been talked about very
much in class yet is the define(URL_ROOT) and define(APP_ROOT) methods at the 
top of several of the files.  When using relative paths we can easily  do
something like include_once(../../myDirectory).  But once we start abstracting 
our components like we are now, those paths no longer work.  this is because
we can no longer guarantee that the header will be called from a place where
../myDir works.  it may need to use ../../myDir.  To get around this problem
we create a constant that gives the absolute path the the root of our
site / application.  This way we can ALWAYS path from the root to src/myDir/myFile/php
URL_ROOT is used for media, js, css files while the APP_ROOT is used for
your include files.
