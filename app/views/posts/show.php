<?php include_once '../app/views/template/partials/_head.php'; ?>
<?php include_once '../app/views/template/partials/_sidebar.php'; ?>

<!-- Blog Post (Right Sidebar) Start -->
<div class="col-md-9">
    <div class="col-md-12 page-body">
        <div class="row">
            <div class="col-md-12 content-page">
                <!-- Blog Post Start -->
                <div class="sub-title">
                    <a href="<?php echo BASE_URL; ?>" title="Go to Home Page">
                        <h2>Back Home</h2>
                    </a>
                    <a href="#comment" class="smoth-scroll"><i class="icon-bubbles"></i></a>
                </div>

                <div class="col-md-12 content-page">
                    <div class="col-md-12 blog-post">
                        <?php if (!empty($post['image'])): ?>
                            <div>
                                <img src="<?php echo ASSETS_URL; ?>template/images/blog/<?php echo $post['image']; ?>" alt="" class="img-responsive">
                            </div>
                        <?php endif; ?>

                        <!-- Post Headline Start -->
                        <div class="post-title">
                            <h1><?php echo $post['title']; ?></h1>
                        </div>
                        <!-- Post Headline End -->

                        <!-- Post Detail Start -->
                        <div class="post-info">
                            <span><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span> | <span><?php echo $post['category']; ?></span>
                        </div>
                        <!-- Post Detail End -->

                        <p><?php echo $post['text']; ?></p>

                        <?php if (!empty($post['quote'])): ?>
                            <!-- Post Blockquote (Italic Style) Start -->
                            <blockquote class="margin-top-40 margin-bottom-40">
                                <p><?php echo $post['quote']; ?></p>
                            </blockquote>
                            <!-- Post Blockquote (Italic Style) End -->
                        <?php endif; ?>

                        <!-- Post Buttons -->
                        <div>
                            <a href="<?php echo BASE_URL; ?>posts/<?php echo $post['id']; ?>/<?php echo \Core\Helpers\slugify($post['title']); ?>/edit/form.html" type="button" class="btn btn-primary">Edit Post</a>
                            <a href="<?php echo BASE_URL; ?>posts/<?php echo $post['id']; ?>/<?php echo \Core\Helpers\slugify($post['title']); ?>/delete.html" type="button" class="btn btn-secondary" role="button" onclick="return confirm('Are you sure?')">Delete Post</a>
                        </div>
                        <!-- Post Buttons End -->
                    </div>
                </div>
                <!-- Blog Post End -->
            </div>
        </div>
    </div>
    <!-- Footer Start -->
    <?php include_once '../app/views/template/partials/_footer.php'; ?>
</div>
<!-- Blog Post (Right Sidebar) End -->

<?php include_once '../app/views/posts/includes/_read-also.php'; ?>

<?php include_once '../app/views/template/partials/_scripts.php'; ?>