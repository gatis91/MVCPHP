
<div>
    <div class="row">
        
        <div class="col-md-3 ">
            
            <div class="list-group">
                <a href="<?php echo ROOT_URL?>/shares"  class="list-group-item list-group-item-action">All Categories</a>
                <?php foreach($viewmodel[1] as $cat) : ?>
                <a href="<?php echo ROOT_URL.'/shares/posts/'.$cat['id'] ?>"  class="list-group-item list-group-item-action
                <?php echo $viewmodel[0][0]["name"]==$cat['name'] ? "active" : ""; ?>"><?php echo $cat["name"] ?></a>

                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-9">

            <?php foreach($viewmodel[0] as $item) : ?>
            <div class="card" style="width:100%;">
                <img  class="card-img-top" src="<?php echo ROOT_URL.$item["image"]; ?>" alt="Card image">
                <div class="card-body">

                    <h4 class="card-title"><?php echo $item["title"] ?></h4>
                    
                    <p class="card-text"><?php  echo substr($item["body"], 0, 100); ?></p>
                    <p class="small text-muted float-right">Created at <?php echo $item["created_at"] ?></p>  
                    <a href="<?php echo ROOT_URL.'/shares/singleView/'.$item['id'] ?>"  target="_blank" class="">read more</a>
                </div>
            </div>
            
            <hr>
        <?php endforeach; ?>
        </div>

    </div>

</div>