<?php // show the investigations that are already if not empty (if empty have only the links) and have links for edit and add ?>
<?php require_once ('../private/initialise.php'); ?>
<?php include('../private/shared/header.php'); ?>



<?php
    if (isset($_SESSION['userLevel'])) {
if ($_SESSION['userLevel'] > 1) {
     if(isset($_GET['id'])){
 $patient_ID = $_GET['id'];
     }}}
     elseif(isset($_SESSION['nhsno'])){
         $patient_ID = $_SESSION['current_patient_id'];
     }else{
    header('Location: index.php');
}
    $investigations_of_id = find_past_investigations_by_patientid($patient_ID);
$find_notes = find_past_notes($patient_ID);
    $patient_set = find_patient_by_id($patient_ID);
$patient = mysqli_fetch_assoc($patient_set);
?>




<?php $page_title= 'Show Investigations'; ?>

<?php //Check if $investigations_of_id  is empty and it should have h1 header Investigations display of patient-> name ?>



<div id="content">
<div class= "Show Investigations">
    <h1 id="title-page"> Past results overview for <?php echo $patient["first_name"] . " " . $patient["last_name"]; ?> </h1>



    <table class= "InvestigationsTable">
        <th id = "darkblue"> Date </th>
        <th> BiliTD</th> 
        <th id = "darkblue"> AST </th>
        <th> ALT </th>
        <th id = "darkblue"> ALP </th>
        <th> GGT </th>
        <th id = "darkblue"> Prot </th>
        <th> Alb </th>
        <th id = "darkblue"> CK </th>
        <th> Hb/Hct </th>
        <th id = "darkblue"> WCC </th>
        <th> Neutro </th>
        <th id = "darkblue"> Platelets </th>
        <th> CRP </th>
        <th id = "darkblue"> ESR </th>
        <th> PT/INR </th>
        <th id = "darkblue"> APTR </th>
        <th> Fibrinogen </th>
        <th id = "darkblue"> Cortisol </th>
        <th> Urea </th>
        <th id = "darkblue"> Creatinine </th>

        <?php while ($allInvetigations= mysqli_fetch_assoc($investigations_of_id)){ ?>
            <tr >
                <td><a href=InvestigationEdit.php?id=<?php echo h($allInvetigations['id']); ?>><?php echo h($allInvetigations['date']); ?></a></td>
                <td> <?php echo h($allInvetigations['BiliTD']); ?> </td>
                <td> <?php echo h($allInvetigations['AST']); ?> </td> 
                <td> <?php echo h($allInvetigations['ALT']); ?> </td> 
                <td> <?php echo h($allInvetigations['ALP']); ?> </td> 
                <td> <?php echo h($allInvetigations['GGT']); ?> </td> 
                <td> <?php echo h($allInvetigations['Prot']); ?> </td> 
                <td> <?php echo h($allInvetigations['Alb']); ?> </td> 
                <td> <?php echo h($allInvetigations['CK']); ?> </td> 
                <td> <?php echo h($allInvetigations['HbHct']); ?> </td> 
                <td> <?php echo h($allInvetigations['WCC']); ?> </td> 
                <td> <?php echo h($allInvetigations['Neutro']); ?> </td> 
                <td> <?php echo h($allInvetigations['Platelets']); ?> </td> 
                <td> <?php echo h($allInvetigations['CRP']); ?> </td> 
                <td> <?php echo h($allInvetigations['ESR']); ?> </td> 
                <td> <?php echo h($allInvetigations['PTINR']); ?> </td> 
                <td> <?php echo h($allInvetigations['APTR']); ?> </td> 
                <td> <?php echo h($allInvetigations['Fibrinogen']); ?> </td> 
                <td> <?php echo h($allInvetigations['Cortisol']); ?> </td> 
                <td> <?php echo h($allInvetigations['Urea']); ?> </td> 
                <td> <?php echo h($allInvetigations['Creatinine']); ?> </td> 
            </tr> 
        <?php } ?>
    </table>
          <center>
              <h1>Additional notes</h1>


    <table class= "InvestigationsTable">

        <?php while ($allInvetigations2= mysqli_fetch_assoc($find_notes)){ ?>
            <tr>
                <td><a href=InvestigationEdit.php?id=<?php echo h($allInvetigations2['id']); ?>><?php echo h($allInvetigations2['date']); ?></a></td>
                <td> <?php echo h($allInvetigations2['Notes']); ?> </td>

            </tr>
        <?php } ?>
    </table>         <br>



    </div>
</div>


