
<form class="form-signin" method="post" action="/login">
    <img class="mb-4" src="<?=authAssets('images/user.png')?>"  width="100" height="100">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus><br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control"  name="password" placeholder="Password" required>
    <div class="checkbox float-left">
        <label><input type="checkbox" value="remember-me" name="rememberMe"> Remember me</label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    <a href="/register" class="float-left text-dark">Register</a>
    <p class="mt-3 mb-3 text-muted">&copy; <?=date('Y')?></p>
</form>
