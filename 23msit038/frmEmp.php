<script type='text/javascript'>
	function funReset()
	{
		
		var txtSearchID = document.getElementById('txtSearchID');
		var txtEmpID = document.getElementById('txtEmpID');
		var file1 = document.getElementById('file1');
		var txtEmpName = document.getElementById('txtEmpName');
		var rdbGender = document.getElementById('rdbGender');
		var txtEmpDOB= document.getElementById('txtEmpDOB');
		var txtContact = document.getElementById('txtContact');
		var txtAddress = document.getElementById('txtAddress');
		var ddlDesignation = document.getElementById('ddlDesignation');
		var txtSalary = document.getElementById('txtSalary');
		var img1 = document.getElementById('img1');
		txtSearchID.value="";
		txtEmpID.value="";
		file1.value="";
		img1.src = "";
		img1.alt = "No Image";
		txtEmpName.value = "";
		rdbGender.checked=false;
		txtEmpDOB.value = "";
		txtContact.value="";
		txtAddress.value="";
		ddlDesignation.value="";
		txtSalary.value="";
		
	}
</script>
<?php
	include "MyDb.php";
	$obj = new MyDb();
	if(isset($_POST['btnSearch']))
	{
		$eid = $_POST['txtSearchID'];
		$result = $obj->selectDataSingle($eid);
		if(!$result) 
		{
			echo "<script type='text/javascript'> alert('no data found'); </script>";
		}
		else
		{
			$row = $result[0];
		}
	}	
	else if(isset($_POST['btnDelete']))
	{
		$eid = $_POST['txtEmpID'];
		$result = $obj->deleteData($eid);
		if(!$result) 
		{
			echo "<script type='text/javascript'> alert('no records deleted'); </script>";
		}
		else
		{
			echo "<script type='text/javascript'> alert('".$result." records deleted'); </script>";
		}
	}
?>
<html>
<head> <title> Employee Form </title>
</head>
<body>
	<form method="post" action="frmEmp.php" enctype="multipart/form-data">

		<table border="2" align="center">
			<tr>
				<td> Search Employee ID: </td>
				<td> <input type='text' name='txtSearchID' id='txtSearchID'/> </td>
				<td> <input type='submit' name='btnSearch' value="Search"/> </td>
			</tr>
		</table>
		<br>
		<table border="2" align="center">
			<tr>
				<td> Employee ID: </td>
				<td> <input type='text' name='txtEmpID' id='txtEmpID'
				value = <?php if(isset($row['Emp_ID'])) echo $row['Emp_ID'];?> 
					> </td>
			</tr>
			<tr>
				<td> Employee Photo: </td>
				<td>
				<table border='1px'>
				<tr> <td>
				<img id='img1' src="
				<?php
					if(isset($imgPath))
					{
						echo $imgPath;
					}
					elseif(isset($row['Emp_Photo']))
					{ 
						echo $row['Emp_Photo']; 
					}
				?>
				" height="50px" width="50px"/> 
				</td> <td>
				<input type='file' name='file1' id='file1'/> </td> </tr>
				</table>
				</td>
				 
			</tr>
			<tr>
				<td> Employee Name: </td>
				<td> <input type='text' name='txtEmpName' id='txtEmpName'
			value = <?php if(isset($row['Emp_Name'])) echo $row['Emp_Name'];?> >
				 </td> 
			</tr>
			<tr>
				<td> Employee Gender: </td>
				<td> <input type='radio' Value="Male" name='rdbGender' id='rdbGender'
			<?php if(isset($row['Emp_Gender']))
			{
				if($row['Emp_Gender'] == "Male") echo "Checked";	
			}?> 
					/> Male
				     <input type='radio' Value="Female" name='rdbGender' id='rdbGender'
			<?php if(isset($row['Emp_Gender']))
			{
				if($row['Emp_Gender'] == "Female") echo "Checked";	
			}?> 

				/> Female 
				</td> 
			</tr>
			<tr>
				<td> Employee Date of Birth: </td>
				<td> <input type='date' name='txtEmpDOB' id='txtEmpDOB'
			value = <?php if(isset($row['Emp_DOB'])) echo $row['Emp_DOB'];?>
				> </td> 
			</tr>
			<tr>
				<td> Employee Contact: </td>
				<td> <input type='text' name='txtContact'  id = 'txtContact'
		value = <?php if(isset($row['Emp_Contact'])) echo $row['Emp_Contact'];?>
				> </td> 
			</tr>
			<tr>
				<td> Employee Address: </td>
				<td>
				<textarea rows="5" cols="21" name='txtAddress' id='txtAddress'>
				<?php if(isset($row['Emp_Address'])) echo $row['Emp_Address'];?> 
				</textarea>  
				</td> 
			</tr>
			<tr>
				<td> Employee Designation: </td>
				<td>
					<select name='ddlDesignation' id='ddlDesignation'>
					<option value='C.E.O' 
			<?php if(isset($row['Emp_Desig']))
			{
				if($row['Emp_Desig'] == "C.E.O") echo "selected";	
			}?> 

			> C.E.O </option>
					<option value='Team Leader'
			<?php if(isset($row['Emp_Desig']))
			{
				if($row['Emp_Desig'] == "Team Leader") echo "selected";	
			}?>

		 > Team Leader </option>
					<option value='Programmer'

			<?php if(isset($row['Emp_Desig']))
			{
				if($row['Emp_Desig'] == "Programmer") echo "selected";	
			}?>

> Programmer </option>
					</select> 
				</td> 
			</tr>
			<tr>
				<td> Employee Salary: </td>
				<td> <input type='number' name='txtSalary' id='txtSalary'
			value = <?php if(isset($row['Emp_Salary'])) echo $row['Emp_Salary'];?>

			> </td> 
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" name='btnInsert' value="Insert"/>
			&nbsp;	<input type="submit" name='btnUpdate' value="Update"/>
			&nbsp;	<input type="submit" name='btnDelete' value="Delete"/>
			&nbsp;	<input type="button" value="Reset" onClick="funReset()"/>  
				</td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
	
	if(isset($_POST['btnInsert']))
	{
		$empid = $_POST['txtEmpID'];
		$empPhoto = "";
		$empName = $_POST['txtEmpName'];
		$empGender = $_POST['rdbGender'];
		$empDOB = $_POST['txtEmpDOB'];
		$empContact = $_POST['txtContact'];
		$empAddress = $_POST['txtAddress'];
		$empDesig = $_POST['ddlDesignation'];
		$empSalary = $_POST['txtSalary'];
		if(isset($_FILES['file1']['tmp_name']))
		{
			move_uploaded_file($_FILES['file1']['tmp_name'],"Uploads/".$empid.".jpeg");
			$empPhoto = "Uploads/".$empid.".jpeg";
		}
		$cnt = $obj->insertData($empid , $empPhoto , $empName , $empGender ,
		$empDOB , $empContact , $empAddress , $empDesig, $empSalary );	
		echo $cnt . " rows inserted";
	}
	else if(isset($_POST['btnUpdate']))	
	{
		$empid = $_POST['txtEmpID'];
		$empName = $_POST['txtEmpName'];
		$empGender = $_POST['rdbGender'];
		$empDOB = $_POST['txtEmpDOB'];
		$empContact = $_POST['txtContact'];
		$empAddress = $_POST['txtAddress'];
		$empDesig = $_POST['ddlDesignation'];
		$empSalary = $_POST['txtSalary'];
		if(isset($_FILES['file1']['tmp_name']))
		{
			move_uploaded_file($_FILES['file1']['tmp_name'],"Uploads/".$empid.".jpeg");
			$empPhoto = "Uploads/".$empid.".jpeg";
			$cnt = $obj->updateDataImg($empid , $empPhoto, $empName , $empGender , $empDOB , $empContact , $empAddress , $empDesig, $empSalary );
		}
		else
		{
			$cnt = $obj->updateData($empid , $empName , $empGender , $empDOB , $empContact , $empAddress , $empDesig, $empSalary );
		}
		
		echo $cnt . " rows updated";
	}
	// Displaying data 
	$result = $obj->selectData();
	echo "<br><br> <table border='2px' align='center'>";
	echo "<tr>
		<th> Employee ID </th>
		<th> Employee Photo </th>
		<th> Employee Name </th>
		<th> Employee Gender </th>
		<th> Employee DOB </th>
		<th> Employee Contact </th>
		<th> Employee Address </th>
		<th> Employee Designation </th>
		<th> Employee Salary </th> 
	</tr>";
	foreach($result as $row)
	{
		echo "<tr align='center'>
			<td>". $row['Emp_ID']. "</td> 
			<td><img src=". $row['Emp_Photo']. " height='50px' width='50px' alt='no image' /></td> 
			<td>". $row['Emp_Name']. "</td> 
			<td>". $row['Emp_Gender']. "</td> 
			<td>". $row['Emp_DOB']. "</td> 
			<td>". $row['Emp_Contact']. "</td> 
			<td>". $row['Emp_Address']. "</td> 
			<td>". $row['Emp_Desig']. "</td> 
			<td>". $row['Emp_Salary']. "</td> 
		 </tr>	";
	}
	echo "</table>";
?>
		