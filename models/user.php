<?php


class UserModel extends Model{
    public function Index(){
        return;
    }
    public function register(){
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password=password_hash($post['password'], PASSWORD_BCRYPT);
        if($post['submit']){  
            if(strlen($post["name"])<3){
                Messages::setMsg("Name should be at least 3 characters long", "error");
                return;
    
            }
            if($post["email"]==""){
                Messages::setMsg("email required", "error");
                return;
    
            }
            if($post["email"]!=$post["email2"]){
                Messages::setMsg("emails dismatch", "error");
                return;
    
            }
            if(strlen($post["password"])<6){
                Messages::setMsg("Password should be at least 6 characters long", "error");
                return;
    
            }
            if($post["password"]!=$post["password2"]){
                Messages::setMsg("Passwords dismatch", "error");
                return;
    
            }
            $this->query('SELECT email FROM users WHERE email=:email');
            $this->bind(':email', $post['email']);
            $row=$this->single();
  
            if(strlen($row["email"])>0){
                Messages::setMsg('Email already used', 'error');
                return;
            }   

            $this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);  
            $this->execute();
            if($this->lastInsertId()){
                header('Location: '.ROOT_URL.'/users/login');
            }
        }
        return;
    }
    
    public function login(){
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']){
            
            $this->query('SELECT * FROM users WHERE email=:email');
            $this->bind(':email', $post['email']);
            $row=$this->single();
            if(password_verify($post['password'], $row["password"])){
                $_SESSION["is_logged_in"]=true;
                $_SESSION["user_data"]=array(
                    "id" => $row['id'],
                    "name" => $row["name"],
                    "email" => $row["email"]
                );
                Messages::setMsg('incorect login', 'success');
                header('Location: '.ROOT_URL.'/shares');
            }else{
                Messages::setMsg('incorect login', 'error');
            }
                       
        }
        return;
    }

}
