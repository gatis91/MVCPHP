
<div class="card " >
  <div class="card-header">
    Login
  </div>
   
    <div class="p-2">
    <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            
        </div>
         <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="password">
        </div>
        <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">Login</button>
       
    </form>
    </div>
</div>