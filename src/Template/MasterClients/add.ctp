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
              <h3 class="box-title">Add Client</h3>
            </div>
			
			<?php  echo $this->Form->create($masterClient, ['type' => 'file','id'=>"UserRegisterForm"]); ?>
			<div class="box-body"> 
 				<div class="form-group col-md-4">
					<label>Company Name</label>
					<input type="text" class="form-control" name="client_name" id="client_name" placeholder="Enter Company name">
                </div>
				<div class="form-group col-md-4">
					<label>Location</label>
					<textarea type="text" class="form-control" name="location"  id="location" placeholder="Enter client loaction"></textarea>
                </div>
				<div class="form-group col-md-4">
					<label>Address</label>
					<textarea type="text" class="form-control" name="address" id="address" placeholder="Enter client address"></textarea>
                </div>
				<div class="no-print" style="margin-top:20px;" id="monthly_table">
					<div class="data">
						<div class="col-md-12"><hr style="margin-top:5px;margin-bottom:5px;"></hr></div>
						<div class="form-group col-md-4">
							<label>Contact Person</label>
							<input type="text" class="form-control poc" name="contact_person_name" id="contact_person_name" placeholder="Enter name of Contact"> 
						</div>
						<div class="form-group col-md-3">
							<label>Email</label>
							<input type="text" class="form-control email" name="email" id="email" placeholder="Enter Contact Email"> 
						</div>
						<div class="form-group col-md-3">
							<label>Mobile No.</label>
							<input type="text" class="form-control mobile"  maxlength="10" minlength="10"  name="mobile" id="mobile" placeholder="Enter Contact Mobile No."> 
						</div>
						<div class="form-group col-md-2">
							<label style="visibility:hidden">helloasdasdsds</label>
							<button type="button" class="btn btn-primary btn-xs add_row"><i class="fa fa-plus"></i> Add More </button> 
						</div> 
					</div> 
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
<div id="monthly" style="display:none;">
	<div class="data">
		<div class="col-md-12"><hr style="margin-top:5px;margin-bottom:5px;"></hr></div>
		<div class="form-group col-md-4">
			<label>Contact Person</label>
			<input type="text" class="form-control poc" name="contact_person_name" id="contact_person_name" placeholder="Enter name of Contact Person"> 
		</div>
		<div class="form-group col-md-3">
			<label>Email</label>
			<input type="text" class="form-control email" name="email" id="email" placeholder="Enter Contact Email"> 
		</div>
		<div class="form-group col-md-3">
			<label>Mobile No.</label>
			<input type="text" class="form-control mobile"  maxlength="10" minlength="10"   name="mobile" id="mobile" placeholder="Enter Contact Mobile No."> 
		</div>
		<div class="form-group col-md-2">
			<label style="visibility:hidden">helloasdasdsds</label>
			<button type="button" class="btn btn-primary btn-xs add_row"><i class="fa fa-plus"></i> Add More </button> 
			<button type="button" class="btn  btn-danger btn-xs remove_row"><i class="fa fa-times"></i> Delete </button>	
		</div>
	</div>
</div>
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
		"client_name": {
			required: true,
			specialChars: true
		},
		"location": {
			required: true
		},
		"address": {
			required: true,
		},
		"master_client_pocs[0][contact_person_name]": {
			required: true,
			specialChars: true
		},
		"master_client_pocs[0][email]": {
			required: true,
		},
		"master_client_pocs[0][mobile]": {
			required: true, 
			digits:true,
		},
	},
	messages: {
		"client_name": {
			required: "Please enter Clien Name."
		},
		"location": {
			required: "Please enter Location."
		},
		"email": {
			address: "Please enter Address."
		}
	},
	ignore: ":hidden:not(select)",
	submitHandler: function (form) {
		$("#loader-1").show();
		form[0].submit(); 
	}
});

</script>
 <script>
function add_row()
{   
	var new_line=$("#monthly").html();
	$("#monthly_table").append(new_line);
}
function rename_rows()
{ 
	var i =0;
	$("#monthly_table .data").each(function(){  
		$(this).find("input.poc").attr({name:"master_client_pocs["+i+"][contact_person_name]"});

		$(this).find("input.email").attr({name:"master_client_pocs["+i+"][email]"});
		
		$(this).find("input.mobile").attr({name:"master_client_pocs["+i+"][mobile]"});
		 
		i++;
	});
		
} 
$(document).ready(function(){
	//add_row();
	rename_rows();
});
$( document ).ready(function() {  
	$(document).on("click",".add_row",function(){ 
		add_row();
		rename_rows();
	});
	
	$(document).on("click",".remove_row",function(){ 
		$(this).closest("div .data").remove();
		rename_rows();
 	});
	//-- END GENERAL
	 
});

</script>
