<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-06 06:23:44 PDT */ ?>
  <?php echo '
	<script type="text/javascript">
	    var box = {};
        window.addEvent(\'domready\', function(){
        box = new MultiBox(\'mb\', {
        descClassName: \'multiBoxDesc\',
        useOverlay: true,
			onOpen: function(){},
			onClose: function(){}
        });
        });
		
		var box2 = {};
        window.addEvent(\'domready\', function(){
        box2 = new MultiBox(\'onetime\', {
		descClassName: \'multiBoxDesc\',
        useOverlay: true,
			onOpen: function(){},
			onClose: function(){window.location = "./admin_modules.php?action=disable&module=Hello%20World"}
        });
	if ($(\'autopop\'))
		box2.open($(\'autopop\'));
        });
	</script>
  '; ?>
