<?php
class wellness
{
	var $con; 
	function __construct()
	{
		$this->con = new mysqli('localhost','root','Narola@21','wellness_consultancy');
		// $this->con = new mysqli('mysql.hostinger.in','u440683875_well','wellness123','u440683875_welll');
		if(!$this->con)
		{
			die("error:".$this->con->connect_error());
		}
	}

	function datavalue($v)
	{
		return("'".mysqli_real_escape_string($this->con,trim($v))."'");
	}

	function insert($table,$data)
	{
		$key = array_keys($data);
		$values = array_map(array($this, 'datavalue'),$data);
		$str = 'insert into '.$table.' ('.implode(',',$key).') values('.implode(',',$values).')';
		$status = $this->con->query($str) or die('Error:'.$this->con->error."<br>".$str);
		if($status)
		{
			return $this->con->insert_id;
		}
		else
		{
			return 0;
		}
	}

	function delete($table,$id)
	{
		$str = '';
		if(is_array($id))
		{
			$str = 'delete from '.$table.' where id in ('.implode(',',$id).')';
		}
		else
		{
			$str = 'delete from '.$table.' where id='.$id;
		}
		
		
		$status = $this->con->query($str) or die('Error:'.$this->con->error."<br>".$str);
		if($status)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}

	function update($table,$data,$id)
	{
		$data = array_map(array($this, 'datavalue'),$data);
		$set ='set ';
		foreach ($data as $key => $value) 
		{
			$set .= $key.'='.$value.',';				
		}
		$set = trim($set,',');
		
		$str = 'update '.$table.' '.$set.' where id='.$id;

		$status = $this->con->query($str) or die('Error:'.$this->con->error."<br>".$str);
		if($status)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}

	function select($table)
	{
		$sql = 'select * from '.$table;	
		$ref = $this->con->query($sql) or die('Error:'.$this->con->error."<br>".$sql);
		$data = mysqli_fetch_all($ref,MYSQLI_ASSOC);
		return $data;
	}

	function query($sql)
	{
		$ref = $this->con->query($sql) or die('Error:'.$this->con->error."<br>".$sql);
		$data = mysqli_fetch_all($ref,MYSQLI_ASSOC);
		return $data;	
	}
	
	function deleteByColumn($table,$column,$value)
		{
			$str = '';
			if(is_array($value))
			{
				$str = 'delete from '.$table.' where '.$column.' in ('.implode(',',$value).')';
			}
			else
			{
				$str = 'delete from '.$table.' where '.$column.'='.$value;
			}
			
			
			$status = $this->con->query($str) or die('Error:'.$this->con->error."<br>".$str);
			if($status)
			{
				return true;
			}
			else
			{
				return false;
			}	
		}
}
