<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-08 02:52:03 PDT */ ?>
<div class="pagewrap">
	<div class="live2-item">
		<div class="live2-ts"><strong><?php echo $this->_confs['PLIGG_Visual_All_Hour']; ?>
</strong></div>
		<div class="live2-type"><strong><?php echo $this->_confs['PLIGG_Visual_All_Action']; ?>
</strong></div>
		<div class="live2-votes"><strong><center><?php echo $this->_confs['PLIGG_Visual_All_Votes']; ?>
</center></strong></div>
		<div class="live2-story"><div align="center"><strong><?php echo $this->_confs['PLIGG_Visual_All_Story']; ?>
</strong></div></div>
		<div class="live2-who"><strong><?php echo $this->_confs['PLIGG_Visual_All_User']; ?>
</strong></div>
		<div class="live2-status"><strong><?php echo $this->_confs['PLIGG_Visual_All_State']; ?>
</strong></div>
	</div>
	<?php if (isset($this->_sections['foo'])) unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)0;
$this->_sections['foo']['loop'] = is_array($this->_vars['items_to_show']) ? count($this->_vars['items_to_show']) : max(0, (int)$this->_vars['items_to_show']);
$this->_sections['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
if ($this->_sections['foo']['start'] < 0)
	$this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
	$this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
	$this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
	if ($this->_sections['foo']['total'] == 0)
		$this->_sections['foo']['show'] = false;
} else
	$this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

		for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
			 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
			 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']	  = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']	   = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
		<div id="live2-<?php echo $this->_sections['foo']['index']; ?>
" class="live2-item">&nbsp;</div>
	<?php endfor; endif; ?>
	<br />
</div>
