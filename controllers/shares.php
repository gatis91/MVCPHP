<?php

class Shares extends Controller{
    protected function index(){
        $viewmodel=new ShareModel();
        $viewmodel2=new CategoryModel();
        $this->ReturnView([$viewmodel->Index(), $viewmodel2->AllCategories()], true);
    }
    protected function add(){
        if(!isset($_SESSION["is_logged_in"])){
            header('Location: '.ROOT_URL);
        }else{
            $viewmodel=new ShareModel();
            $viewmodel2=new CategoryModel();
            $this->ReturnView([$viewmodel->add(), $viewmodel2->AllCategories() ],true);
            
        }

    }
    protected function singleView(){
        $viewmodel=new ShareModel();
        $this->ReturnView($viewmodel->singleView($_GET["id"]), true);
    }
    protected function delete(){
        if(!isset($_SESSION["is_logged_in"])){
            header('Location: '.ROOT_URL);
        }else{
            $viewmodel=new ShareModel();
            $viewmodel->delete($_GET["id"],  $_SESSION["user_data"]["id"]);
            header('Location: '.ROOT_URL."/users/mypage");     
                    
        }     
    }
    protected function edit(){
        if(!isset($_SESSION["is_logged_in"])){
            header('Location: '.ROOT_URL);
        }else{
            $viewmodel=new ShareModel();

            $viewmodel2=new CategoryModel();
               
            if($viewmodel->checkBeforeUpdate($_GET["id"], $_SESSION["user_data"]["id"])){
                $this->ReturnView([$viewmodel->singleView($_GET["id"]), $viewmodel2->AllCategories(), $viewmodel->update($_GET["id"]) ], true); 
            }else{
                header('Location: '.ROOT_URL);
            }
                    
              
                    
        }     
    }
    protected function posts(){
        $viewmodel=new ShareModel();
        $viewmodel2=new CategoryModel();
        $this->ReturnView([$viewmodel->getOneCatPosts($_GET["id"]), $viewmodel2->AllCategories() ],true);
        
    }



}