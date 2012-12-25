<?php require_once('/home/gscoglio/tuodio.com.ar/plugins/modifier.sanitize.php'); $this->register_modifier("sanitize", "tpl_modifier_sanitize");  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-17 15:09:09 PDT */ ?>


	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	

<?php if ($this->_vars['meta_description'] != ""): ?>
	<meta name="description" content="<?php echo $this->_vars['meta_description']; ?>
" />
<?php elseif ($this->_vars['pagename'] == "search"): ?>
	<meta name="description" content="<?php echo $this->_confs['PLIGG_Visual_Search_SearchResults']; ?>
 <?php echo $this->_run_modifier($this->_run_modifier($_GET['search'], 'sanitize', 'plugin', 1, 2), 'stripslashes', 'PHP', 1); ?>
" />
<?php else: ?>
	<meta name="description" content="<?php echo $this->_confs['PLIGG_Visual_What_Is_Pligg_Text']; ?>
" />
<?php endif; ?>

<?php if ($this->_vars['meta_keywords'] != ""): ?>
	<meta name="keywords" content="<?php echo $this->_vars['meta_keywords']; ?>
" />
<?php elseif ($this->_vars['pagename'] == "search"): ?>
	<meta name="keywords" content="<?php echo $this->_run_modifier($this->_run_modifier($_GET['search'], 'sanitize', 'plugin', 1, 2), 'stripslashes', 'PHP', 1); ?>
" />
<?php else: ?>
	<meta name="keywords" content="Odio,Odiar,Odios,Furia,Bronca,Enojo,Social,Sociedad,Famosos,Politicos" />
<?php endif; ?>  

	<meta name="Language" content="<?php echo $this->_confs['PLIGG_Visual_Meta_Language']; ?>
" />
	<meta name="Robots" content="All" />
		