<!DOCTYPE html>
<html>
<head>
   <title>The OpperBlog</title>
   <meta name='viewport' content='width=device-width, initial-scale=1'/>
   <link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.min.css'/>
   <link rel='stylesheet' type='text/css' href='blog_style.css'/>
   <link rel='stylesheet' media='screen and (max-device-width: 768px)'/>
</head>
<body>
   <?php include_once("../analyticstracking.php") ?>

   <!-- The Header should go here, code background, "The Blog" title -->
   <!-- NavBar is on the side? Either that or list of blog titles -->
   <header>
      <h1>The OpperBlog</h1>
   </header>
   <br/><br/>
   <div class='container'>
      <div class='row'>
         <div class='tiny col-md-4 well' id='info_pane'>
            <!-- Nav or description goes here -->
            <img id='personal_picture' src='me.png'/>
            <h3>Chris Opperwall</h3>
<!--            <a id='twitter_link' target='_blank' href='http://twitter.com/copperwall'>@copperwall</a> -->
            <a href="https://twitter.com/copperwall" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @copperwall</a>
            <br/>
            <h4>Hey!</h4>
            <p>
               I like to push my thoughts here every once in a while. I normally like to post about how my software projects are going, or anything else that I feel compelled to write about.</p>
            <p> I prefer to spend my time reading what ever people have written, so I try to only post opinion pieces if I feel rather confident on the subject. If you like (or have criticisms on) a particular post or article, let me know! I would really appreciate any feedback you could give.
            </p>
         </div>
         <div class='col-md-8' id='content_pane'>
            <div id='all_posts'>
               <?php include('get_posts.php') ?>
            </div>
            <div class='row'>
               <div id='moar_posts' class='post well lead' onclick='moar_posts()'>Moar Posts</div>
            </div>
            <br/><br/>
         </div>
      </div>
   </div>

   <!-- Defer JS for faster pageload -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
   <script type='text/javascript' src='ajax.js'></script>

   <!-- Twitter API scripts -->
   <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>
</html>
