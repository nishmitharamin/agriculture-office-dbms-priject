<?php 
include("connection.php");
if(isset($_GET['farm_no'])){
    $farm_no=$_GET['farm_no'];
$sql="select fe.area,f.farmer_name,f.gender,f.contact,b.buyer_name,c.name_,c.crop_type,w.owner_,ba.bank_name,l.amt,s.sup_name,i.pesticide_fertiliser_name,i.price from farmer f,fields fe,buyer b,crops c,warehouse w,bank ba,loan l,supply s,inputs i where fe.farm_no=$farm_no and f.farmer_id=fe.farmer_id and b.farm_no=$farm_no and c.name_=b.crop_name and w.b_id=b.b_id and l.farm_no=$farm_no and ba.bank_id=l.bank_id and s.farm_no=$farm_no and i.sup_id=s.sup_id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$area=$row['area'];
$farmer_name=$row['farmer_name'];
$gender=$row['gender'];
$contact=$row['contact'];
$buyer_name=$row['buyer_name'];
$name_=$row['name_'];
$crop_type=$row['crop_type'];
$owner_=$row['owner_'];
$bank_name=$row['bank_name'];
$amt=$row['amt'];
$sup_name=$row['sup_name'];
$pesticide_fertiliser_name=$row['pesticide_fertiliser_name'];
$price=$row['price'];
if(isset($_POST['edit'])){
    $area=$_POST['area'];
    $farmer_name=$_POST['farmer_name'];
    $gender=$_POST['gender'];
    $contact=$_POST['contact'];
    $buyer_name=$_POST['buyer_name'];
    $name_=$_POST['name_'];
    $crop_type=$_POST['crop_type'];
    $owner_=$_POST['owner_'];
    $bank_name=$_POST['bank_name'];
    $amt=$_POST['amt'];
    $sup_name=$_POST['sup_name'];
    $pesticide_fertiliser_name=$_POST['pesticide_fertiliser_name'];
    $price=$_POST['price'];
    $sql="Update fields, farmer, buyer, crops, warehouse, bank, loan, supply, inputs set fields.area=$area, farmer.farmer_name='$farmer_name', farmer.gender='$gender', farmer.contact=$contact, buyer.buyer_name='$buyer_name', crops.name_='$name_', crops.crop_type='$crop_type', warehouse.owner_='$owner_', bank.bank_name='$bank_name', loan.amt=$amt, supply.sup_name='$sup_name', inputs.pesticide_fertiliser_name='$pesticide_fertiliser_name', inputs.price=$price where fields.farm_no=$farm_no and farmer.farmer_id=fields.farmer_id and buyer.farm_no=$farm_no and crops.name_=buyer.crop_name and warehouse.b_id=buyer.b_id and loan.farm_no=$farm_no and bank.bank_id=loan.bank_id and supply.farm_no=$farm_no and inputs.sup_id=supply.sup_id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo "Updated Successfully";
    }
    else{
        die(mysqli_error($con));
    }
}
}

    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <title>AGRICULTURE_OFFICE_DATABASE</title>
    </head>
    <body>
        <div class="container my-5">
            <form method="POST">
                    <div class="form-group">
                        <label>AREA</label>
                        <input type="text" class="form-control" placeholder="" name="area" autocomplete="off" value='<?php echo $area;?>'/>
                    </div>
                    <div class="form-group">
                        <label>FARMER_NAME</label>
                        <input type="text" class="form-control" placeholder="" name="farmer_name" autocomplete="off" value='<?php echo $farmer_name;?>'/>
                    </div>
                    <div class="form-group">
                        <label>GENDER</label>
                        <input type="text" class="form-control" placeholder="" name="gender" autocomplete="off" value='<?php echo $gender;?>'/>
                    </div>
                    <div class="form-group">
                        <label>CONTACT</label>
                        <input type="text" class="form-control" placeholder="" name="contact" autocomplete="off" value='<?php echo $contact;?>'/>
                    </div>
                    <div class="form-group">
                        <label>BUYER_NAME</label>
                        <input type="text" class="form-control" placeholder="" name="buyer_name" autocomplete="off" value='<?php echo $buyer_name;?>'/>
                    </div>
                    <div class="form-group">
                        <label>CROP_NAME</label>
                        <input type="text" class="form-control" placeholder="" name="name_" autocomplete="off" value='<?php echo $name_;?>'/>
                    </div>
                    <div class="form-group">
                        <label>CROP_TYPE</label>
                        <input type="text" class="form-control" placeholder="" name="crop_type" autocomplete="off" value='<?php echo $crop_type;?>'/>
                    </div>
                    <div class="form-group">
                        <label>OWNER</label>
                        <input type="text" class="form-control" placeholder="" name="owner_" autocomplete="off" value='<?php echo $owner_;?>'/>
                    </div>
                    <div class="form-group">
                        <label>BANK_NAME</label>
                        <input type="text" class="form-control" placeholder="" name="bank_name" autocomplete="off" value='<?php echo $bank_name;?>'/>
                    </div>
                    <div class="form-group">
                        <label>AMOUNT</label>
                        <input type="text" class="form-control" placeholder="" name="amt" autocomplete="off" value='<?php echo $amt;?>'/>
                    </div>
                    <div class="form-group">
                        <label>SUP_NAME</label>
                        <input type="text" class="form-control" placeholder="" name="sup_name" autocomplete="off" value='<?php echo $sup_name;?>'/>
                    </div>
                    <div class="form-group">
                        <label>PESTICIDE_FERTILISER_NAME</label>
                        <input type="text" class="form-control" placeholder="" name="pesticide_fertiliser_name" autocomplete="off" value='<?php echo $pesticide_fertiliser_name;?>'/>
                    </div>
                    <div class="form-group">
                        <label>PRICE</label>
                        <input type="text" class="form-control" placeholder="" name="price" autocomplete="off" value='<?php echo $price;?>'/>
                    </div>
                    <button type="submit" class="btn btn-primary" name="edit">UPDATE</button>
            </form>
        </div>
    </body>
</html>