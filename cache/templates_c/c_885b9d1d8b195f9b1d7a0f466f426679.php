<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2012-12-25 16:59:05 ART */  echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_module_social_bookmark_start"), $this); $this->config_load(social_bookmark_lang_conf, null, null); ?>
<span id="linksummaryAddLink">
	<a href="javascript://" onclick="var replydisplay=document.getElementById('addto-<?php echo $this->_vars['link_shakebox_index']; ?>
').style.display ? '' : 'none';document.getElementById('addto-<?php echo $this->_vars['link_shakebox_index']; ?>
').style.display = replydisplay;"> <img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/compartir.png" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en..." /></a>&nbsp;
</span>
<span id="addto-<?php echo $this->_vars['link_shakebox_index']; ?>
" style="display:none">
<div style="position:absolute;display:block;background:#fff;padding:10px;margin:10px 0 0 100px;font-size:12px;border:2px solid #000;">

&nbsp;&nbsp;<a title="submit '<?php echo $this->_vars['title_short']; ?>
' to del.icio.us" href="http://del.icio.us/post" onclick="window.open('http://del.icio.us/post?v=4&amp;noui&amp;jump=close&amp;url=<?php echo $this->_vars['enc_url']; ?>
&amp;title=<?php echo $this->_vars['enc_title_short']; ?>
', '<?php echo $this->_confs['PLIGG_Visual_LS_Delicious']; ?>
','toolbar=no,width=700,height=400'); return false;"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/delicious.png" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en del.icio.us" /></a>

&nbsp;&nbsp;<a title="submit '<?php echo $this->_vars['title_short']; ?>
' to digg" href="http://digg.com/submit?phase=2&amp;url=<?php echo $this->_vars['enc_url']; ?>
&amp;title=<?php echo $this->_vars['title_short']; ?>
&amp;bodytext=<?php echo $this->_vars['story_content']; ?>
"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/digg.png" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en digg" /></a>

&nbsp;&nbsp;<a title="submit '<?php echo $this->_vars['title_short']; ?>
' to reddit" href="http://reddit.com/submit?url=<?php echo $this->_vars['enc_url']; ?>
&amp;title=<?php echo $this->_vars['title_short']; ?>
"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/reddit.gif" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en reddit" /></a>

&nbsp;&nbsp;<a title="submit '<?php echo $this->_vars['title_short']; ?>
' to facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $this->_vars['enc_url']; ?>
&t=<?php echo $this->_vars['title_short']; ?>
"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/facebook.gif" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en facebook" /></a>

&nbsp;&nbsp;<a title="submit '<?php echo $this->_vars['title_short']; ?>
' to technorati" href="http://www.technorati.com/faves?add=<?php echo $this->_vars['enc_url']; ?>
"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/technorati.gif" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en technorati" /></a>

&nbsp;&nbsp;<a title="submit '<?php echo $this->_vars['title_short']; ?>
' to slashdot" href="http://slashdot.org/bookmark.pl?url=<?php echo $this->_vars['enc_url']; ?>
&title=<?php echo $this->_vars['title_short']; ?>
"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/slashdot.gif" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en slashdot" /></a>

&nbsp;&nbsp;<a title="submit '<?php echo $this->_vars['title_short']; ?>
' to Stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo $this->_vars['enc_url']; ?>
&amp;title=<?php echo $this->_vars['title_short']; ?>
"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/icon-stumbleupon.gif" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en Stumbleupon" /></a>

&nbsp;&nbsp;<a title="submit '<?php echo $this->_vars['title_short']; ?>
' to Windows Live" href="https://favorites.live.com/quickadd.aspx?url=<?php echo $this->_vars['enc_url']; ?>
&title=<?php echo $this->_vars['title_short']; ?>
"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/windowslive.gif" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en Windows Live" /></a>

&nbsp;&nbsp;<a title="submit '<?php echo $this->_vars['title_short']; ?>
' to squidoo" href="http://www.squidoo.com/lensmaster/bookmark?<?php echo $this->_vars['enc_url']; ?>
"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/squidoo.gif" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en squidoo" /></a>

&nbsp;&nbsp;<a title="submit '<?php echo $this->_vars['title_short']; ?>
' to yahoo" href="http://myweb2.search.yahoo.com/myresults/bookmarklet?u=<?php echo $this->_vars['enc_url']; ?>
&amp;title=<?php echo $this->_vars['title_short']; ?>
"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/yahoomyweb.png" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en yahoo" /></a>

&nbsp;&nbsp;<a title="submit '<?php echo $this->_vars['title_short']; ?>
' to google" href="http://www.google.com/bookmarks/mark?op=edit&bkmk=<?php echo $this->_vars['enc_url']; ?>
&title=<?php echo $this->_vars['title_short']; ?>
"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/googlebookmarks.gif" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en google" /></a>

&nbsp;&nbsp;<a title="submit '<?php echo $this->_vars['title_short']; ?>
' to ask" href=" http://myjeeves.ask.com/mysearch/BookmarkIt?v=1.2&t=webpages&url=<?php echo $this->_vars['enc_url']; ?>
&title=<?php echo $this->_vars['title_short']; ?>
"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/ask.gif" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en ask" /></a>

&nbsp;&nbsp;<a title="submit '<?php echo $this->_vars['title_short']; ?>
' to twitter" href="http://twitter.com/home?status=<?php echo $this->_vars['enc_url']; ?>
&t=<?php echo $this->_vars['title_short']; ?>
"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/modules/social_bookmark/images/twitter.png" border="0" alt="compartir '<?php echo $this->_vars['title_short']; ?>
' en twitter" /></a>
<hr />
<p style="font-size:16px;font-weight:bold;margin:0px;">Story URL</p>
<?php echo '
<script type="text/javascript">
function select_all()
{
var text_val=eval("document.storyurl.thisurl");
text_val.focus();
text_val.select();
}
</script>
'; ?>

<form name="storyurl"><input type="text" name="thisurl" size="92" onClick="select_all();" value="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['story_url']; ?>
"></form>
</div>
</span>

<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_module_social_bookmark_end"), $this); $this->config_load(social_bookmark_pligg_lang_conf, null, null); ?>
