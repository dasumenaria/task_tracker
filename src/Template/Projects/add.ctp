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
              <h3 class="box-title">Add Project</h3>
            </div>
			
			<?php  echo $this->Form->create($project, ['type' => 'file','id'=>"UserRegisterForm"]); ?>
				<div class="box-body"> 
					<div class="form-group col-md-6">
						<label>Project Name</label>
						<input type="text" class="form-control" name="title" id="title" placeholder="Enter project title">
					</div>
					<div class="form-group col-md-6">
						<label>Deadline</label>
						<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="deadline" id="deadline" placeholder="Enter deadline">
					</div>
					<div class="form-group col-md-6">
						<label>Select Client</label>
						<?php echo  $this->Form->control('master_client_id', ['options' => $masterClients,'class'=>"form-control select2", 'data-placeholder'=>'Select...','empty'=>'Select...','label'=>false]);?>
						<label id="master-client-id-error" class="error" style="display:none" for="master-client-id">This field is required.</label>
					</div>
					<div class="form-group col-md-6">
						<label>Select POC</label>
						<?php echo  $this->Form->control('user_id', ['options' => $users,'class'=>"form-control select2", 'data-placeholder'=>'Select...','empty'=>'Select...','label'=>false]);?>
						<label id="user-id-error" class="error" style="display:none" for="user-id">This field is required.</label>
					</div>
					<div class="form-group col-md-6">
						<label>Select Project Memabers</label>
						<?php echo  $this->Form->control('projectmenbers', ['options' => $users,'class'=>"form-control select2",'multiple'=>true, 'data-placeholder'=>'Select...','empty'=>'Select...','label'=>false]);?>
						<label id="projectmenbers-error" class="error" style="display:none" for="projectmenbers">This field is required.</label>
					</div>  
				 
					<div class="col-md-12">
						<hr></hr>
						<center>
							<button type="submit" class="btn btn-info">Submit</button>
						</center>	
					</div>	 
				</div>					
             </form>
                     
        </div>
       </div>
   </section> 
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
		"title": {
			required: true,
		},
		"user_id": {
			required: true
		},
		"master_client_id": {
			required: true,
		}, 
		"deadline": {
			required: true,
		}, 
		"projectmenbers[]": {
			required: true,
		}
	},
	ignore: ":hidden:not(select)",
	submitHandler: function (form) {
		$("#loader-1").show();
		form[0].submit(); 
	}
});
</script> 
 