<?php
/**
 * This template is used to display the login form with [edd_login]
 */
global $edd_login_redirect;
if ( ! is_user_logged_in() ) :

	// Show any error messages after form submission
	edd_print_errors(); ?>

	<main class="black-80">
		<form id="edd_login_form" class="edd_form measure" action="" method="post">
			<fieldset class="ba b--transparent ph0 mh0">
				<legend class="f4 fw6 ph0 mh0"><?php _e( 'Sign In', 'easy-digital-downloads' ); ?></legend>
				<?php do_action( 'edd_login_fields_before' ); ?>
				<div class="mt3">
					<label class="db fw6 lh-copy f6" for="edd_user_login"><?php _e( 'Email', 'easy-digital-downloads' ); ?></label>
					<input name="edd_user_login" id="edd_user_login" class="pa2 input-reset ba bg-transparent hover-bg-light-gray w-100 required" type="text"/>
				</div>
				<div class="mv3">
					<label class="db fw6 lh-copy f6" for="edd_user_pass"><?php _e( 'Password', 'easy-digital-downloads' ); ?></label>
					<input name="edd_user_pass" id="edd_user_pass" class="b pa2 input-reset ba bg-transparent hover-bg-light-gray w-100 password required" type="password"/>
				</div>
				<label class="pa0 ma0 mb3 lh-copy f6 pointer">
					<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember Me', 'easy-digital-downloads' ); ?>
				</label>
				<div class="">
					<input type="hidden" name="edd_redirect" value="<?php echo esc_url( $edd_login_redirect ); ?>"/>
					<input type="hidden" name="edd_login_nonce" value="<?php echo wp_create_nonce( 'edd-login-nonce' ); ?>"/>
					<input type="hidden" name="edd_action" value="user_login"/>
					<input id="edd_login_submit" type="submit" class="b ph3 pv2 input-reset ba b--black bg-transparent grow pointer f6 dib edd_submit" value="<?php _e( 'Log In', 'easy-digital-downloads' ); ?>"/>
				</div>
				<div class="lh-copy mt3 edd-lost-password">
					<!-- <a href="#0" class="f6 link dim black db">Sign up</a> -->
					<a class="f6 link dim black db" href="<?php echo wp_lostpassword_url(); ?>">
						<?php _e( 'Lost Password?', 'easy-digital-downloads' ); ?>
					</a>
				</div>
				<?php do_action( 'edd_login_fields_after' ); ?>
			</fieldset>
		</form>
	</main>
<?php else : ?>
	<p class="edd-logged-in"><?php _e( 'You are already logged in', 'easy-digital-downloads' ); ?></p>
<?php endif; ?>
