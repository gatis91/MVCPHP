<?php

class Categories extends Controller{

    protected function addCategory(){
        if(!isset($_SESSION["is_logged_in"])){
            header('Location: '.ROOT_URL);
        }else{
            $viewmodel=new CategoryModel();
            $this->ReturnView($viewmodel->addCategory(), true);
             
                    
        } 

    }
    protected function managecategories(){
        if(!isset($_SESSION["is_logged_in"])){
            header('Location: '.ROOT_URL);
        }else{
            $viewmodel=new CategoryModel();
            $this->ReturnView($viewmodel->AllCategories(), true);
             
                    
        } 

    }
    protected function delete(){
        if(!isset($_SESSION["is_logged_in"])){
            header('Location: '.ROOT_URL);
        }else{
            $viewmodel=new CategoryModel();
            $viewmodel2=new ShareModel();
    
            if($viewmodel2->categoryUsageCount($_GET["id"])){
                
                Messages::setMsg("Category still used in posts can not be deleted", "error");
                header('Location: '.ROOT_URL."/categories/managecategories");
            }else{
                $viewmodel->deleteCategory($_GET["id"]);
                Messages::setMsg("deleted", "success");
                header('Location: '.ROOT_URL."/categories/managecategories");
            }
             
                    
        } 
  
        

        
    }
    protected function edit(){
        if(!isset($_SESSION["is_logged_in"])){
            header('Location: '.ROOT_URL);
        }else{
            $viewmodel=new CategoryModel(); 

            $this->ReturnView([$viewmodel->getSingleCategory($_GET["id"]), $viewmodel->updateCategory($_GET["id"])], true);
                    
        } 

    }




}