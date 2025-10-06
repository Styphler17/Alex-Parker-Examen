 
<!-- Blog Post (Right Sidebar) Start -->
<div class="col-md-9">
    <div class="col-md-12 page-body">
        <div class="row">
            <div class="col-md-12 content-page">
                <div class="col-md-12 blog-post">
                    <h2><?php echo $title; ?></h2>
                    <?php include_once '../app/views/posts/includes/_add-post-form.php'; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <?php include_once '../app/views/template/partials/_footer.php'; ?>
    <!-- Footer End -->
</div>
<!-- Blog Post (Right Sidebar) End -->

<?php include_once '../app/views/template/partials/_scripts.php'; ?>