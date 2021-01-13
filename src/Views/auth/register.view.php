
<?php
use App\Core\Form;
$form = Form::Begin(['action'=>'/register','method'=>'post','class'=>'form-signin'],$model??null);
?>

    <img class="mb-4" src="<?=authAssets('images/user.png')?>"  width="100" height="100">
    <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    <?php $form->label('inputName','sr-only','Name');?>
    <?php $form->input(['type'=>'text','id'=>'inputName','class'=>'form-control','name'=>'name','placeholder'=>'Name'],false,true);?><br>
    <?php $form->label('inputEmail','sr-only','Email Address');?>
    <?php $form->input(['type'=>'email','id'=>'inputEmail','class'=>'form-control','name'=>'email','placeholder'=>'Email Address'],false);?><br>
    <?php $form->label('inputPassword','sr-only','Password');?>
    <?php $form->input(['type'=>'password','id'=>'inputPassword','class'=>'form-control','name'=>'password','placeholder'=>'Password'],false);?><br>
    <?php $form->label('inputPasswordConfirmation','sr-only','Confirm Password');?>
    <?php $form->input(['type'=>'password','id'=>'inputPasswordConfirmation','class'=>'form-control','name'=>'passwordConfirmation','placeholder'=>'Password Confirmation'],false);?>
    <?php $form->submit('Register','btn btn-lg btn-primary btn-block');?>
    <?php $form->link('/login','Login','float-left text-dark');?>
    <p class="mt-3 mb-3 text-muted">&copy; <?=date('Y')?></p>
<?php Form::end();?>
