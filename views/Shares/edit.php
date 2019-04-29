<div class="card " >
  <div class="card-header">
    Update Post
  </div>
  <?php
     ?>
    <div class="p-1">
    <form method="POST" enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="<?php echo $viewmodel[0]["title"]?>" id="title" name="title" placeholder="title">
        </div>
        <div class="form-group">
            <label for="body">Article</label>
            <textarea class="form-control"  id="body" name="body" rows="6"><?php echo $viewmodel[0]["body"]?></textarea>
        </div>
        <div class="form-group">
        <label for="exampleFormControlSelect1">Choose Category</label>
            <select  name="category_id" class="form-control" id="exampleFormControlSelect1">
            <?php foreach($viewmodel[1] as $item) : ?>
            <option name="category_id" <?php echo $viewmodel[0]["category_id"]==$item["id"] ? "selected" : ""; ?> value="<?php echo $item["id"] ;?>"><?php echo $item["name"] ;?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Add image</label>
            <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
        </div>
        <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">Update post</button>
        <a class="btn btn-danger" href="<?php echo ROOT_URL ?>/shares"> Cancel</a>
    </form>
    </div>
</div>
