<?php foreach ($posts as $post): ?>
    <!-- Blog Post Start -->
    <div class="col-md-12 blog-post">
        <div class="post-title">
            <a href="posts/<?php echo $post['id']; ?>/<?php echo \Core\Helpers\slugify($post['title']); ?>.html">
                <h1><?php echo $post['title']; ?></h1>
            </a>
        </div>
        <p><?php echo \Core\Helpers\excerpt($post['text']); ?></p>
    <a href="posts/<?php echo $post['id']; ?>/<?php echo \Core\Helpers\slugify($post['title']); ?>.html" class="button button-style button-anim fa fa-long-arrow-right"><span>Read More</span></a>
    </div>
    <!-- Blog Post End -->
<?php endforeach; ?>