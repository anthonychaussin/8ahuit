<?php 
/**
 * 
 */
class Model
{
	
	function fetch($query, $data)
	{
		$query->setFetchMode(PDO::FETCH_CLASS,get_called_class());
		$query->execute([$data]);
		return $query;
	}
	function selectAll()
	{
		return $this->fetch(((new Db())->dbString)->prepare("SELECT * FROM ".strtoupper(get_called_class())).";", null)->fetchAll();
	}
	function select()
	{
		return $this->fetch(((new Db())->dbString)->prepare("SELECT * FROM ".strtoupper(get_called_class())." WHERE id".strtolower(get_called_class()))." = ?;", [$this->id])->fetchAll();
	}
	function update()
	{
		$para = null;
		$i = 1;
		foreach ($this as $key => $value) {if ($i !=1) {$para .= " $key = $value,";}$i++;}
		
		$query = "UPDATE ".strtoupper(get_called_class())."set ".substr($para,0,strlen($para)-1)." WHERE id".strtolower(get_called_class())." = ?;";
		
		return $this->fetch(((new Db())->dbString)->prepare($query), [$this->id])->errorInfo();
	}
	function insert()
	{
		$para = null;
		$para2 = null;
		$i = 1;
		foreach ($this as $key => $value) {	if ($i !=1) {
				$para .= " $key,";
				$para2 .= "'". $value."',";
			}$i++;}
		return $this->fetch(((new Db())->dbString)->prepare("INSERT INTO ".strtoupper(get_called_class())." (".substr($para,0,strlen($para)-1).") VALUES (".substr($para2,0,strlen($para2)-1).");"), null)->errorInfo();
	}
	function delete()
	{
		return $this->fetch(((new Db())->dbString)->prepare("DELETE FROM ".strtoupper(get_called_class())." WHERE id".strtolower(get_called_class())." = ?;"), null)->errorInfo();
	}
	function fonctionDb($function, $param)
	{
		(new Db())->special(get_called_class());
		$para = null;
		foreach ($param as $value) {$para .= $value . ' ,';}
		return $function(substr($para,0,strlen($para)-1));
	}
	function __get($Attr){
		return $this->$Attr;
	}
	function __set($Attr, $Value){
		$this->$Attr = $Value;
	}
}