<?php // show the investigations that are already if not empty (if empty have only the links) and have links for edit and add ?>
<?php require_once ('../private/initialise.php'); ?>
<?php include('../private/shared/header.php'); ?>
<?php 
    $patient_ID = $_GET['id']?? '1';
    $investigations_of_id = find_investigations_by_patientid($patient_ID);
$find_notes = find_notes($patient_ID);
    $patient_set = find_patient_by_id($patient_ID);
$patient = mysqli_fetch_assoc($patient_set);
?> 

<?php $page_title= 'Show Investigations'; ?>

<?php //Check if $investigations_of_id  is empty and it should have h1 header Investigations display of patient-> name ?>



<div id="content">
<div class= "Show Investigations">
    <h1 id="title-page"> Results overview for <?php echo $patient["first_name"] . " " . $patient["last_name"]; ?> </h1>



    <table class= "InvestigationsTable">
        <th id = "darkblue"> Date </th>
        <th id = "lightblue"> BiliTD</th> 
        <th id = "darkblue"> AST </th>
        <th id = "lightblue"> ALT </th>
        <th id = "darkblue"> ALP </th>
        <th id = "lightblue"> GGT </th>
        <th id = "darkblue"> Prot </th>
        <th id = "lightblue"> Alb </th>
        <th id = "darkblue"> CK </th>
        <th id = "lightblue"> Hb/Hct </th>
        <th id = "darkblue"> WCC </th>
        <th id = "lightblue"> Neutro </th>
        <th id = "darkblue"> Platelets </th>
        <th id = "lightblue"> CRP </th>
        <th id = "darkblue"> ESR </th>
        <th id = "lightblue"> PT/INR </th>
        <th id = "darkblue"> APTR </th>
        <th id = "lightblue"> Fibrinogen </th>
        <th id = "darkblue"> Cortisol </th>
        <th id = "lightblue"> Urea </th>
        <th id = "darkblue"> Creatinine </th>
 
        <?php while ($allInvetigations= mysqli_fetch_assoc($investigations_of_id)){ ?>
            <tr>
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
             <br><br><a class="action" href= "<?php echo url_for('InvestigationsNew.php?patient_ID=' . $patient_ID); ?>"> Add Investigation </a><br><br><br>
              <h3 style = "font-size: 30px; color :	rgb(72,72,72);font-family: 'Open Sans', sans-serif;font-weight: bold;">additional notes</h3>


    <table class= "InvestigationsTable">

        <?php while ($allInvetigations2= mysqli_fetch_assoc($find_notes)){ ?>
            <tr>
                <td><a href=InvestigationEdit.php?id=<?php echo h($allInvetigations2['id']); ?>><?php echo h($allInvetigations2['date']); ?></a></td>
                <td> <?php echo h($allInvetigations2['Notes']); ?> </td>

            </tr>
        <?php } ?>
    </table>          </center>


    </div>
</div>
