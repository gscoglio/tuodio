<?php
/**
 * This file is only for the class 'Database'
 * @author gonzalo aizpun
 */
class Database {

	var $server   = "";
	var $user     = "";
	var $pass     = "";
	var $database = "";
	var $pre      = "";
	var $record = array();
	var $error = "";
	var $errno = 0;
	var $field_table= "";
	var $affected_rows = 0;
	var $link_id = 0;
	var $query_id = 0;

	/**
	 * The Constructor for the class
	 *
	 * @param string $server
	 * @param string $user
	 * @param string $pass
	 * @param string $database
	 * @param string $pre
	 * @return Database
	 */
	function Database($server=DB_HOST, $user=DB_USER, $pass=DB_PASS, $database=DB_BASE){
		$this->server=$server;
		$this->user=$user;
		$this->pass=$pass;
		$this->database=$database;
	}

	/**
	 * This function just connect to mySql or die
	 *
	 */
	function connect() {
		$this->link_id=@mysql_connect($this->server,$this->user,$this->pass);

		if (!$this->link_id) {
			$this->oops("Could not connect to server: <b>$this->server</b>.");
		}

		if(!@mysql_select_db($this->database, $this->link_id)) {//no database
			$this->oops("Could not open database: <b>$this->database</b>.");
		}

		// unset the data so it can't be dumped
		$this->server='';
		$this->user='';
		$this->pass='';
		$this->database='';
	}

	/**
	 * Close mysql active connection
	 *
	 */
	function close() {
		if(!mysql_close()){
			$this->oops("Connection close failed.");
		}
	}

	/**
	 * Escapes characters to be mysql ready
	 *
	 * @param string $string
	 * @return string
	 */
	function escape($string) {
		if(get_magic_quotes_gpc()) $string = stripslashes($string);
		if (!$this->link_id) {
			$this->connect();
		}
		if (!is_resource($this->link_id)) {
			$this->oops("Cant escape string in database class");
		}
		return mysql_real_escape_string($string, $this->link_id);
	}

	/**
	 * This function execute a query to an open connection
	 *
	 * @param string $sql
	 * @return query_id for fetching results...
	 */
	function query($sql) {

		if (!$this->link_id) {
			$this->connect();
		}
		
		$this->query_id = @mysql_query($sql, $this->link_id);

		if (!$this->query_id) {
			$this->oops("<b>MySQL Query fail:</b> $sql");
		}
		 
		$this->affected_rows = @mysql_affected_rows();

		return $this->query_id;
	}

	/**
	 * This functions is usefull for execute a query
	 * that must return one result (frees resulset)
	 *
	 * @param string $query_string.
	 * @return array
	 */
	function query_first($query_string) {
		$query_id = $this->query($query_string);
		$out = $this->fetch_array($query_id);
		$this->free_result($query_id);
		return $out;
	}

	/**
	 * This function returns the next row into an array
	 *
	 * @param int $query_id for mysql run. If none specified, last used.
	 * @return array
	 */
	function fetch_array($query_id=-1) {

		if ($query_id!=-1) {
			$this->query_id=$query_id;
		}

		if (isset($this->query_id)) {
			$this->record = @mysql_fetch_assoc($this->query_id);
		}else{
			$this->oops("Invalid query_id: <b>$this->query_id</b>. Records could not be fetched.");
		}


		if($this->record){
			$this->record=array_map("stripslashes", $this->record);
		}
		return $this->record;
	}

	/**
	 * This function returns all data into an array
	 *
	 * @param string $sql
	 * @return array
	 */
	function fetch_all_array($sql) {
		$query_id = $this->query($sql);
		$out = array();

		while ($row = $this->fetch_array($query_id, $sql)){
			$out[] = $row;
		}

		$this->free_result($query_id);
		return $out;
	}

	/**
	 * Frees the resultset
	 *
	 * @param int $query_id for mysql run. if none specified, last used
	 */
	function free_result($query_id=-1) {
		if ($query_id!=-1) {
			$this->query_id=$query_id;
		}
		if(!@mysql_free_result($this->query_id)) {
			$this->oops("Result ID: <b>$this->query_id</b> could not be freed.");
		}
	}

	/**
	 * does an update query with an array
	 *
	 * @param string $table
	 * @param array $data (assoc array with data, doesn't need escaped)
	 * @param string $where condition
	 * @return query_id for fetching results, etc.
	 */
	function query_update($table, $data, $where='1') {
		$q="UPDATE `".$this->pre.$table."` SET ";

		foreach($data as $key=>$val) {
			if(strtolower($val)=='null') $q.= "`$key` = NULL, ";
			elseif(strtolower($val)=='now()') $q.= "`$key` = NOW(), ";
			else $q.= "`$key`='".$this->escape($val)."', ";
		}

		$q = rtrim($q, ', ') . ' WHERE '.$where.';';

		return $this->query($q);
	}

	/**
	 * Does an insert query with an array
	 *
	 * @param string $table
	 * @param array $data (assoc array with data, doesn't need escaped)
	 * @return query_id for fetching results, etc.
	 */
	function query_insert($table, $data) {
		$q="INSERT INTO `".$this->pre.$table."` ";
		$v=''; $n='';

		foreach($data as $key=>$val) {
			$n.="`$key`, ";
			if(strtolower($val)=='null') $v.="NULL, ";
			elseif(strtolower($val)=='now()') $v.="NOW(), ";
			else $v.= "'".$this->escape($val)."', ";
		}

		$q .= "(". rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");";

		return (($this->query($q)) ? true : false);

	}

	/**
	 * Search for match almost 1 row... return boolean
	 *
	 * @param string $sql
	 * @return boolean
	 */
	function query_exists($sql) {
		$this->query($sql);
		return ($this->affected_rows==0) ? false : true;
	}
	
	/**
	 * Show an error message and then die
	 *
	 * @param string $msg
	 */
	function oops($msg='') {
		if($this->link_id>0){
			$this->error=mysql_error($this->link_id);
			$this->errno=mysql_errno($this->link_id);
		}else{
			$this->error=mysql_error();
			$this->errno=mysql_errno();
		}
		die($msg . " - mysql_error");
	}

}
?>
