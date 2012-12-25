<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-17 15:49:53 PDT */  if ($this->_vars['isAdmin'] == 1): ?>
	<?php 
		
		$canIhaveAccess = 0;
		$canIhaveAccess = $canIhaveAccess + checklevel('god');
		
		if($canIhaveAccess == 1)
		{
			if($_REQUEST['dobackup'] == "files"){
				include ('../libs/backup/file_backup/backup.php');
				$FileBackup = new FileBackup;
				$FileBackup->MakeBackup();
				//echo "<HR>";
				header("Location: admin_backup.php");
			}
			if($_REQUEST['dobackup'] == "avatars"){
				include ('../libs/backup/file_backup/backup.php');
				$FileBackup = new FileBackup;
				$FileBackup->MakeAvatarBackup();
				//echo "<HR>";
				header("Location: admin_backup.php");
			}
			if($_REQUEST['dobackup'] == "database"){
				//require_once("../libs/backup/mysql_backup/init.php");
				//$b = new backup;
				//$b->dbconnect($GonxAdmin["dbhost"],$GonxAdmin["dbuser"],$GonxAdmin["dbpass"],$GonxAdmin["dbname"],"", $GonxAdmin["dbtype"]);
				//echo $b->generate();
				//echo $b->tablesbackup();
				require("../libs/backup/mysql_backup/backup.php");
				
			}
			if($_REQUEST['dobackup'] == "clearall"){
				
				// http://www.phpbbstyles.com/viewtopic.php?t=2278
			 $files = array();  
			 $dir = opendir('./backup');  
			 while(($file = readdir($dir)) !== false)  
			 {  
			  if($file !== '.' && $file !== '..' && !is_dir($file) && $file !== 'index.htm')  
			  {  
			    $files[] = $file;  
			  }  
			 }  
			 closedir($dir);  
			 sort($files);  
			 for($i=0; $i<count($files); $i++)  
			 {  
			  unlink('./backup/'.$files[$i]);
			 }  
				header("Location: admin_backup.php");
			}
			
			// v1.0 was the base
			// v1.1 added avatar backup seperately.
			
			echo "<fieldset><legend><img src=".my_pligg_base."/templates/admin/images/manage_backup.gif align=absmiddle /> ";  echo $this->_confs['PLIGG_Visual_AdminPanel_Backup'];  echo "</legend>";
			echo '<h3>';  echo $this->_confs['PLIGG_Visual_View_Backup'];  echo':</h3><img src="'.my_pligg_base.'/templates/admin/images/backup_files.gif" align="absmiddle" /> <a href = "?dobackup=files">';  echo $this->_confs['PLIGG_Visual_View_Backup_Files'];   echo'</a><br>';
			echo '<img src="'.my_pligg_base.'/templates/admin/images/backup_avatars.gif" align="absmiddle" /> <a href = "?dobackup=avatars">';  echo $this->_confs['PLIGG_Visual_View_Backup_Avatars'];  echo'</a><br>';
			echo '<img src="'.my_pligg_base.'/templates/admin/images/backup_db.gif" align="absmiddle" /> <a href = "?dobackup=database">';  echo $this->_confs['PLIGG_Visual_View_Backup_Database'];  echo'</a><br><br>';
			echo "<h4 style='border:none'>";  echo $this->_confs['PLIGG_Visual_View_Backup_Previous'];  echo"</h4>";
			echo '<img src="'.my_pligg_base.'/templates/admin/images/backup_remove.gif" align="absmiddle" /> <a href = "?dobackup=clearall">';  echo $this->_confs['PLIGG_Visual_View_Backup_Remove'];  echo'</a><hr><br>';
			
			
			// http://www.phpbbstyles.com/viewtopic.php?t=2278
		 $files = array();  
		 $dir = opendir('./backup');  
		 while(($file = readdir($dir)) !== false)  
		 {  
		  if($file !== '.' && $file !== '..' && !is_dir($file) && $file !== 'index.htm')  
		  {  
		    $files[] = $file;  
		  }  
		 }  
		 closedir($dir);  
		 sort($files);  
		 for($i=0; $i<count($files); $i++)  
		 {  
		  echo '<a href = "./backup/' . $files[$i] . '">' . $files[$i] . '</a><BR>';  
		 }  
		echo '</fieldset>';	
		}
		else
		{
			echo "Access denied";
		}
		
		
		function isWriteable ( $canContinue, $file, $mode, $desc ) 
		{
			@chmod( $file, $mode );
			$good = is_writable( $file ) ? 1 : 0;
			Message ( $desc.' is writable: ', $good );
			return ( $canContinue && $good );
		}
		function Message( $message, $good )
		{
			if ( $good )
				$yesno = '<b><font color="green">Yes</font></b>';
			else
			{
				$yesno = '<b><font color="red">No</font></b>';
				echo $message .'</td><td>'. $yesno .'<BR/>';
			}
		}
		
	 ?>



<?php else: ?>
	<?php echo $this->_confs['PLIGG_Visual_Header_AdminPanel_NoAccess']; ?>

<?php endif; ?>
