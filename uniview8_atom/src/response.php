<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> Payment </TITLE>
 </HEAD>

 <BODY>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <td>
  <?php if($_POST['f_code']=="Ok"){ ?>
  Success : Your Transaction is been processed.
  <?php } else if($_POST['f_code']=="F"){ ?>
  Failure : Your Transaction couldnot be processed.
  <?php } ?>
  <?php } else { ?>
  Failure : Your Transaction couldnot be processed.
  <?php } ?>
 </td>
 </tr>
 <tr>
 <td>
  Atom Transaction Id
 </td>
 <td>
  <?php $_POST['mmp_txn'] ?>
 </td>  
 </tr>
 <tr>
 <td>
  Amount
 </td>
 <td>
  <?php $_POST['amt'] ?>
 </td>  
 </tr>
 <tr>
 <td>
  Date
 </td>
 <td>
  <?php $_POST['date'] ?>
 </td>  
 </tr>
 <tr>
 <td>
  Bank Transaction Id
 </td>
 <td>
  <?php $_POST['bank_txn'] ?>
 </td>  
 </tr>
 <tr>
 <td>
  Clientcode
 </td>
 <td>
  <?php $_POST['clientcode'] ?>
 </td>  
 </tr>
 <tr>
 <td>
  Bank Name
 </td>
 <td>
  <?php $_POST['bank_name'] ?>
 </td>  
 </tr>
</table>
 </BODY>
</HTML>
