<div id="main">
    <div class="container">
        <div class="row">
            <!-- About Me (Left Sidebar) Start -->
            <?php include_once '_sidebar.php'; ?>
            <!-- About Me (Left Sidebar) End -->

            <!-- Blog Post (Right Sidebar) Start -->
            <div class="col-md-9">
                <div class="col-md-12 page-body">
                    <div class="row">
                        <div class="col-md-12 content-page">
                            <!-- ADD A POST -->
                            <div>
                                <a href="/posts/add/form.html" type="button" class="btn btn-primary">Add a Post</a>
                            </div>
                            <!-- ADD A POST END -->
                            <?php include_once '../app/views/posts/includes/_posts-list.php'; ?>
                            <!-- Pagination -->
                            <?php include_once '../app/views/posts/includes/_pagination.php'; ?>
                        </div>
                    </div>
                </div>

                <!-- Footer Start -->
                <php include_once '_footer.php' ; ?>
            </div>
            <!-- Blog Post (Right Sidebar) End -->
        </div>
    </div>

</div>