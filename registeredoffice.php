<?php
 include("header.php"); 
 include("connection.php"); 
 $show=0;
  if(isset($_POST["companyname"])){

	 $companyname=$_POST["companyname"];
	 $compnaysector=$_POST["compnaysector"];
	 $companycategory=$_POST["companycategory"];
	 $exposedcategory=$_POST["exposedcategory"];
	 $street=$_POST["street"];
	 $city=$_POST["city"];
	 $postalcode=$_POST["postalcode"];
	 $country=$_POST["country"];
	 $province=$_POST["province"];
	 $continent=$_POST["continent"];
	 $telephone=$_POST["telephone"];
	 $email=$_POST["email"];
	 $fax=$_POST["fax"];
	 $website=$_POST["website"];
	 $uid=$_SESSION['uid'];
	 
	
	 if($_SESSION['compalready']=="yes"){
		$compid= $_SESSION['compid'];
	 $query="UPDATE `user_company` SET `street`='$street',`city`='$city',`postal_code`='$postalcode',`province`='',`country`='$country',`continent`='$continent',`tel`='$tel',`fax`='$fax',`email`='$email',`website`='$website' WHERE `userid`='$uid' and `compid`='$compid'";
	 }else{
     $query="INSERT INTO `user_company`(`compid`, `userid`, `company_name`, `category`, `sector`, `exposed_category`, `street`, `city`, `postal_code`, `province`, `country`, `continent`, `tel`, `fax`, `email`, `website`) VALUES(NULL,'$uid','$companyname','$companycategory','$compnaysector','$exposedcategory','$street','$city','$postalcode','$province','$country','$continent','$telephone','$fax','$email','$website')";
	 }
	
	 if(mysqli_query($connection,$query)){
		$show=1;
	 }else{
		$show=2;
	 }
	 
	 
	 
	 
 }
 
 
 ?>

<!-- Content -->

	

<!-- SECTION CONTACT -->

<form action="registeredoffice.php" method="post">
<div class="bgwhite">
	<div class="container sspacing-title-button">
		<div class="col-md-1">
			
		</div>
		<div class="col-md-10">
		<?php
if($show==1){
	
              $smsg = '<div class="alert alert-success" id="suc">Company information has been entered successfully.</div>';
			  echo $smsg;
			  			  ?>
			<div style="font-size:16px;">
			If you have any headquarters for the company. Please <a href="headquarteroffice.php"> <b style="font-size:18px">Click here </b></a> to enter your Headquarters details.<br>
			</div>
			  <?php
        }
	if($show==2) {
              $smsg = '<div class="alert alert-danger" id="fail">Failed to add company information. Try Again !</div> ';
			  echo $smsg;
			  ?>
			  <a href="registeredoffice.php"> Click here </a> to enter Company Information again.<br>
			  <?php
	}
?>
<?php
if($show==0){
	?>
		<p class="size30 ml10 mb10 cdark pb20">Company Information</p>
	<div class="col-md-6">
				
			<?php 
			$uid=$_SESSION['uid'];
			$getcompanyinf="select * from `user_company` where `userid`='$uid'";
			$resultinfo=mysqli_query($connection,$getcompanyinf);
			$rowinfo=mysqli_fetch_array($resultinfo);
			if($rowinfo['company_name']==""){
			
			
			
			?>
				<div class="col-md-12">
					<input type="text" name="companyname" class="form-control formlarge mt17" placeholder="Name of Comapny" title="Company Name Contains only letters atleast  or greater than 4 !" pattern="[a-zA-Z][a-zA-Z ]{3,}" required>
				</div>
					<div class="col-md-12">
				
					<br><b>Company Sector:</b>
			
				
					<select name="compnaysector" class="form-control formlarge mt17" required>
					<option value="Agriculture">Agriculture</option>
					</select>
					</div>
					<div class="col-md-12">
					<input type="text" name="companycategory" class="form-control formlarge mt17" placeholder="Company Category" title="Company category Contains only letters atleast  or greater than 4 !" pattern="[a-zA-Z][a-zA-Z ]{3,}" required>
					</div>
					<div class="col-md-12">
					<input type="text" name="exposedcategory" class="form-control formlarge mt17" placeholder="Exposed Category" title="Exposed category Contains only letters atleast  or greater than 4 !" pattern="[a-zA-Z][a-zA-Z ]{3,}" required>
					</div>
			<?php }else{
                  if($rowinfo['street']==''){
					  $_SESSION['compalready']="yes";
					  $_SESSION['compid']=$rowinfo['compid'];
					  
			?>
			<div class="col-md-12">
					<input type="text" name="companyname" value="<?php echo $rowinfo['company_name']; ?>" class="form-control formlarge mt17" placeholder="Name of Comapny" title="Company Name Contains only letters atleast  or greater than 4 !" pattern="[a-zA-Z][a-zA-Z ]{3,}" required>
				</div>
					<div class="col-md-12">
				
					<br><b>Company Sector:</b>
			
				
					<select name="compnaysector" class="form-control formlarge mt17" required>
					<?php if($rowinfo['sector']=="Agriculture"){ ?>
					<option value="Agriculture" checked>Agriculture</option>
					<?php }else{ ?>
					<option value="Agriculture" >Agriculture</option>
				  <?php } ?>
					</select>
					</div>
					<div class="col-md-12">
					<input type="text" value="<?php echo $rowinfo['category']; ?>" name="companycategory" class="form-control formlarge mt17" placeholder="Company Category" title="Company category Contains only letters atleast  or greater than 4 !" pattern="[a-zA-Z][a-zA-Z ]{3,}" required>
					</div>
					<div class="col-md-12">
					<input type="text" value="<?php echo $rowinfo['exposed_category']; ?>" name="exposedcategory" class="form-control formlarge mt17" placeholder="Exposed Category" title="Exposed category Contains only 4 letters atleast  or greater than 4 !" pattern="[a-zA-Z][a-zA-Z ]{3,}" required>
					</div>
			
			<?php }
			 if($rowinfo['street']!=''){
				 ?>
				 <div class="col-md-12">
					<input type="text" name="companyname" class="form-control formlarge mt17" placeholder="Name of Comapny" title="Company Name Contains only letters atleast  or greater than 4 !" pattern="[a-zA-Z][a-zA-Z ]{3,}" required>
				</div>
					<div class="col-md-12">
				
					<br><b>Company Sector:</b>
			
				
					<select name="compnaysector" class="form-control formlarge mt17" required>
					<option value="Agriculture">Agriculture</option>
					</select>
					</div>
					<div class="col-md-12">
					<input type="text" name="companycategory" class="form-control formlarge mt17" placeholder="Company Category" title="Company category Contains only letters atleast  or greater than 4 !" pattern="[a-zA-Z][a-zA-Z ]{3,}" required>
					</div>
					<div class="col-md-12">
					<input type="text" name="exposedcategory" class="form-control formlarge mt17" placeholder="Exposed Category" title="Exposed category Contains only letters atleast  or greater than 4 !" pattern="[a-zA-Z][a-zA-Z ]{3,}" required>
					</div>
				 <?php
			 }
			} ?>
				<div class="col-md-12">
					<input type="text" name="street" class="form-control formlarge mt17" placeholder="Street" required>
				</div>
				<div class="col-md-12">
					<input type="text" name="city" class="form-control formlarge mt17" placeholder="City" title="City Contains only letters  greater than 4 !" pattern="[a-zA-Z][a-zA-Z ]{3,}" required>
				</div>
				<div class="col-md-12">
					<input type="text" name="postalcode" class="form-control formlarge mt17" placeholder="Postal Code" title="only numbers allowed" pattern="\d*" required>
				</div>
				
				<div class="col-md-12">
				
					<br><b>Select Country:</b>
			
				
					<select name="country" class="form-control formlarge mt17" required>
				

<option value="United States">United States</option> 
<option value="United Kingdom">United Kingdom</option> 
<option value="Afghanistan">Afghanistan</option> 
<option value="Albania">Albania</option> 
<option value="Algeria">Algeria</option> 
<option value="American Samoa">American Samoa</option> 
<option value="Andorra">Andorra</option> 
<option value="Angola">Angola</option> 
<option value="Anguilla">Anguilla</option> 
<option value="Antarctica">Antarctica</option> 
<option value="Antigua and Barbuda">Antigua and Barbuda</option> 
<option value="Argentina">Argentina</option> 
<option value="Armenia">Armenia</option> 
<option value="Aruba">Aruba</option> 
<option value="Australia">Australia</option> 
<option value="Austria">Austria</option> 
<option value="Azerbaijan">Azerbaijan</option> 
<option value="Bahamas">Bahamas</option> 
<option value="Bahrain">Bahrain</option> 
<option value="Bangladesh">Bangladesh</option> 
<option value="Barbados">Barbados</option> 
<option value="Belarus">Belarus</option> 
<option value="Belgium">Belgium</option> 
<option value="Belize">Belize</option> 
<option value="Benin">Benin</option> 
<option value="Bermuda">Bermuda</option> 
<option value="Bhutan">Bhutan</option> 
<option value="Bolivia">Bolivia</option> 
<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
<option value="Botswana">Botswana</option> 
<option value="Bouvet Island">Bouvet Island</option> 
<option value="Brazil">Brazil</option> 
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
<option value="Brunei Darussalam">Brunei Darussalam</option> 
<option value="Bulgaria">Bulgaria</option> 
<option value="Burkina Faso">Burkina Faso</option> 
<option value="Burundi">Burundi</option> 
<option value="Cambodia">Cambodia</option> 
<option value="Cameroon">Cameroon</option> 
<option value="Canada">Canada</option> 
<option value="Cape Verde">Cape Verde</option> 
<option value="Cayman Islands">Cayman Islands</option> 
<option value="Central African Republic">Central African Republic</option> 
<option value="Chad">Chad</option> 
<option value="Chile">Chile</option> 
<option value="China">China</option> 
<option value="Christmas Island">Christmas Island</option> 
<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
<option value="Colombia">Colombia</option> 
<option value="Comoros">Comoros</option> 
<option value="Congo">Congo</option> 
<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
<option value="Cook Islands">Cook Islands</option> 
<option value="Costa Rica">Costa Rica</option> 
<option value="Cote D'ivoire">Cote D'ivoire</option> 
<option value="Croatia">Croatia</option> 
<option value="Cuba">Cuba</option> 
<option value="Cyprus">Cyprus</option> 
<option value="Czech Republic">Czech Republic</option> 
<option value="Denmark">Denmark</option> 
<option value="Djibouti">Djibouti</option> 
<option value="Dominica">Dominica</option> 
<option value="Dominican Republic">Dominican Republic</option> 
<option value="Ecuador">Ecuador</option> 
<option value="Egypt">Egypt</option> 
<option value="El Salvador">El Salvador</option> 
<option value="Equatorial Guinea">Equatorial Guinea</option> 
<option value="Eritrea">Eritrea</option> 
<option value="Estonia">Estonia</option> 
<option value="Ethiopia">Ethiopia</option> 
<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
<option value="Faroe Islands">Faroe Islands</option> 
<option value="Fiji">Fiji</option> 
<option value="Finland">Finland</option> 
<option value="France">France</option> 
<option value="French Guiana">French Guiana</option> 
<option value="French Polynesia">French Polynesia</option> 
<option value="French Southern Territories">French Southern Territories</option> 
<option value="Gabon">Gabon</option> 
<option value="Gambia">Gambia</option> 
<option value="Georgia">Georgia</option> 
<option value="Germany">Germany</option> 
<option value="Ghana">Ghana</option> 
<option value="Gibraltar">Gibraltar</option> 
<option value="Greece">Greece</option> 
<option value="Greenland">Greenland</option> 
<option value="Grenada">Grenada</option> 
<option value="Guadeloupe">Guadeloupe</option> 
<option value="Guam">Guam</option> 
<option value="Guatemala">Guatemala</option> 
<option value="Guinea">Guinea</option> 
<option value="Guinea-bissau">Guinea-bissau</option> 
<option value="Guyana">Guyana</option> 
<option value="Haiti">Haiti</option> 
<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
<option value="Honduras">Honduras</option> 
<option value="Hong Kong">Hong Kong</option> 
<option value="Hungary">Hungary</option> 
<option value="Iceland">Iceland</option> 
<option value="India">India</option> 
<option value="Indonesia">Indonesia</option> 
<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
<option value="Iraq">Iraq</option> 
<option value="Ireland">Ireland</option> 
<option value="Israel">Israel</option> 
<option value="Italy">Italy</option> 
<option value="Jamaica">Jamaica</option> 
<option value="Japan">Japan</option> 
<option value="Jordan">Jordan</option> 
<option value="Kazakhstan">Kazakhstan</option> 
<option value="Kenya">Kenya</option> 
<option value="Kiribati">Kiribati</option> 
<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
<option value="Korea, Republic of">Korea, Republic of</option> 
<option value="Kuwait">Kuwait</option> 
<option value="Kyrgyzstan">Kyrgyzstan</option> 
<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
<option value="Latvia">Latvia</option> 
<option value="Lebanon">Lebanon</option> 
<option value="Lesotho">Lesotho</option> 
<option value="Liberia">Liberia</option> 
<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
<option value="Liechtenstein">Liechtenstein</option> 
<option value="Lithuania">Lithuania</option> 
<option value="Luxembourg">Luxembourg</option> 
<option value="Macao">Macao</option> 
<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
<option value="Madagascar">Madagascar</option> 
<option value="Malawi">Malawi</option> 
<option value="Malaysia">Malaysia</option> 
<option value="Maldives">Maldives</option> 
<option value="Mali">Mali</option> 
<option value="Malta">Malta</option> 
<option value="Marshall Islands">Marshall Islands</option> 
<option value="Martinique">Martinique</option> 
<option value="Mauritania">Mauritania</option> 
<option value="Mauritius">Mauritius</option> 
<option value="Mayotte">Mayotte</option> 
<option value="Mexico">Mexico</option> 
<option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
<option value="Moldova, Republic of">Moldova, Republic of</option> 
<option value="Monaco">Monaco</option> 
<option value="Mongolia">Mongolia</option> 
<option value="Montserrat">Montserrat</option> 
<option value="Morocco">Morocco</option> 
<option value="Mozambique">Mozambique</option> 
<option value="Myanmar">Myanmar</option> 
<option value="Namibia">Namibia</option> 
<option value="Nauru">Nauru</option> 
<option value="Nepal">Nepal</option> 
<option value="Netherlands">Netherlands</option> 
<option value="Netherlands Antilles">Netherlands Antilles</option> 
<option value="New Caledonia">New Caledonia</option> 
<option value="New Zealand">New Zealand</option> 
<option value="Nicaragua">Nicaragua</option> 
<option value="Niger">Niger</option> 
<option value="Nigeria">Nigeria</option> 
<option value="Niue">Niue</option> 
<option value="Norfolk Island">Norfolk Island</option> 
<option value="Northern Mariana Islands">Northern Mariana Islands</option> 
<option value="Norway">Norway</option> 
<option value="Oman">Oman</option> 
<option value="Pakistan">Pakistan</option> 
<option value="Palau">Palau</option> 
<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
<option value="Panama">Panama</option> 
<option value="Papua New Guinea">Papua New Guinea</option> 
<option value="Paraguay">Paraguay</option> 
<option value="Peru">Peru</option> 
<option value="Philippines">Philippines</option> 
<option value="Pitcairn">Pitcairn</option> 
<option value="Poland">Poland</option> 
<option value="Portugal">Portugal</option> 
<option value="Puerto Rico">Puerto Rico</option> 
<option value="Qatar">Qatar</option> 
<option value="Reunion">Reunion</option> 
<option value="Romania">Romania</option> 
<option value="Russian Federation">Russian Federation</option> 
<option value="Rwanda">Rwanda</option> 
<option value="Saint Helena">Saint Helena</option> 
<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
<option value="Saint Lucia">Saint Lucia</option> 
<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
<option value="Samoa">Samoa</option> 
<option value="San Marino">San Marino</option> 
<option value="Sao Tome and Principe">Sao Tome and Principe</option> 
<option value="Saudi Arabia">Saudi Arabia</option> 
<option value="Senegal">Senegal</option> 
<option value="Serbia and Montenegro">Serbia and Montenegro</option> 
<option value="Seychelles">Seychelles</option> 
<option value="Sierra Leone">Sierra Leone</option> 
<option value="Singapore">Singapore</option> 
<option value="Slovakia">Slovakia</option> 
<option value="Slovenia">Slovenia</option> 
<option value="Solomon Islands">Solomon Islands</option> 
<option value="Somalia">Somalia</option> 
<option value="South Africa">South Africa</option> 
<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
<option value="Spain">Spain</option> 
<option value="Sri Lanka">Sri Lanka</option> 
<option value="Sudan">Sudan</option> 
<option value="Suriname">Suriname</option> 
<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
<option value="Swaziland">Swaziland</option> 
<option value="Sweden">Sweden</option> 
<option value="Switzerland">Switzerland</option> 
<option value="Syrian Arab Republic">Syrian Arab Republic</option> 
<option value="Taiwan, Province of China">Taiwan, Province of China</option> 
<option value="Tajikistan">Tajikistan</option> 
<option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
<option value="Thailand">Thailand</option> 
<option value="Timor-leste">Timor-leste</option> 
<option value="Togo">Togo</option> 
<option value="Tokelau">Tokelau</option> 
<option value="Tonga">Tonga</option> 
<option value="Trinidad and Tobago">Trinidad and Tobago</option> 
<option value="Tunisia">Tunisia</option> 
<option value="Turkey">Turkey</option> 
<option value="Turkmenistan">Turkmenistan</option> 
<option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
<option value="Tuvalu">Tuvalu</option> 
<option value="Uganda">Uganda</option> 
<option value="Ukraine">Ukraine</option> 
<option value="United Arab Emirates">United Arab Emirates</option> 
<option value="United Kingdom">United Kingdom</option> 
<option value="United States">United States</option> 
<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
<option value="Uruguay">Uruguay</option> 
<option value="Uzbekistan">Uzbekistan</option> 
<option value="Vanuatu">Vanuatu</option> 
<option value="Venezuela">Venezuela</option> 
<option value="Viet Nam">Viet Nam</option> 
<option value="Virgin Islands, British">Virgin Islands, British</option> 
<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
<option value="Wallis and Futuna">Wallis and Futuna</option> 
<option value="Western Sahara">Western Sahara</option> 
<option value="Yemen">Yemen</option> 
<option value="Zambia">Zambia</option> 
<option value="Zimbabwe">Zimbabwe</option>
					</select>
					</div>
				
					
            
		</div>
		
		<div class="col-md-6">
		<div class="col-md-12">
					<input type="text" name="province" class="form-control formlarge mt17" placeholder="Province" title="Province Contains only letters greater than 4 !" pattern="[a-zA-Z][a-zA-Z ]{3,}" required>
				</div>
				<div class="col-md-12">
				
					<br><b>Select Continent:</b>
			
				
					<select name="continent" class="form-control formlarge mt17" required>
					<option value="Africa">Africa </option>
					<option value="Asia">Asia </option>
					<option value="Australia">Australia </option>
					<option value="Europe">Europe </option>
					<option value="South America">South America </option>
					<option value="North America">North America </option>
					<option value="Antarctica">Antarctica </option>
					</select>
					</div>
				<div class="col-md-12">
					<input type="text" name="telephone" class="form-control formlarge mt17" placeholder="Telephone" title="Phone number contains numbers and -" pattern="^\d*" required>
				</div>
					<div class="col-md-12">
					<input type="text" name="fax" class="form-control formlarge mt17" placeholder="Fax" title="Format eg. 1-660-414-4444" pattern="^\d{1}-\d{3}-\d{3}-\d{4}$" required>
				</div>
				
				<div class="col-md-12">
					<input type="text" name="email" class="form-control formlarge mt17" placeholder="Email"   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Invalid Email Format !" required>
				</div>
				<div class="col-md-12">
					<input type="text" name="website" class="form-control formlarge mt17" placeholder="website" pattern="https?://.+" title="Include http://" required>
				</div>
		</div>
			<div class="clearfix"></div>
				<button type="submit" class="btn btnwhitebig btn-default  ml10 mt30"><i class="icon-box"></i> Save </button>
				<div class="clearfix"></div>
		</div>
<?php }?>
		<div class="col-md-1">
			
		</div>
	</div>
</div>
</form>
<!-- END OF CONTACT -->
</div>

<?php include("footermain.php"); ?>