<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-09 11:04:35 PDT */ 
//$tag_url[customer] = str_replace('/story.php?search=','',$tag_url[customer]);
//$tag_url[customer] = str_replace('tag=true','',$tag_url[customer]);
//$tag_url[customer] = '/tag/' . $tag_url[customer] . '.html';
?>

<div class="pagewrap" style="line-height:<?php echo $this->_vars['tags_max_pts']; ?>
pt;">
	<?php if (isset($this->_sections['customer'])) unset($this->_sections['customer']);
$this->_sections['customer']['name'] = 'customer';
$this->_sections['customer']['loop'] = is_array($this->_vars['tag_number']) ? count($this->_vars['tag_number']) : max(0, (int)$this->_vars['tag_number']);
$this->_sections['customer']['show'] = true;
$this->_sections['customer']['max'] = $this->_sections['customer']['loop'];
$this->_sections['customer']['step'] = 1;
$this->_sections['customer']['start'] = $this->_sections['customer']['step'] > 0 ? 0 : $this->_sections['customer']['loop']-1;
if ($this->_sections['customer']['show']) {
	$this->_sections['customer']['total'] = $this->_sections['customer']['loop'];
	if ($this->_sections['customer']['total'] == 0)
		$this->_sections['customer']['show'] = false;
} else
	$this->_sections['customer']['total'] = 0;
if ($this->_sections['customer']['show']):

		for ($this->_sections['customer']['index'] = $this->_sections['customer']['start'], $this->_sections['customer']['iteration'] = 1;
			 $this->_sections['customer']['iteration'] <= $this->_sections['customer']['total'];
			 $this->_sections['customer']['index'] += $this->_sections['customer']['step'], $this->_sections['customer']['iteration']++):
$this->_sections['customer']['rownum'] = $this->_sections['customer']['iteration'];
$this->_sections['customer']['index_prev'] = $this->_sections['customer']['index'] - $this->_sections['customer']['step'];
$this->_sections['customer']['index_next'] = $this->_sections['customer']['index'] + $this->_sections['customer']['step'];
$this->_sections['customer']['first']	  = ($this->_sections['customer']['iteration'] == 1);
$this->_sections['customer']['last']	   = ($this->_sections['customer']['iteration'] == $this->_sections['customer']['total']);
?>
		<span style="font-size: <?php echo $this->_vars['tag_size'][$this->_sections['customer']['index']]; ?>
pt"><a href="<?php echo $this->_vars['tag_url'][$this->_sections['customer']['index']]; ?>
"><?php echo $this->_vars['tag_name'][$this->_sections['customer']['index']]; ?>
</a></span>&nbsp;&nbsp;
	<?php endfor; endif; ?>
</div>
