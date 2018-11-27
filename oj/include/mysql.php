<?php
class db {
    private $db_link = null;
    private $db_name = '';
    private $debug = false;
    private $log = null;
    private $cur_host = '';
    private $cur_user = '';
    private $cur_pass = '';
    
    function __construct($db_host, $db_user, $db_password, $db_name, $db_create = false) {
        $this->db_link = @mysql_connect($db_host, $db_user, $db_password, true) or exit("Can't connect MySQL server($db_host)!");
        if ($db_create) {
            $this->query("CREATE DATABASE IF NOT EXISTS `{$db_name}` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
        }
        @mysql_select_db($db_name, $this->db_link) or exit("Can't select MySQL database({$db_name})!");
        @mysql_query("set names 'utf8'", $this->db_link);
        $this->db_name = $db_name;
        
        if($this->debug){
            $this->log = fopen(ROOTPATH."sql.log", "a") or die("Unable to open file!");
        }
        $this->cur_host = $db_host;
        $this->cur_user = $db_user;
        $this->cur_pass = $db_password;
    }
    
    function __destruct() {
        if ($this->db_link) {
            mysql_close($this->db_link);
        }
        
        if($this->debug){
            fclose($this->log);
        }
    }
    
    function open_debug(){
        $this->log = fopen(ROOTPATH."sql.log", "a") or die("Unable to open file!");
        $this->debug = true;
    }
    
    function close_debug(){
        mysql_close($this->db_link);
        $this->debug = false;
    }
    
    /**
     *
     * @link http://www.gaoyiping.com/GPK/help.php
     * @param unknown $sqlcmd
     */
    function query($sqlcmd,$debug = false) {
        //$time_start = getmicrotime();
        $res = mysql_query($sqlcmd, $this->db_link);
        if(!$res &&
            (mysql_errno($this->db_link) == 2006  //MySQL server has gone away
                ||mysql_errno($this->db_link) == 2002  //Connection timed out
                ||mysql_errno($this->db_link) == 2013  //
                )){
                    $this->db_link = @mysql_connect($this->cur_host, $this->cur_user, $this->cur_pass, false);
                    if(!$this->db_link){
                        return false;
                    }
                    if(!@mysql_select_db($this->db_name, $this->db_link)){
                        return false;
                    };
                    @mysql_query("set names 'utf8'", $this->db_link);
                    $res = mysql_query($sqlcmd, $this->db_link);
        }
        //$time_end = getmicrotime();
        if ($debug)
        {
            return $sqlcmd;
        }
        if($this->debug){
            fwrite($this->log , '['.$time_start.']');
            fwrite($this->log , "\r\n");
            fwrite($this->log , $time_end - $time_start);
            fwrite($this->log , "   ");
            fwrite($this->log , $sqlcmd);
            fwrite($this->log , "\r\n");
            fwrite($this->log , '['.$time_end.']');
            fwrite($this->log , "\r\n");
        }
        return $res;
    }
    
    /**
     *
     * @link http://www.gaoyiping.com/GPK/help.php
     * @param unknown $table
     * @param unknown $values
     */
    function insert($table, $values, $debug = false) {
        $ks = '';
        $vs = '';
        foreach ($values as $key => $value) {
            $ks .= $ks ? ",`{$key}`" : "`{$key}`";
            if (!is_null($value))
            {
                $value = mysql_real_escape_string($value);
                $vs .= $vs ? ",'{$value}'" : "'{$value}'";
            }
            else
            {
                $vs .= $vs ? ",NULL" : "NULL";
            }
        }
        $sqlcmd = "INSERT INTO `{$table}` ({$ks}) VALUES ({$vs})";
        return $this->query($sqlcmd,$debug);
    }
    
    /**
     *
     * @link http://www.gaoyiping.com/GPK/help.php
     * @param unknown $table
     * @param unknown $values
     * @param string $condition
     */
    function update($table, $values, $condition = "", $debug = false) {
        $v = "";
        foreach ($values as $key => $value) {
            if(!is_null($value))
            {
                $value = mysql_real_escape_string($value);
                $v .= $v ? ",`{$key}`='{$value}'" : "`{$key}`='{$value}'";
            }
            else
            {
                $v .= $v ? ",`{$key}`= NULL" : "`{$key}`= NULL";
            }
        }
        $sqlcmd = "UPDATE `{$table}` SET {$v} WHERE {$condition}";
        return $this->query($sqlcmd,$debug);
    }
    
    /**
     *
     * @link http://www.gaoyiping.com/GPK/help.php
     * @param unknown $table
     * @param string $condition
     */
    function delete($table, $condition = "", $debug = false) {
        if (empty($condition) || $condition == '') {
            $sqlcmd = "DELETE FROM `$table`";
        } else {
            $sqlcmd = "DELETE FROM `{$table}` WHERE {$condition}";
        }
        return $this->query($sqlcmd,$debug);
    }
    
    /**
     *
     * @link http://www.gaoyiping.com/GPK/help.php
     * @param unknown $sqlcmd
     */
    function count($sqlcmd) {
        $result = $this->query($sqlcmd);
        if ($result)
            return mysql_num_rows($result);
            return 0;
    }
    
    /**
     *
     * @link http://www.gaoyiping.com/GPK/help.php
     * @param unknown $sqlcmd
     */
    function row($sqlcmd) {
        $result = $this->query($sqlcmd);
        if ($result) {
            $data = array();
            while ($row = mysql_fetch_assoc($result)) {
                $data[] = $row;
            }
            @mysql_free_result($result);
            return $data;
        }
        return false;
    }
    
    /**
     *
     * @link http://www.gaoyiping.com/GPK/help.php
     * @param unknown $sqlcmd
     */
    function one($sqlcmd) {
        $result = $this->query($sqlcmd . ' LIMIT 0,1');
        if ($result) {
            $data = mysql_fetch_assoc($result);
            @mysql_free_result($result);
            if ($data) {
                return $data;
            }
        }
        return false;
    }
    
    function first($sqlcmd){
        $result = $this->query($sqlcmd);
        if ($result) {
            $data = mysql_fetch_assoc($result);
            @mysql_free_result($result);
            if ($data) {
                return $data;
            }
        }
        return false;
    }
    
    /**
     *
     * @link http://www.gaoyiping.com/GPK/help.php
     * @param unknown $table
     * @return Ambigous <boolean, multitype:>
     */
    function valid($table) {
        $sqlcmd = "SELECT * FROM `{$table}` WHERE `valid`=1";
        return $this->one($sqlcmd);
    }
    
    /**
     *
     * @link http://www.gaoyiping.com/GPK/help.php
     */
    function table() {
        $table = array();
        $result = $this->query("SHOW TABLES FROM {$this->db_name}");
        while ($row = mysql_fetch_row($result)) {
            $table[] = $row[0];
        }
        return $table;
    }
    
    /**
     *
     * @link http://www.gaoyiping.com/GPK/help.php
     */
    function export() {
        $table = $this->table();
        $sqlcmd = '';
        foreach ($table as $v) {
            $sqlcmd .= "DROP TABLE IF EXISTS `$v`;\n";
            $rs = mysql_fetch_row(mysql_query("show create table $v"));
            $sqlcmd .= $rs[1] . ";\n\n";
        }
        foreach ($table as $v) {
            $res = $this->query("select * from $v");
            $fild = mysql_num_fields($res);
            while ($rs = mysql_fetch_array($res)) {
                $comma = "";
                $sqlcmd .= "INSERT INTO $v VALUES(";
                for($i = 0; $i < $fild; $i++) {
                    $sqlcmd .= $comma . "'" . mysql_escape_string($rs[$i]) . "'";
                    $comma = ",";
                }
                $sqlcmd .= ");\n";
            }
            $sqlcmd .= "\n";
        }
        return $sqlcmd;
    }
    
    /**
     *
     * @link http://www.gaoyiping.com/GPK/help.php
     */
    function id() {
        return mysql_insert_id($this->db_link);
    }
    
    /**
     *
     * @link http://www.gaoyiping.com/GPK/help.php
     */
    function version() {
        return mysql_get_server_info($this->db_link);
    }
    
    function begin(){
        return $this->query("BEGIN");
    }
    
    function rollback(){
        return $this->query("ROLLBACK");
    }
    
    function commit(){
        return $this->query("COMMIT");
    }
    
    function end(){
        return $this->query("END");
    }
    
    function lock($table){
        return $this->query("LOCK TABLES {$table}  WRITE");
    }
    
    function unlock(){
        return $this->query("UNLOCK TABLES");
    }
}
?>
