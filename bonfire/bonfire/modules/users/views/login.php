<?php
	$site_open = $this->settings_lib->item('auth.allow_register');
?>

<div id="login" style="margin-top:50px">
	<img src="<?php echo img_path(); ?>/logo-dapro.jpg" />

	<?php echo Template::message(); ?>

	<?php
		if (validation_errors() OR $this->session->userdata('flashSuccess')) :
	?>
	<div class="row-fluid">
		<div class="span12">
			<div class="alert alert-error fade in">
			  <a data-dismiss="alert" class="close">&times;</a>
				<?php echo validation_errors(); ?>
				<?php echo $this->session->userdata('flashSuccess') ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php echo form_open(LOGIN_URL, array('autocomplete' => 'off')); ?>

		<div class="control-group <?php echo iif( form_error('login') , 'error') ;?>">
			<div class="controls">
				<input style="width: 95%" type="text" name="login" id="login_value" value="<?php echo set_value('login'); ?>" tabindex="1" placeholder="<?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_username') .'/'. lang('bf_email') : ucwords($this->settings_lib->item('auth.login_type')) ?>" />
			</div>
		</div>

		<div class="control-group <?php echo iif( form_error('password') , 'error') ;?>">
			<div class="controls">
				<input style="width: 95%" type="password" name="password" id="password" value="" tabindex="2" placeholder="<?php echo lang('bf_password'); ?>" />
			</div>
		</div>

		<?php if ($this->settings_lib->item('auth.allow_remember')) : ?>
			<div class="control-group">
				<div class="controls">
					<label class="checkbox" for="remember_me">
						<input type="checkbox" name="remember_me" id="remember_me" value="1" tabindex="3" />
						<span class="inline-help"><?php echo lang('us_remember_note'); ?></span>
					</label>
				</div>
			</div>
		<?php endif; ?>

		<!-- CAPTCHA -->
		<!-- <div class="control-group">
			<div class="g-recaptcha" data-sitekey="6Ld3BggTAAAAAKF4Bi_KZEfzZLaCMyPdkZ7QzMFY"></div>
		</div> -->

		<div class="control-group">
			<div class="controls">
				<input class="btn btn-large btn-primary" type="submit" name="log-me-in" id="submit" value="<?php e(lang('us_let_me_in')); ?>" tabindex="5" />
			</div>
		</div>

	<?php echo form_close(); ?>

	<?php // show for Email Activation (1) only
		if ($this->settings_lib->item('auth.user_activation_method') == 1) : ?>
	<!-- Activation Block -->
			<p style="text-align: left" class="well">
				<?php echo lang('bf_login_activate_title'); ?><br />
				<?php
				$activate_str = str_replace('[ACCOUNT_ACTIVATE_URL]',anchor('/activate', lang('bf_activate')),lang('bf_login_activate_email'));
				$activate_str = str_replace('[ACTIVATE_RESEND_URL]',anchor('/resend_activation', lang('bf_activate_resend')),$activate_str);
				echo $activate_str; ?>
			</p>
	<?php endif; ?>

	<p style="text-align: center">
		<?php if ( $site_open ) : ?>
			<?php echo anchor(REGISTER_URL, lang('us_sign_up')); ?>
		<?php endif; ?>

		<br/><?php echo anchor('/forgot_password', lang('us_forgot_your_password')); ?>
	</p>
</div>
<div style="text-align:center; width:100%;">
	<a target="blank" class="btn btn-primary" href="<?= base_url('uploads/dapro.xlsx') ?>">
		Download petunjuk penggunaan sistem
	</a>
</div>


