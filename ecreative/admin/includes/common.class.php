<?php 

class common{

// Select Brands

function Select_Brands($ExistBrand){

$ResultBrand= mysql_query("SELECT * FROM brand ORDER By brandid ASC");

echo '<select name="brand"  class="w70p">';

	if($ExistBrand=='0'){echo '<option>Select</option>';}
	
	else { echo '<option value="'.$ExistBrand.'">Change</option>
	<option></option>';
	}

	while($row = mysql_fetch_array($ResultBrand)) {
		echo '<option value="'.$row['brandid'].'" >'.$row['brandname'].'</option>';  //NEEDCHANGE value
	}

echo'</select>';

}


// Stock Availablity 

function Stock_Availability($ExistStock){  // NEEDCHNAGE value
echo '<select name="availability">';
if($ExistStock=='0'){echo '<option>Select</option>';}

else {   
			switch ($ExistStock){
			case '1':
				echo '<option value="1">In Stock</option>';
			break;
			case '2':
				echo '<option value="2">Not Available</option>';
			break;
			case '3':
				echo '<option value="3">Out of Stock</option>';
			break;
			case '4':
				echo '<option value="4">End of Life</option>';
			break;
			}
			
echo '<option></option>';

}
echo'<option value="1">In Stock</option> 
<option value="2">Not Available</option>
<option value="3">Out of Stock</option>
<option value="4">End of Life</option>
</select>';
}


// Select Product Category

function Select_Category($ExistCategory){

$mcat= mysql_query('SELECT * FROM mcat ORDER By mcatid ASC');
echo '<select name="category_name">';
if($ExistCategory=='0'){echo '<option>Select</option>';}
else {echo '<option value="'.$ExistCategory.'">Change</option>';}
echo '<optgroup label="Master Category">';
while($row = mysql_fetch_array($mcat)) {
echo '<option value="'.$row['mcatid'].'" >'.$row['mcatname'].'</option>';
}
echo'</optgroup>';
$scat= mysql_query('SELECT * FROM scat ORDER By scatid ASC');
echo '<optgroup label="Sub-Master Category">';
while($row = mysql_fetch_array($scat)) {
echo '<option value="'.$row['mcatid'].' '.$row['scatid'].'" >'.$row['scatname'].'</option>';
}
echo'</optgroup>';
$tcat= mysql_query('SELECT * FROM tcat ORDER By tcatid ASC');
echo '<optgroup label="Sub Category">';
while($row = mysql_fetch_array($tcat)) {
echo '<option value="'.$row['mcatid'].' '.$row['scatid'].' '.$row['tcatid'].'" >'.$row['tcatname'].'</option>';
}
echo'</optgroup>';


echo'</select>';
}



}
?>