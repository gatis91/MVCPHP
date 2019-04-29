<?php


class ShareModel extends Model{
    public function Index(){
        $this->query('SELECT * FROM posts ORDER BY created_at DESC');
        $rows=$this->resultSet();
        return $rows;
    }


    public function checkImage($file_up){
        $defaultFile="/storage/images/default.jpg";
        
        if($file_up["size"]>0){
            $timeIs=date("ymdHis");
            $target_dir = "/storage/images/";
            $file_name=$file_up["name"];
            $file_name_wExt=pathinfo($file_name, PATHINFO_FILENAME);
            $imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
            $file_name=$file_name_wExt."_".$timeIs.".".$imageFileType;
            $target_file = $target_dir . $file_name;
            $upOk=true;
            if ($file_up["size"] > 500000) {
                Messages::setMsg( "Sorry, your file is too large.", "error");
                $upOk=false;
                return;                    
            } 
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                Messages::setMsg("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", "error");
                $upOk=false;
                return;                    
            } 
            if($upOk){
                return $target_file;
            }             
        }else{
             return $target_file=$defaultFile;

        }

    }


    public function validatePost($post){
        if($post['title']==""){
              
            return "Title required";
        }
        if($post['body']==""){
             
            return "main text required";
        }

    }









    public function add(){
        
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        if($post['submit']){
            $target_file=$this->checkImage($_FILES["file"]);
            $errorMSG=$this->validatePost($post);
            if($errorMSG){
                Messages::setMsg($errorMSG, "error");
                return;
            }          
         
            
            $this->query('INSERT INTO posts (title, body, image, category_id, user_id) VALUES(:title, :body, :image, :category_id, :user_id)');
            $this->bind(':title', $post['title']);
            $this->bind(':body', $post['body']);
            $this->bind(':image', $target_file);
            $this->bind(':category_id', $post["category_id"]);
            $this->bind(':user_id', $_SESSION["user_data"]["id"]);
            $this->execute();

            if($this->lastInsertId()){
                move_uploaded_file($_FILES["file"]["tmp_name"], ".".$target_file);
                header('Location: '.ROOT_URL.'/shares');
            }
        }
        return;
    }
    public function singleView($id){
        
        $this->query('SELECT * FROM posts WHERE id=:id');
        $this->bind(':id', $id);
        $row=$this->single();
        return $row;
        
    }
    public function my_posts($user_id){
        
        $this->query('SELECT posts.*, categories.name FROM posts
        INNER JOIN categories On posts.category_id=categories.id
        WHERE user_id=:user_id');
        $this->bind(':user_id', $user_id);
        $rows=$this->resultSet();
        return $rows;
        
    }
    public function delete($post_id, $user_id){
        $this->query('SELECT * FROM posts WHERE id=:id');
        $this->bind(':id', $post_id);
        $row=$this->single();

        if($row["user_id"]==$user_id){
            if($row["image"]!="/storage/images/default.jpg"){
                unlink(".".$row["image"]) ;
            }
           
            $this->query('DELETE FROM posts WHERE id=:id AND user_id=:user_id');
            $this->bind(':id', $post_id);
            $this->bind(':user_id', $user_id);
            $this->execute();
            return;    
        }else{
            return "wrong post";
        }
    }

    public function checkBeforeUpdate($post_id, $user_id){
        $this->query('SELECT * FROM posts WHERE id=:id');
        $this->bind(':id', $post_id);
        $row=$this->single();
        if($row["user_id"]==$user_id){
            return true;
        }else{
            return false;
        }

    }

    public function update($id){
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']){
            if($_FILES["file"]["size"]>0){
                $target_file=$this->checkImage($_FILES["file"]);
                $target_row=$this->singleView($id);
                $old_image=$target_row["image"];
            }else{
                $target_row=$this->singleView($id);
                $target_file=$target_row["image"];
                $old_image=0;
            }
            $errorMSG=$this->validatePost($post);
            if($errorMSG){
                Messages::setMsg($errorMSG, "error");
                return;
            } 
            $this->query('UPDATE posts SET title=:title, body=:body, image=:image, category_id=:category_id, user_id=:user_id WHERE id=:id');            
            $this->bind(':id', $id);
            $this->bind(':title', $post['title']);
            $this->bind(':body', $post['body']);
            $this->bind(':image', $target_file);
            $this->bind(':category_id', $post["category_id"]);
            $this->bind(':user_id', $_SESSION["user_data"]["id"]);         
            $this->execute();   
            if($old_image){
                move_uploaded_file($_FILES["file"]["tmp_name"], ".".$target_file);
                unlink(".".$old_image);
            }
            header('Location: '.ROOT_URL.'/shares');

        }
    }
    public function getOneCatPosts($id){
        $this->query('SELECT posts.*, categories.name FROM posts
        INNER JOIN categories On posts.category_id=categories.id
        WHERE categories.id=:id');
        $this->bind(':id', $id);
        $rows=$this->resultSet();
        if(count($rows)>0){
            return $rows;
        }else{
            Messages::setMsg("In Your choosen category posts not found go and add, You Can Do it!", "error");
            return[];
        }
        
    }
    public function categoryUsageCount($category_id){
        $this->query('SELECT * FROM posts WHERE category_id=:category_id');
        $this->bind(':category_id', $category_id);
        $rows=$this->resultSet();
        return count($rows);

    }
}