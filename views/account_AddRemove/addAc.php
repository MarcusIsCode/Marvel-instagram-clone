<form action="app/users/creatAccount" method="post">
    <div class="form-gruop">
        <label for="email"></label>
        <input class="input" type="email" name="email" id="email" placeholder="Email" required>
    </div><!-- /form-group  -->

    <!-- password-->
    <div class="form-group">
        <label for="password"></label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
        
        <label for="password2"></label>
        <input class="form-control" type="password" name="password2" id="password" placeholder="Repeat Password" required>
    </div><!-- /form-group -->
    
    <div class="form-group">
        <textarea name="biography" placeholder="write somthing about yourself hero"></textarea>
    </div>
    <button type="submit" class="btn">Login</button>
</form>