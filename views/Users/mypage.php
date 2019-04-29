<h3 class="text-center pb-3"><?php echo $_SESSION["user_data"]["name"] ?> Posts</h3>

<?php if(isset($_SESSION["is_logged_in"])) : ?>
            <a class="btn btn-success btn-share mb-3" href="<?php echo ROOT_URL ?>/shares/add">Create New post</a>
            <a class="btn btn-success btn-share mb-3" href="<?php echo ROOT_URL ?>/categories/addcategory">Create New Category</a>
<?php endif ;?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">title</th>
      <th scope="col">category</th>
      <th scope="col">read</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    
  <?php foreach($viewmodel as $item) : ?>
    <tr>
        <th scope="row"> <?php echo $item["title"]?> </th>
        <td><?php echo $item["name"]?></td>
        <td><a href="<?php echo ROOT_URL.'/shares/singleView/'.$item['id'] ?>"  target="_blank" class="">See full article</a></td>
        <td><a href="<?php echo ROOT_URL.'/shares/edit/'.$item['id'] ?>"  target="_blank" class="">Edit</a></td>
        <td><a href="<?php echo ROOT_URL.'/shares/delete/'.$item['id'] ?>"  target="_blank" class="">Delete</a></td>
    </tr>

<?php endforeach; ?>

  </tbody>
</table>