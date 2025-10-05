<form action="<?php echo BASE_URL; ?>posts/add/insert.html" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="text">Text</label>
        <textarea class="form-control" id="text" name="text" rows="10" required></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image (filename)</label>
        <input type="text" class="form-control" id="image" name="image" placeholder="e.g. 1.jpg">
        <small class="form-text text-muted">Or upload an image file below.</small>
    </div>
    <div class="form-group">
        <label for="image_file">Upload Image</label>
        <input type="file" class="form-control" id="image_file" name="image_file" accept="image/*">
    </div>
    <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" id="category_id" name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="quote">Quote</label>
        <textarea class="form-control" id="quote" name="quote" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Post</button>
</form>