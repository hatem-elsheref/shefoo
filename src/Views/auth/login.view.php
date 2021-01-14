
    <?php
    use App\Core\Form;
        $form = Form::Begin(['class'=>'form-signin','action'=>'/login','method'=>'post'],$model??null);
    ?>
    <?php if (session()->hasFlash('success')):?>
        <div class="alert alert-success"><?php echo session()->getFlash('success')?></div>
        <?php endif;?>
    <img class="mb-4" src="<?=authAssets('images/user.png')?>"  width="100" height="100">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <?php $form->label('inputEmail','sr-only','Email address');?>
    <?php $form->input(['type'=>'email','id'=>'inputEmail','class'=>'form-control','name'=>'email','placeholder'=>'Email address'],false,true);?>
    <?php $form->label('inputPassword','sr-only','Password');?>
    <?php $form->input(['type'=>'password','id'=>'inputPassword','class'=>'form-control','name'=>'password','placeholder'=>'Password'],false,false);?>
    <div class="checkbox float-left">
        <label><?php $form->checkbox('rememberMe','','remember-me')?> Remember me</label>
    </div>
    <?php $form->submit('Login','btn btn-lg btn-primary btn-block');?>
    <?php $form->link('/register','Register','float-left text-dark');?>
    <p class="mt-3 mb-3 text-muted">&copy; <?= date('Y')?></p>
    <?php Form::end(); ?>