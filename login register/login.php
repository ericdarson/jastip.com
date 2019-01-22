<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		echo $script;
		echo $css;
		echo $style;
	?>
</head>
<?php
$email = array(
  'type'  => 'email',
  'name'  => '_email',
  'placeholder' => 'E-Mail'
);
$password = array(
  'type'  => 'password',
  'name'  => '_password',
  'placeholder' => 'Password'
);
$submit = array(
  'type'  => 'submit',
  'name'  => '_login',
  'value' => 'Login',
  'class' => 'ui fluid large teal submit button'
);
?>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
        <div class="content">
          Masuk <a href="<?php echo base_url();?>" class="button">JasTip.com</a>
        </div>
    </h2>
  <?php if (isset($error)): ?>
    <?php echo '<div class="ui error message"><i class="close icon"></i><div class="header">'.$error.'</div></div>'; ?>
  <?php endif ?>
  <?php
  $attributes = array('class' => 'ui large form');
  echo form_open('login/submit', $attributes);
  ?>
      <div class="ui stacked segment">
        <div class="ui error message"></div>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <?php
            echo form_error('_email');
            echo form_input($email);
            ?>
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <?php
            echo form_error('_password');
            echo form_input($password);
            ?>
          </div>
        </div>

        <?php echo form_submit($submit);?>
      </div>
  <?php echo form_close();?>
  <div class="ui message">
      BELUM PUNYA AKUN? <a href="<?php echo base_url();?>index.php/Register/index">Daftar Sekarang!</a>
    </div>
  </div>
</div>
</html>