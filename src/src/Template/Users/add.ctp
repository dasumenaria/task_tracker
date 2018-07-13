<?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?>
<style>
#Content{ width:90% !important; margin-left: 5%;}
input:focus {background-color:#FFF !important;}
input[type="password"]:focus {background-color:#FFF !important;}
div.error { display: block !important; } 
label { font-weight:100 !important;}
</style>

<section class="content">
<div class="col-md-12"></div>
      <div class="row">
        <div class="col-md-12">
         <div class="box box-primary">
			<div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
			
			<?php  echo $this->Form->create($user, ['type' => 'file','id'=>"UserRegisterForm"]); ?>
			<div class="box-body"> 
 				<div class="form-group col-md-4">
					<label>Name</label>
					<input type="text" class="form-control" name="name" id="name" placeholder="Enter user name">
                </div>
				<div class="form-group col-md-4">
					<label>Mobile No</label>
					<input type="text" class="form-control" name="mobile_no" maxlength="10" minlength="10"  id="mobile_no" placeholder="Enter user mobile no"></input>
                </div>
				<div class="form-group col-md-4">
					<label>Date of Birth</label>
					<input type="text" class="form-control datepickers" name="date_of_birth" id="date_of_birth" placeholder="Enter user Date of Birth" data-date-format="dd-mm-yyyy"></input>
                </div>
				<div class="form-group col-md-6">
					<label>Email</label>
					<input type="text" class="form-control" name="email"  id="Email" placeholder="Enter user email"></input>
                </div>
				<div class="form-group col-md-6">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Enter user password"></input>
                </div>
				<div class="form-group col-md-6">
					<label>Address</label>
					<textarea type="text" class="form-control" name="address"  id="address" placeholder="Enter user address"></textarea>
                </div>
				<div class="form-group col-md-6">
					<label>Other Details</label>
					<textarea type="text" class="form-control" name="details"  id="details" placeholder="Enter user Other Details"></textarea>
                </div>
				 
				<div class="col-md-12">
					<hr></hr>
					<center>
						<button type="submit" class="btn btn-info">Submit</button>
					</center>	
				</div>	 			
             </form>
          </div>            
        </div>
       </div>
   </section> 
 <?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?>
<?php echo $this->Html->script(['jquery.validate']);?>   
<script>  
$.validator.addMethod("specialChars", function( value, element ) {
	var regex = new RegExp("^[a-zA-Z ]+$");
	var key = value;

	if (!regex.test(key)) {
	   return false;
	}
	return true;
}, "please use only alphabetic characters");

$('#UserRegisterForm').validate({
	rules: {
		"name": {
			required: true,
			specialChars: true
		},
		"email": {
			required: true
		},
		"address": {
			required: true,
		},
		"password": {
			required: true
		},
		"date_of_birth": {
			required: true,
		},
		"mobile_no": {
			required: true, 
			digits:true,
		},
	}, 
	ignore: ":hidden:not(select)",
	submitHandler: function (form) {
		$("#loader-1").show();
		form[0].submit(); 
	}
});

</script>
 
 
