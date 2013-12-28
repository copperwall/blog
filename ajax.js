function moarPosts() {

   if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
   }
   else {
      alert('Please update your browser to IE7+, Chrome, Firefox, Safari, Opera, etc.');
   }

   xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
         var minPost = document.getElementById('minPost').innerHTML;
         var moarPostsButton = document.getElementById('moarPosts');
         var lastPostCounter = document.getElementById('lastPostMade');
         var all_posts = document.getElementById('all_posts');
         var top_post = document.getElementById('current_top_post');

         lastPostCounter.parentNode.removeChild(lastPostCounter);
         top_post.parentNode.removeChild(top_post);

         all_posts.innerHTML = all_posts.innerHTML + "\n" + xmlhttp.responseText;
         
         lastPostCounter = document.getElementById('lastPostMade');
         
         if (minPost == lastPostCounter.innerHTML) {
            moarPostsButton.parentNode.removeChild(moarPostsButton);
         }

         var $body = $('html, body');
         var $top_post = $('#current_top_post');

         $body.animate({
            scrollTop: $top_post.offset().top - 30
         }, 400);
      }
   }

   // Get lowest post id placed in html somewhere or something
   lastPostId = document.getElementById('lastPostMade').innerHTML;

   //alert("Fetching next two posts with id's less than " + lastPostId);
   xmlhttp.open("GET","getPosts.php?q="+lastPostId,true);
   xmlhttp.send();

}
