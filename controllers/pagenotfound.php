<?php

class Pagenotfound extends Controller{
    protected function index(){
        $viewmodel=new PagenotfoundModel();
        $this->ReturnView($viewmodel->Index(), false);
    }
    

}