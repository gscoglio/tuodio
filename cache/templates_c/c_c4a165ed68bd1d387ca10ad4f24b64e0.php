<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-10-19 09:29:42 PDT */ ?>





<fieldset style="border:1px solid #eee;padding:10px;margin-bottom:10px;font-weight:bold;width:450px;">
<?php echo $this->_vars['file']; ?>

<table>
<?php if (count((array)$this->_vars['images'])): foreach ((array)$this->_vars['images'] as $this->_vars['image']):  
    if ($this->_vars['display'][$this->_vars['image']['file_size']]>0)
    {
 ?>
	<tr>
		<td>
		<?php if (strpos ( $this->_vars['image']['file_name'] , 'http' ) === 0): ?>
			<a href="<?php echo $this->_vars['image']['file_name']; ?>
"><img src='<?php echo $this->_vars['image']['file_name']; ?>
' width='150'/></a>
		<?php elseif ($this->_vars['image']['file_size'] == 'orig'): ?>
			<a href="<?php echo $this->_vars['my_pligg_base'];  echo $this->_vars['upload_directory']; ?>
/<?php echo $this->_vars['image']['file_name']; ?>
" target="_blank"><img src='<?php echo $this->_vars['my_pligg_base'];  echo $this->_vars['upload_directory']; ?>
/<?php echo $this->_vars['image']['file_name']; ?>
' width='150'/></a>
		<?php else: ?>
			<img src='<?php echo $this->_vars['my_pligg_base'];  echo $this->_vars['upload_thdirectory']; ?>
/<?php echo $this->_vars['image']['file_name']; ?>
'/>
		<?php endif; ?>
		</td>
	</tr>
	<tr>
		
		<td>
		<span style="font-weight:normal;"><?php echo $this->_confs['PLIGG_Upload_Code_Instructions']; ?>
</span><br />
		<input type="text" style="margin:4px 0;padding:3px 5px 3px 5px;" value="<?php echo '{image';  echo $this->_vars['number'];  if ($this->_vars['image']['file_size'] != 'orig'): ?>_<?php echo $this->_vars['image']['file_size'];  endif;  echo '}'; ?>
" />
		<br />
		</td>
	</tr>
<?php 
    }
  endforeach; endif; ?>
</table>

<input type='button' value='Delete' onclick='deleteImage(<?php echo $this->_vars['submit_id']; ?>
,<?php echo $this->_vars['number']; ?>
);'><br>
<?php if ($this->_vars['upload_allow_hide']): ?>
    <?php if ($this->_vars['ispicture']): ?>
	<input type='checkbox' onclick='switchImage(<?php echo $this->_vars['submit_id']; ?>
,<?php echo $this->_vars['number']; ?>
,"thumb");' <?php if ($this->_vars['hide_thumb']): ?>checked<?php endif; ?>> <?php echo $this->_confs['PLIGG_Upload_Off_Thumb']; ?>
<br>
    <?php endif; ?>
<input type='checkbox' onclick='switchImage(<?php echo $this->_vars['submit_id']; ?>
,<?php echo $this->_vars['number']; ?>
,"file");'  <?php if ($this->_vars['hide_file']): ?>checked<?php endif; ?>> <?php echo $this->_confs['PLIGG_Upload_Off_File']; ?>

<?php endif; ?>
</fieldset>
