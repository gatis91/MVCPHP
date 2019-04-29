
<div class="card " >
  <div class="card-header">
    Register
  </div>

    <div class="p-1">
    <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="email2">Confirm  Email address</label>
            <input type="email2" class="form-control" name="email2" id="email2" aria-describedby="emailHelp" placeholder="Enter email">
           
        </div>
             <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="password">
        </div>
        <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="password">
        </div>
        <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">Register</button>
       
    </form>
    </div>
</div>

<script>
</script>