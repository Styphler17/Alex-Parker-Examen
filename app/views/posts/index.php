<?php include_once '../app/views/template/partials/_head.php'; ?>
<?php include_once '../app/views/template/partials/_sidebar.php'; ?>

<!-- Blog Post (Right Sidebar) Start -->
<div class="col-md-9">
    <div class="col-md-12 page-body">
        <div class="row">
            <div class="col-md-12 content-page">
                <!-- ADD A POST -->
                <div>
                    <a href="<?php echo BASE_URL; ?>posts/add/form.html" type="button" class="btn btn-primary">Add a Post</a>
                </div>
                <!-- ADD A POST END -->

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

                <!-- Pagination -->
                <?php include_once '../app/views/posts/includes/_pagination.php'; ?>

            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="col-md-12 page-body margin-top-50 footer">
        <footer>
            <ul class="menu-link">
                <li><a href="<?php echo BASE_URL; ?>">My Blog</a></li>
            </ul>

            <p>© Copyright 2016 DevBlog. All rights reserved</p>

            <!-- UiPasta Credit Start -->
            <div class="uipasta-credit">
                Design By
                <a href="http://www.uipasta.com" target="_blank">UiPasta</a>
            </div>
            <!-- UiPasta Credit End -->
        </footer>
    </div>
    <!-- Footer End -->
</div>
<!-- Blog Post (Right Sidebar) End -->

<?php include_once '../app/views/template/partials/_scripts.php'; ?>