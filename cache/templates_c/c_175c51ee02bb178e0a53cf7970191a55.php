<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-06 05:56:46 PDT */ ?>


<?php echo '
<script>
var RecaptchaOptions = {
   theme : \'white\',


   tabindex : 16
};
</script>
'; ?>




<?php if (isset ( $this->_vars['register_captcha_error'] )): ?><br /><span class="error"><?php echo $this->_vars['register_captcha_error']; ?>
</span><br /><br /><?php endif;  
	require_once(captcha_captchas_path . '/reCaptcha/libs/recaptchalib.php');
	$publickey = get_misc_data('reCaptcha_pubkey'); // you got this from the signup page
	echo recaptcha_get_html($publickey);
?>
