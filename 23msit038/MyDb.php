<?php
	class MyDb
	{
		var $conn;
		function __construct()
		{
			$this->conn = new mysqli("localhost","root","","mydatabase");
			if($this->conn->connect_error)
			{
				die("Connection Failed" . $this->conn->connect_error);
			}
		}
		function insertData($empid,$empphoto,$empname,$empgender,$empdob,$empcontact,$empaddress,$empdesig,$empsalary)
		{
			$qry = "INSERT INTO tblEmployee(Emp_ID, Emp_Photo,
			Emp_Name, Emp_Gender, Emp_DOB, Emp_Contact, Emp_Address,
			Emp_Desig, Emp_Salary) VALUES(?,?,?,?,?,?,?,?,?)";
			$stmt = $this->conn->prepare($qry);
			$stmt->bind_param("issssissi",$empid,$empphoto,$empname,$empgender,$empdob,$empcontact,$empaddress,$empdesig,$empsalary);
			$cnt = $stmt->execute();
			return $cnt;
		}
		function updateData($empid,$empname,$empgender,$empdob,$empcontact,$empaddress,$empdesig,$empsalary)
		{
			$qry = "UPDATE tblEmployee SET 
			Emp_Name=?, Emp_Gender=?, Emp_DOB=?, Emp_Contact=?, Emp_Address=?, Emp_Desig=?, Emp_Salary=? WHERE Emp_ID=?";
			$stmt = $this->conn->prepare($qry);
			$stmt->bind_param("sssissii",$empname,$empgender,$empdob,$empcontact,$empaddress,$empdesig,$empsalary,$empid);
			$cnt = $stmt->execute();
			return $cnt;
		}
		function updateDataImg($empid, $empphoto, $empname,$empgender,$empdob,$empcontact,$empaddress,$empdesig,$empsalary)
		{
			$qry = "UPDATE tblEmployee SET 
			Emp_Name=?, Emp_Photo=?, Emp_Gender=?, Emp_DOB=?, Emp_Contact=?, Emp_Address=?, Emp_Desig=?, Emp_Salary=? WHERE Emp_ID=?";
			$stmt = $this->conn->prepare($qry);
			$stmt->bind_param("ssssissii",$empname, $empphoto, $empgender,$empdob,$empcontact,$empaddress,$empdesig,$empsalary,$empid);
			$cnt = $stmt->execute();
			return $cnt;
		}
		function deleteData($empid)
		{
			$qry = "DELETE FROM tblEmployee WHERE Emp_ID=?";			
			$stmt = $this->conn->prepare($qry);
			$stmt->bind_param("i",$empid);
			$cnt = $stmt->execute();
			$file = "Uploads/".$empid.".jpeg";
			if (file_exists($file)) 
			{
				unlink($file);
			}
			return $cnt;
		}
		function selectData()
		{
			$qry = "SELECT * FROM tblEmployee";
			$stmt = $this->conn->prepare($qry);
			$stmt->execute();
			$resultSet = $stmt->get_result();
			$data = $resultSet->fetch_all(MYSQLI_ASSOC);
			return $data;
		}
		function selectDataSingle($eid)
		{
			$qry = "SELECT * FROM tblEmployee WHERE Emp_ID=?";
			$stmt = $this->conn->prepare($qry);
			$stmt->bind_param("i",$eid);
			$stmt->execute();
			$resultSet = $stmt->get_result();
			$data = $resultSet->fetch_all(MYSQLI_ASSOC);
			return $data;
		}
	}
?>