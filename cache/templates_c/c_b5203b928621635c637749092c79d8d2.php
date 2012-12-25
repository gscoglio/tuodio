<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-06 05:55:04 PDT */ ?>
<!-- START ABOUT -->
        	<div class="headline">
            	<div class="sectiontitle"><a href="<?php echo $this->_vars['my_pligg_base']; ?>
/page.php?page=about"><?php echo $this->_confs['PLIGG_Visual_What_Is_Pligg']; ?>
</a></div>
            </div>
            <?php echo tpl_function_checkActionsTpl(array('location' => "tpl_widget_about_start"), $this);?>
            <div id="aboutcontent">
                <?php echo $this->_confs['PLIGG_Visual_What_Is_Pligg_Text']; ?>

                <?php echo tpl_function_checkActionsTpl(array('location' => "tpl_widget_about_end"), $this);?>
            </div>
<!-- END ABOUT -->