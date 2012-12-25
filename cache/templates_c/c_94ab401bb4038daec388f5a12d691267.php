<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-17 15:52:13 PDT */  $this->config_load(auto_update_lang_conf, null, null); ?>

<fieldset><legend> <?php echo $this->_confs['AUTO_UPDATE_TITLE']; ?>
</legend>

<p><?php echo $this->_run_modifier($this->_confs['AUTO_UPDATE_STEP3_DESCRIPTION'], 'sprintf', 'PHP', 1, $this->_vars['yourversion'], $this->_vars['latestversion']); ?>
</p>

<script>
var failed = '<?php echo $this->_confs['AUTO_UPDATE_FAILED']; ?>
';
var downloaded = '<?php echo $this->_confs['AUTO_UPDATE_DOWNLOADED_OK']; ?>
';
var uploaded = '<?php echo $this->_confs['AUTO_UPDATE_UPLOADED_OK']; ?>
';

<?php echo '
var interval = new Array();
var submitted = 0;
var loaded = 0;
var XMLHttpRequestObject = false; 
if (window.XMLHttpRequest)
	XMLHttpRequestObject = new XMLHttpRequest();
else if (window.ActiveXObject)
	XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
function submitUploadForm(form)
{
    if (!check_fields(form)) return false;
    if (submitted || document.getElementById("exists").checked) return true;

    document.getElementById(\'step4\').disabled=true;

    // Hide the form 
    document.getElementById(\'myElementId\').style.display=\'block\';
    form.submit();
    return false;
}

function check_fields(form)
{
    if (document.getElementById("upload").checked)
    {
	if (form.latest.value.indexOf(\'.zip\')<=0)
	{
	    alert("Please select zip file to upload");
	    return false;
	}
    }
    return true;
}

function getStatus()
{
    if(XMLHttpRequestObject)
    {
	XMLHttpRequestObject.open("GET", "modules/auto_update/upload.php?status=1", true);
        XMLHttpRequestObject.onreadystatechange = function()
	{
	        if (XMLHttpRequestObject.readyState !=4) return;

	        if (XMLHttpRequestObject.responseText != "")
	   	{
		    if (XMLHttpRequestObject.responseText.indexOf(\'ERROR:\')==0)
		    {
    	   	    	document.getElementById(\'step4\').disabled=false;
		    	document.getElementById(\'myElementId\').style.display=\'none\';
	    	    	document.getElementById(\'status\').innerHTML="<font color=\'#ED2B2B\'>"+XMLHttpRequestObject.responseText+"</font>";
		    }
		    else if (XMLHttpRequestObject.responseText >= 100)
		    {
			document.getElementById(\'myElementId\').style.display=\'none\';
	    	        document.getElementById(\'step4\').innerHTML="<font color=\'#FFFF55\'>" + (document.getElementById("upload").checked ? uploaded : downloaded) +"</font>";
    			document.getElementById(\'step4\').disabled=false;
			document.getElementById(\'status\').innerHTML=\'\';
		        submitted = 1;
		    }
		}
		else if (++interval[1] > 120)
		{
	    	    document.getElementById(\'status\').innerHTML="<font color=\'#ED2B2B\'>"+failed+"</font>";
    	   	    document.getElementById(\'step4\').disabled=false;
		    document.getElementById(\'myElementId\').style.display=\'none\';
		}
	};
	XMLHttpRequestObject.send(null);
    }
}
'; ?>

</script>

<span id='status'></span>
<form method=post enctype="multipart/form-data" action='<?php echo $this->_vars['my_pligg_base']; ?>
/modules/auto_update/upload.php'  target='upload_iframe'>
<input type='radio' name='where' value='download' checked> Download from pligg.com<br>
<input type='radio' name='where' id='upload' value='upload'> Upload latest.zip file: <input type='file' onclick='document.getElementById("upload").checked=true;' name='latest'><br>
<input type='radio' name='where' id='exists' value='exists' <?php echo $this->_vars['exists']; ?>
> Use latest.zip file already placed in the Pligg directory<br>
</form>
<iframe name="upload_iframe" onload="if (++loaded>1) getStatus();" id="upload_iframe" style='display:none;'></iframe> 

<hr />

<a onclick='return submitUploadForm(document.forms[0]);' id='step4' href='?module=auto_update&step=4' style="border:1px solid #ccc;background:#0A5089;color:#fff;padding:6px 8px;float:left;color:#fff;display:block;"><?php echo $this->_confs['AUTO_UPDATE_CONTINUE_STEP4']; ?>
</a><br style="clear:both;" />
<span style='display: none;' !class="progressBar" id="myElementId"><img src='<?php echo $this->_vars['my_pligg_base']; ?>
/modules/auto_update/images/loader.gif'/></span>

</fieldset>

<?php $this->config_load(auto_update_pligg_lang_conf, null, null); ?>