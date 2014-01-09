function moar_posts() {

   if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
   }
   else {
      alert('Please update your browser to IE7+, Chrome, Firefox, Safari, Opera, etc.');
   }

   xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
         var min_post = document.getElementById('min_post').innerHTML;
         var moar_posts_button = document.getElementById('moar_posts');
         var last_post_counter = document.getElementById('last_post_made');
         var all_posts = document.getElementById('all_posts');
         var top_post = document.getElementById('current_top_post');

         last_post_counter.parentNode.removeChild(last_post_counter);
         top_post.parentNode.removeChild(top_post);

         all_posts.innerHTML = all_posts.innerHTML + "\n" + xmlhttp.responseText;
         
         last_post_counter = document.getElementById('last_post_made');
         
         if (min_post == last_post_counter.innerHTML) {
            moar_posts_button.parentNode.removeChild(moar_posts_button);
         }

         var $body = $('html, body');
         var $top_post = $('#current_top_post');

         $body.animate({
            scrollTop: $top_post.offset().top - 30
         }, 400);
      }
   }

   // Get lowest post id placed in html somewhere or something
   lastPostId = document.getElementById('last_post_made').innerHTML;

   //alert("Fetching next two posts with id's less than " + lastPostId);
   xmlhttp.open("GET","get_posts.php?q="+lastPostId,true);
   xmlhttp.send();

}
