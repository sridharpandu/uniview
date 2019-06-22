<?php
echo "<div align = 'center'><a href= '/fetchmyBill'>Back</a></div>";
if(isset($_REQUEST['status']) && $_REQUEST['status']!='')
{
	$status = $_REQUEST['status'];
}
if($status == 'ALL')
{
	echo "All fields are mendatory.";
}
if($status == 'E')
{
	echo "Please enter email address.";
}
if($status == 'VE')
{
	echo "Please enter valid email.";
}
if($status == 'BP')
{
	echo "Please enter phone number.";
}
if($status == 'VBP')
{
	echo "Please enter valid phone number.";
}
if($status == 'FN')
{
	echo "Please enter first name.";
}
if($status == 'VFN')
{
	echo "Please enter valid first name.";
}
if($status == 'LN')
{
	echo "Please enter last name.";
}
if($status == 'VLN')
{
	echo "Please enter valid last name.";
}
if($status == 'VADD')
{
	echo "Please enter valid address.";
}
if($status == 'VCIT')
{
	echo "Please enter valid City Name.";
}
if($status == 'VSTA')
{
    echo 'Please enter valid State';
}
if($status == 'VCON')
{
	echo "Please enter valid Country Name.";
}
if($status == 'VADD')
{
	echo "Please enter valid address.";
}
if($status == 'VPIN')
{
	echo "Please enter valid PIN.";
}
if($status == 'A')
{
	echo "Please enter amount.";
}
if($status == 'VA')
{
	echo "Please enter valid amount.";
}
if($status == 'EP')
{
	echo "Please enter email or phone number.";
}
?>
