<?php
 class CAdmin
 {
 	private $userId;
 	private $username;
 	private $email;
 	private $userType;
 	private $is_delete;
 	private $selectedPkgId;
 	private $cFee;
 	public function __construct(){}
 	
 	public function login($username, $password)
 	{
 		global $db;
		$md5password = md5($password);
		$sql = 'SELECT id,usertype,is_delete,package_id,c_fee FROM '.DB_PREFIX.'admin WHERE username="'.$username.'" AND password="'.$md5password.'"';
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		
		if (!empty($row))
		{
			$this->userId = $row['id'];
			$this->userType = $row['usertype'];
			$this->is_delete = $row['is_delete'];
			$this->selectedPkgId = $row['package_id'];
			$this->cFee = $row['c_fee'];
			return true;
		}
		return false;
 	}
 	
 	public function getId()
 	{
 		return $this->userId;
 	}
 	public function getType()
 	{
 		return $this->userType;
 	}
 	public function getDelelte()
 	{
 		return $this->is_delete;
 	
 	}
 	public function getSelectedPkg()
 	{
 		return $this->selectedPkgId;
 	}
 	 	public function cFee()
 	{
 		return $this->cFee;
 	}
 }
?>