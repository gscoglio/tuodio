<?php require_once('/var/www/tuodio.com.ar/plugins/function.eval.php'); $this->register_function("eval", "tpl_function_eval");  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2012-12-25 16:59:05 ART */ ?>

<?php if (count((array)$this->_vars['snippet_actions_tpl'])): foreach ((array)$this->_vars['snippet_actions_tpl'] as $this->_vars['snippet']): ?>

    <?php if ($this->_vars['snippet']['snippet_location'] == $this->_vars['location']): ?>

	<?php echo tpl_function_eval(array('var' => $this->_vars['snippet']['snippet_content']), $this);?>
    <?php endif;  endforeach; endif; ?>
