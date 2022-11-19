<?php
include_once('connection.php');
if(isset($_GET['farm_no'])){
    $farm_no=$_GET['farm_no'];
$query=" select fe.farm_no,fe.area,f.*,b.b_id,b.buyer_name,c.name_,c.crop_type,w.warehouse_id,w.owner_,ba.bank_id,ba.bank_name,l.loan_id,l.amt,s.sup_id,s.sup_name,i.pesticide_fertiliser_name,i.price from farmer f,fields fe,buyer b,crops c,warehouse w,bank ba,loan l,supply s,inputs i where fe.farm_no=$farm_no and f.farmer_id=fe.farmer_id and b.farm_no=$farm_no and c.name_=b.crop_name and w.b_id=b.b_id and l.farm_no=$farm_no and ba.bank_id=l.bank_id and s.farm_no=$farm_no and i.sup_id=s.sup_id";
$result=mysqli_query($con,$query);
echo '<button><a href="update_design.php?farm_no='.$farm_no.'">EDIT</a></button>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>AGRICULTURE_OFFICE</title>
</head>
<body>
    
    <table id="farm1">
    <?php
    //$row="";
    $rows=mysqli_fetch_assoc($result);
     ?>
                </br></br> <tr><th>FARM_NO</th><td><?php echo $rows['farm_no']; ?></td></tr>
            <tr><th>AREA</th><td><?php echo $rows['area']; ?></td></tr>
         <tr><th>FARMER_ID</th> <td><?php echo $rows['farmer_id']; ?></td></tr>
            <tr><th>FARMER_NAME</th><td><?php echo $rows['farmer_name']; ?></td></tr>
            <tr><th>GENDER</th><td><?php echo $rows['gender']; ?></td></tr>
            <tr><th>CONTACT</th><td><?php echo $rows['contact']; ?></td></tr>
            <tr><th>B_ID</th><td><?php echo $rows['b_id']; ?></td></tr>
            <tr><th>BUYER_NAME</th><td><?php echo $rows['buyer_name']; ?></td></tr>
            <tr><th>CROP_NAME</th><td><?php echo $rows['name_']; ?></td></tr>
            <tr><th>CROP_TYPE</th><td><?php echo $rows['crop_type']; ?></td></tr>
            <tr><th>WAREHOUSE_ID</th><td><?php echo $rows['warehouse_id']; ?></td></tr>
            <tr><th>OWNER_</th><td><?php echo $rows['owner_']; ?></td></tr>
            <tr><th>BANK_ID</th><td><?php echo $rows['bank_id']; ?></td></tr>
            <tr><th>BANK_NAME</th><td><?php echo $rows['bank_name']; ?></td></tr>
            <tr><th>LOAN_ID</th><td><?php echo $rows['loan_id']; ?></td></tr>
            <tr><th>AMOUNT</th><td><?php echo $rows['amt']; ?></td></tr>
            <tr><th>SUP_ID</th><td><?php echo $rows['sup_id']; ?></td></tr>
            <tr><th>SUP_NAME</th><td><?php echo $rows['sup_name']; ?></td></tr>
            <tr><th>PESTICIDE_FERTILISER_NAME</th><td><?php echo $rows['pesticide_fertiliser_name']; ?></td></tr>
            <tr><th>PRICE</th><td><?php echo $rows['price']; ?></td></tr>
            
       
     <?php
            
    ?>
    </table>
    <style>
    #farm1 tr:nth-child(even){background-color: #f1f1f1;}
    #farm1 td:hover {background-color: grey;}
    #farm1 {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        table-layout: fixed;
        padding:12px,12px,12px,12px;
        border:1px solid #ddd;
        column-width:50px;
        text-align:left;
    }
    #farm1 th{
        border: 1px solid #ddd;
        column-width: 50%;
        padding-top: 12px;
        text-align: left;
        padding-bottom: 12px;
        margin:auto;
    }
    #farm1 td{
        border: 1px solid #ddd;
        column-width: 50%;
        padding-top: 12px;
        text-align: left;
        padding-bottom: 12px;
        margin:auto;
    }
</style>
</body>
</html>