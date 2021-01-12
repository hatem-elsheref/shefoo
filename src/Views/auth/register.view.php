
<?php
if (isset($model))
    foreach ($model->errors as $error){
        echo $model->getFirstError('name');
    }

?>

<form class="form-signin" method="post" action="/register">
    <img class="mb-4" src="<?=authAssets('images/user.png')?>"  width="100" height="100">
    <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    <label for="inputName" class="sr-only">Name</label>
    <input type="text" id="inputName" class="form-control" name="name" placeholder="Name"  autofocus><br>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address"><br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control"  name="password" placeholder="Password" >
    <label for="inputPasswordConfirmation" class="sr-only">Confirm Password</label>
    <input type="password" id="inputPasswordConfirmation" class="form-control"  name="passwordConfirmation" placeholder="Password Confirmation" >

    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <a href="/login" class="float-left text-dark">Login</a>
    <p class="mt-3 mb-3 text-muted">&copy; <?=date('Y')?></p>
</form>
