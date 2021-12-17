<?PHP
    $male_status = 'unchecked';
    $female_status = 'unchecked';

?>
<FORM name ="form1" method ="post" action ="test.php">
   <Input type = 'Radio' Name ='gender' value= 'male'
   <?PHP print $male_status; ?>
   >Male
   <Input type = 'Radio' Name ='gender' value= 'female' 
   <?PHP print $female_status; ?>
   >Female
   <P>
   <Input type = "Submit" Name = "Submit1" VALUE = "Select a Radio Button">
</FORM>
<?php
if (isset($_POST['Submit1'])) {
    $selected_radio = $_POST['gender'];
    if ($selected_radio == 'male') {
           $male_status = 'male';
           echo "".$male_status;
     }else if ($selected_radio == 'female') {
           $female_status = 'female';
           echo "".$female_status;
     }
} 
?>