 
<!-- Blog Post (Right Sidebar) Start -->
<div class="col-md-9">
    <div class="col-md-12 page-body">
        <div class="row">
            <div class="col-md-12 content-page">
                <div class="col-md-12 blog-post">
                    <h2>Edit post</h2>
                    <form action="<?php echo BASE_URL; ?>posts/<?php echo $post['id']; ?>/<?php echo \Core\Helpers\slugify($post['title']); ?>/edit/update.html" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $post['title']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Text</label>
                            <textarea class="form-control" id="text" name="text" rows="10" required><?php echo $post['text']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image (filename)</label>
                            <input type="text" class="form-control" id="image" name="image" value="<?php echo $post['image'] ?? ''; ?>" placeholder="e.g. 1.jpg">
                        </div>
                        <div class="form-group">
                            <label for="image_file">Upload New Image</label>
                            <input type="file" class="form-control" id="image_file" name="image_file" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $post['category_id']) ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quote">Quote</label>
                            <textarea class="form-control" id="quote" name="quote" rows="3"><?php echo $post['quote']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Post</button>
                    </form>
                </div>
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