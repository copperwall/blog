function moar_posts() {

   if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
   }
   else {
      alert('Please update your browser to IE7+, Chrome, Firefox, Safari, Opera, etc.');
   }

   xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
         var min_post = document.getElementById('min_post').innerHTML,
            moar_posts_button = document.getElementById('moar_posts'),
            last_post_counter = document.getElementById('last_post_made'),
            all_posts = document.getElementById('all_posts'),
            top_post = document.getElementById('current_top_post');

         last_post_counter.parentNode.removeChild(last_post_counter);
         top_post.parentNode.removeChild(top_post);

         all_posts.innerHTML = all_posts.innerHTML + "\n" + xmlhttp.responseText;
         
         last_post_counter = document.getElementById('last_post_made');
         
         // Remove "Moar Posts" button if there are no more posts
         if (min_post == last_post_counter.innerHTML) {
            moar_posts_button.parentNode.removeChild(moar_posts_button);
         }
      }
   }

   // Get lowest post id placed in html somewhere or something
   lastPostId = document.getElementById('last_post_made').innerHTML;

   xmlhttp.open("GET","get_posts.php?getId=" + lastPostId,true);
   xmlhttp.send();
}

$(window).scroll(function () {
   if ($(window).scrollTop() + $(window).height() == $(document).height()
      && $('#moar_posts').html()) {
      moar_posts();
   }
});
