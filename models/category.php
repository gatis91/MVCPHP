<?php


class CategoryModel extends Model{

    public  function AllCategories(){
        $this->query('SELECT * FROM categories');
        $rows=$this->resultSet();
        return $rows;
    }
    public function addCategory(){
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']){
            $this->query('INSERT INTO categories (name) VALUES(:name)');
            $this->bind(':name', $post['category']);
            $this->execute();
            if($this->lastInsertId()){
                header('Location: '.ROOT_URL.'/shares');
            }
        }
        return;
    }
    public function getSingleCategory($id){
        
        $this->query('SELECT * FROM categories WHERE id=:id');
        $this->bind(':id', $id);
        $row=$this->single();
        return $row;
        
    }
    public function updateCategory($id){
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post["submit"]){
            $this->query('UPDATE categories SET name=:name WHERE id=:id');
            $this->bind(':id', $id);
            $this->bind(':name', $post["category"]);
            $this->execute();

            
            header('Location: '.ROOT_URL.'/categories/managecategories');
             

        }

    }
    public function deleteCategory($id){

        $this->query('DELETE FROM categories WHERE id=:id');
        $this->bind(':id', $id);
        $this->execute();
    }

}