<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-08-01 06:24:56 PDT */  $this->config_load(upload_lang_conf, null, null); ?>

<fieldset><legend> <?php echo $this->_confs['PLIGG_Upload']; ?>
</legend>
<p><?php echo $this->_confs['PLIGG_Upload_Instructions']; ?>
</p>
<br />


	<form action="" method="POST" id="thisform">
		<table border="0" cellspacing="8">
		<tr>
		<td width="250" colspan="2"><h2><?php echo $this->_confs['PLIGG_Upload_Image']; ?>
: </h2></td>
		</tr>
		<tr>
		<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Generate_Thumbnails']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Generate_Thumbnails']; ?>
</a>:</label></td><td>
			<select name="upload_thumb">
			<option value='1' <?php if ($this->_vars['settings']['thumb']): ?>selected<?php endif; ?>>On</option>
			<option value='0' <?php if (! $this->_vars['settings']['thumb']): ?>selected<?php endif; ?>>Off</option>
			</select>
		</td>
		</tr>
		<tr>
		<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Sizes']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Sizes']; ?>
</a>:</label></td><td>
			<table border=1 style='width: 200px;'>
			<tr><th><?php echo $this->_confs['PLIGG_Upload_Max_Size']; ?>
</th><th><?php echo $this->_confs['PLIGG_Upload_Display_On_Upload']; ?>
</th><th><?php echo $this->_confs['PLIGG_Upload_Delete']; ?>
</th></tr>
			<tr><td><?php echo $this->_confs['PLIGG_Upload_Original']; ?>
</td><td><input type='checkbox' name='display[orig]' value='1' <?php if ($this->_vars['settings']['display']['orig']): ?>checked<?php endif; ?>></td><td>&nbsp;</td></tr>
			<?php if (count((array)$this->_vars['settings']['sizes'])): foreach ((array)$this->_vars['settings']['sizes'] as $this->_vars['size']): ?>
			<tr>	
			<td><?php echo $this->_vars['size']; ?>
</td>
			<td><input type='checkbox' name='display[<?php echo $this->_vars['size']; ?>
]' value='1' <?php if ($this->_vars['settings']['display'][$this->_vars['size']]) echo 'checked'; ?>></td>
			<td><input type='checkbox' name='delsize[]' value='<?php echo $this->_vars['size']; ?>
'></td>
			</tr>
			<?php endforeach; endif; ?>
			</table>
		</td>
		</tr>
		<tr>
		<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Add_Size']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Add_Size']; ?>
</a>:<br /><i><?php echo $this->_confs['PLIGG_Upload_Add_Size_Note']; ?>
</i></label></td><td>
			<?php echo $this->_confs['PLIGG_Upload_Width']; ?>
 : <input type='text' name='upload_width' size=3>&nbsp;&nbsp;&nbsp;
			<?php echo $this->_confs['PLIGG_Upload_Height']; ?>
: <input type='text' name='upload_height' size=3><br>
		</td>
		</tr>
		<tr>
		<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Quality']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Quality']; ?>
 (1-100)</a>:</label></td><td>
			<input type='text' name='upload_quality' value="<?php echo $this->_vars['settings']['quality']; ?>
" size=3>
		</td>
		</tr>
		<tr>
		<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Place']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Place']; ?>
</a>:</label></td><td>
			<select name="upload_place">
				<option><?php echo $this->_confs['PLIGG_Upload_Nowhere']; ?>
</option>
			<?php if (count((array)$this->_vars['upload_places'])): foreach ((array)$this->_vars['upload_places'] as $this->_vars['place']): ?>
				<option <?php if ($this->_vars['settings']['place'] == $this->_vars['place']): ?>selected<?php endif; ?>><?php echo $this->_vars['place']; ?>
</option>
			<?php endforeach; endif; ?>
			</select>
		</td>
		</tr>
		<tr>
		<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Defsize']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Defsize']; ?>
</a>:</label></td><td>
			<select name="upload_defsize">
				<option value='orig' <?php if ($this->_vars['settings']['defsize'] == 'orig'): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Upload_Original_Image']; ?>
</option>
			<?php if (count((array)$this->_vars['settings']['sizes'])): foreach ((array)$this->_vars['settings']['sizes'] as $this->_vars['size']): ?>
				<option <?php if ($this->_vars['settings']['defsize'] == $this->_vars['size']): ?>selected<?php endif; ?>><?php echo $this->_vars['size']; ?>
</option>
			<?php endforeach; endif; ?>
			</select>
		</td>
		</tr>
		<tr>
		<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Allow_External']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Allow_External']; ?>
</a>:</label></td><td>
			<select name="upload_external">
			<option value='file,url' <?php if ($this->_vars['settings']['external'] == 'file,url'): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Upload_Both']; ?>
</option>
			<option value='file' <?php if ($this->_vars['settings']['external'] == 'file'): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Upload_File_Only']; ?>
</option>
			<option value='url' <?php if ($this->_vars['settings']['external'] == 'url'): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Upload_URL_Only']; ?>
</option>
			</select>
		</td>
		</tr>
		<tr>
		<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Link']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Link']; ?>
</a>:</label></td><td>
			<select name="upload_link">
			<option value='story' <?php if ($this->_vars['settings']['link'] == 'story'): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Upload_Story_Page']; ?>
</option>
			<option value='orig' <?php if ($this->_vars['settings']['link'] == 'orig'): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Upload_Original_Image']; ?>
</option>
			<?php if (count((array)$this->_vars['settings']['sizes'])): foreach ((array)$this->_vars['settings']['sizes'] as $this->_vars['size']): ?>
				<option value='<?php echo $this->_vars['size']; ?>
' <?php if ($this->_vars['settings']['link'] == $this->_vars['size']): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Upload_Another_Thumbnail']; ?>
 (<?php echo $this->_vars['size']; ?>
)</option>
			<?php endforeach; endif; ?>
			</select>
		</td>
		</tr>
		<tr>
		<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Fields']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Fields']; ?>
</a>:</label></td><td>
			<table border=1 style='width: 200px;'>
			<tr><th><?php echo $this->_confs['PLIGG_Upload_Tag_Name']; ?>
</th><th><?php echo $this->_confs['PLIGG_Upload_Field_Name']; ?>
</th><th><?php echo $this->_confs['PLIGG_Upload_Alternate']; ?>
</th><th><?php echo $this->_confs['PLIGG_Upload_Mandatory']; ?>
</th><th><?php echo $this->_confs['PLIGG_Upload_Delete']; ?>
</th></tr>
			<?php if (count((array)$this->_vars['settings']['fields'])): foreach ((array)$this->_vars['settings']['fields'] as $this->_vars['i'] => $this->_vars['field']): ?>
			<tr>
			<td><?php echo '{'; ?>
field<?php echo $this->_vars['i']+1;  echo '}'; ?>
</td>
			<td><?php echo $this->_vars['field']; ?>
</td>
			<td><input type='text' name='alternate[<?php echo $this->_vars['i']+1; ?>]' value='<?php echo $this->_vars['settings']['alternates'][$this->_vars['i']+1]; ?>' size='20'></td>
			<td><input type='checkbox' name='mandatory[<?php echo $this->_vars['i']+1; ?>]' value='1' <?php if ($this->_vars['settings']['mandatory'][$this->_vars['i']+1]) echo 'checked'; ?>></td>
			<td><input type='checkbox' name='delfield[]' value='<?php echo $this->_vars['field']; ?>
'></td></tr>
			<?php endforeach; endif; ?>
			</table>
		</td>
		</tr>
		<tr>
		<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Add_Field']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Add_Field']; ?>
</a>:<br /><i><?php echo $this->_confs['PLIGG_Upload_Add_Field_Note']; ?>
</i></label></td><td>
			<input type='text' name='upload_new_field' size=20>
		</td>
		</tr>
		<tr>
			<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Pre_Format']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Pre_Format']; ?>
</a>:</label></td>
			<td><input type="text" name="upload_pre_format" id="upload_pre_format" size="66" value="<?php echo $this->_vars['settings']['pre_format']; ?>
" style="width: 420px;"/></td>
		</tr>
		<tr>
			<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Format']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Format']; ?>
</a>:</label><br><i><?php echo $this->_confs['PLIGG_Upload_Can_Use']; ?>
: <?php echo '{path}, {fieldX}'; ?>
</i></td>
			<td><input type="text" name="upload_format" id="upload_format" size="66" value="<?php echo $this->_vars['settings']['format']; ?>
" style="width: 420px;"/></td>
		</tr>
		<tr>
			<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Post_Format']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Post_Format']; ?>
</a>:</label></td>
			<td><input type="text" name="upload_post_format" id="upload_post_format" size="66" value="<?php echo $this->_vars['settings']['post_format']; ?>
" style="width: 420px;"/></td>
		</tr>
		<tr>
			<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Pre_Thumbnail_Format']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Pre_Thumbnail_Format']; ?>
</a>:</label></td>
			<td><input type="text" name="upload_thumb_pre_format" id="upload_thumb_pre_format" size="66" value="<?php echo $this->_vars['settings']['thumb_pre_format']; ?>
" style="width: 420px;"/></td>
		</tr>
		<tr>
			<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Format']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Format']; ?>
</a>:</label><br><i><?php echo $this->_confs['PLIGG_Upload_Can_Use']; ?>
: <?php echo '{target}, {path}, {fieldX}'; ?>
</i></td>
			<td><input type="text" name="upload_thumb_format" id="upload_thumb_format" size="66" value="<?php echo $this->_vars['settings']['thumb_format']; ?>
" style="width: 420px;"/></td>
		</tr>
		<tr>
			<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Post_Thumbnail_Format']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Post_Thumbnail_Format']; ?>
</a>:</label></td>
			<td><input type="text" name="upload_thumb_post_format" id="upload_thumb_post_format" size="66" value="<?php echo $this->_vars['settings']['thumb_post_format']; ?>
" style="width: 420px;"/></td>
		</tr>
		<tr>
			<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Allow_Hiding']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Allow_Hiding']; ?>
</a>:</label></td>
			<td><input type="checkbox" name="upload_allow_hide" id="upload_allow_hide" value="1" <?php if ($this->_vars['settings']['allow_hide']): ?>checked<?php endif; ?>/></td>
		</tr>


		<tr>
		<td width="250" colspan="2"><br /><br /><h2><?php echo $this->_confs['PLIGG_Upload_General']; ?>
: </h2></td>
		</tr>
		<tr>
			<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Storage_Directory']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Storage_Directory']; ?>
</a>:</label></td>
			<td><input type="text" name="upload_directory" id="upload_directory" size="66" value="<?php echo $this->_vars['settings']['directory']; ?>
" style="width: 420px;"/></td>
		</tr>
		<tr>
			<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Directory']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Directory']; ?>
</a>:</label></td>
			<td><input type="text" name="upload_thdirectory" id="upload_thdirectory" size="66" value="<?php echo $this->_vars['settings']['thdirectory']; ?>
" style="width: 420px;"/></td>
		</tr>
		<tr>
			<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_File_Size']; ?>
"><?php echo $this->_confs['PLIGG_Upload_File_Size']; ?>
</a>:</label></td>
			<td><input type="text" name="upload_filesize" id="upload_filesize" size="66" value="<?php echo $this->_vars['settings']['filesize']; ?>
" style="width: 50px;"/> KB</td>
		</tr>
		<tr>
			<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Max_Number']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Max_Number']; ?>
</a>:</label></td>
			<td><input type="text" name="upload_maxnumber" id="upload_maxnumber" size="66" value="<?php echo $this->_vars['settings']['maxnumber']; ?>
" style="width: 50px;"/></td>
		</tr>
		<tr>
			<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_File_Extensions']; ?>
"><?php echo $this->_confs['PLIGG_Upload_File_Extensions']; ?>
</a>:<br /><i><?php echo $this->_confs['PLIGG_Upload_File_Extensions_Note']; ?>
</i></label></td>
			<td><input type="text" name="upload_extensions" id="upload_extensions" size="66" value="<?php echo $this->_vars['settings']['extensions']; ?>
" style="width: 420px;"/></td>
		</tr>
		<tr>
		<td width="250" style="text-align:right"><label><a href="#<?php echo $this->_confs['PLIGG_Upload_Files_Place']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Files_Place']; ?>
</a>:</label></td><td>
			<select name="upload_fileplace">
				<option><?php echo $this->_confs['PLIGG_Upload_Nowhere']; ?>
</option>
			<?php if (count((array)$this->_vars['upload_places'])): foreach ((array)$this->_vars['upload_places'] as $this->_vars['place']): ?>
				<option <?php if ($this->_vars['settings']['fileplace'] == $this->_vars['place']): ?>selected<?php endif; ?>><?php echo $this->_vars['place']; ?>
</option>
			<?php endforeach; endif; ?>
			</select>
		</td>
		</tr>

		<tr><td width="250"></td><td><Br /><input type="submit" name="submit" value="<?php echo $this->_confs['PLIGG_Upload_Submit']; ?>
" class="log2" style="font-weight:bold;padding:2px 15px 2px 15px"/><br /><br /></td></tr>

		</table>
	</form>

<hr />
<h2><?php echo $this->_confs['PLIGG_Upload_Field_Definitions']; ?>
</h2>
<p><?php echo $this->_confs['PLIGG_Upload_Field_Definitions_Desc']; ?>
</p>
<?php echo '
<style>
p {margin:10px 0;}
strong {font-size:14px;}
</style>
'; ?>

<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Generate_Thumbnails']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Generate_Thumbnails']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Generate_Thumbnails_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Sizes']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Sizes']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Thumbnail_Sizes_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Add_Size']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Add_Size']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Add_Size_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Quality']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Quality']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Quality_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Place']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Place']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Thumbnail_Place_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Defsize']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Defsize']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Thumbnail_Defsize_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Allow_External']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Allow_External']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Allow_External_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Link']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Link']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Thumbnail_Link_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Fields']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Fields']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Thumbnail_Fields_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Add_Field']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Add_Field']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Add_Field_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Pre_Format']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Pre_Format']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Pre_Format_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Format']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Format']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Format_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Post_Format']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Post_Format']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Post_Format_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Pre_Thumbnail_Format']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Pre_Thumbnail_Format']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Pre_Thumbnail_Format_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Format']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Format']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Thumbnail_Format_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Post_Thumbnail_Format']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Post_Thumbnail_Format']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Post_Thumbnail_Format_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Allow_Hiding']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Allow_Hiding']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Allow_Hiding_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Storage_Directory']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Storage_Directory']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Storage_Directory_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Thumbnail_Directory']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Thumbnail_Directory']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Thumbnail_Directory_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_File_Size']; ?>
"><?php echo $this->_confs['PLIGG_Upload_File_Size']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_File_Size_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Max_Number']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Max_Number']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Max_Number_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_File_Extensions']; ?>
"><?php echo $this->_confs['PLIGG_Upload_File_Extensions']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_File_Extensions_Definition']; ?>
</p>
<p><strong><a name="<?php echo $this->_confs['PLIGG_Upload_Files_Place']; ?>
"><?php echo $this->_confs['PLIGG_Upload_Files_Place']; ?>
</a></strong>: <?php echo $this->_confs['PLIGG_Upload_Files_Place_Definition']; ?>
</p>

</fieldset>


<?php $this->config_load(upload_pligg_lang_conf, null, null); ?>
