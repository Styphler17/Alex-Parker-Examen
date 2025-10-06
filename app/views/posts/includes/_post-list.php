<?php foreach ($posts as $post): ?>
    <!-- Blog Post Start -->
    <div class="col-md-12 blog-post">
        <div class="post-title">
            <a href="<?php echo BASE_URL; ?>posts/<?php echo $post['id']; ?>/<?php echo \Core\Helpers\slugify($post['title']); ?>.html">
                <h1><?php echo $post['title']; ?></h1>
            </a>
        </div>
        <div class="post-info">
            <span><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span> | <span><?php echo $post['category']; ?></span>
        </div>
        <p><?php echo \Core\Helpers\excerpt($post['text']); ?></p>
        <a href="<?php echo BASE_URL; ?>posts/<?php echo $post['id']; ?>/<?php echo \Core\Helpers\slugify($post['title']); ?>.html" class="button button-style button-anim fa fa-long-arrow-right"><span>Read More</span></a>
    </div>
    <!-- Blog Post End -->
<?php endforeach; ?>