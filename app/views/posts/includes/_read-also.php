<!-- Endpage Box (Popup When Scroll Down) Start -->
<div id="scroll-down-popup" class="endpage-box">
    <h4>Read Also</h4>
    <a href="posts/<?php echo $post['id']; ?>/<?php echo \Core\Helpers\slugify($post['title']); ?>.html"><?php echo \Core\Helpers\truncate($post['title'], 60); ?></a>
</div>
<!-- Endpage Box (Popup When Scroll Down) End -->
