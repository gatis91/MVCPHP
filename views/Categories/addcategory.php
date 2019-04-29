<div class="card " >
  <div class="card-header">
    Add Cotegory
  </div>
    <div class="p-1">
    <form method="POST" enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="category" name="category" placeholder="category">
        </div>
        
        <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">Add Category</button>
        <a class="btn btn-danger" href="<?php echo ROOT_URL ?>/shares"> Cancel</a>
    </form>
    </div>
</div>