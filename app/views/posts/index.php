 
<!-- Blog Post (Right Sidebar) Start -->
<div class="col-md-9">
    <div class="col-md-12 page-body">
        <div class="row">
            <div class="col-md-12 content-page">
                <!-- ADD A POST -->
                <div>
                    <a href="posts/add/form.html" type="button" class="btn btn-primary">Add a Post</a>
                </div>
                <!-- ADD A POST END -->

                <!-- Post Lists -->
                <?php include_once '../app/views/posts/includes/_post-list.php'; ?>

                <!-- Pagination -->
                <?php include_once '../app/views/posts/includes/_pagination.php'; ?>

            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <?php include_once '../app/views/template/partials/_footer.php'; ?>
    <!-- Footer End -->
</div>
<!-- Blog Post (Right Sidebar) End -->