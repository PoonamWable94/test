<style>
    .uk-grid>* {
        padding-left: 10px;
    }

    .uk-grid {
        text-align: left;
        margin: 0;
        padding: 0;
    }
</style>

<link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet" type="text/css" media="screen">
<link href="<?php echo base_url(); ?>assets/date_time_picker/css/bootstrap-datetimepicker.min.css"  rel="stylesheet" type="text/css" media="screen">

<div id="page_content">    
    <div id="page_content_inner">                
        <div class="uk-grid">
            <div class="uk-width-medium-1-1 uk-row-first">

                <div class="md-card">
                    <div class="md-card-toolbar md-bg-cyan-300" data-toolbar-progress="100">
                        <h1 class="md-card-toolbar-heading-text"> Update Project notification
                            <a href="<?php echo base_url('Project_notification_log/');?>" class="spacing-tab" data-uk-tooltip="{pos:'bottom'}" title=""><i class="md-icon material-icons md-color-white">&#xe3c7;</i></a>
                        </h1>
                    </div>

                    <div class="md-card-content">                        
                        <?php $this->load->helper("form"); ?>
                    
                        <form role="form" id="form_validation" action="<?=base_url();?>Project_notification_log/update_project" method="POST" autocomplete="off">                            
                            <input type="hidden" id="id" name="id" value="<?php echo $pdata->id; ?>">
                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row md-input-filled input-simple">
                                    <label for="company_name"> Company Name</label>
                                    <input type="text" id="company_name" name="company_name" value="<?php echo ($this->input->post('company_name')?$this->input->post('company_name'):$pdata->company_name); ?>" placeholder="Please enter company name" >
                                    <span class="uk-form-help-block uk-text-danger"><?=form_error("company_name");?></span>
                                </div>
                            </div>
                            
                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row md-input-filled input-simple">
                                    <label for="address"> Address</label>
                                    <input type="text" id="address" name="address" value="<?php echo ($this->input->post('address')?$this->input->post('address'):$pdata->address); ?>" placeholder="Please enter address" >
                                    <span class="uk-form-help-block uk-text-danger"><?=form_error("address");?></span>
                                </div>
                            </div>

                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row md-input-filled input-simple">
                                    <label for="area"> Area</label>
                                    <input type="text" id="area" name="area" value="<?php echo ($this->input->post('area')?$this->input->post('area'):$pdata->area); ?>" placeholder="Please enter area" >
                                    <span class="uk-form-help-block uk-text-danger"><?=form_error("area");?></span>
                                </div>
                            </div>

                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row md-input-filled input-simple">
                                    <label for="phone_no"> Phone No</label>
                                    <input type="text" id="phone_no" name="phone_no" value="<?php echo ($this->input->post('phone_no')?$this->input->post('phone_no'):$pdata->phone_no); ?>" placeholder="Please enter phone no" >
                                    <span class="uk-form-help-block uk-text-danger"><?=form_error("phone_no");?></span>
                                </div>
                            </div>

                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row md-input-filled input-simple">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" value="<?php echo ($this->input->post('email')?$this->input->post('email'):$pdata->email); ?>" placeholder="Please enter email" >                                    
                                    <span class="uk-form-help-block uk-text-danger"><?=form_error("email");?></span>
                                </div>
                            </div> 
                                                        
                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row md-input-filled input-simple">
                                    <label for="contact_persone_name">Contact Person Name</label>
                                    <input type="text" id="contact_persone_name" name="contact_persone_name" value="<?php echo ($this->input->post('contact_persone_name')?$this->input->post('contact_persone_name'):$pdata->contact_persone_name); ?>" placeholder="Please enter contact person name" >                                    
                                    <span class="uk-form-help-block uk-text-danger"><?=form_error("contact_persone_name");?></span>
                                </div>
                            </div>     
                            
                            <!-- <div class="uk-width-medium-1-1">
                                <div class="parsley-row md-input-filled input-simple">
                                    <label for="contact_persone_phone_no">Contact Person Phone No</label>
                                    <input type="text" id="contact_persone_phone_no" name="contact_persone_phone_no" value="<?php echo ($this->input->post('contact_persone_phone_no')?$this->input->post('contact_persone_phone_no'):$pdata->contact_persone_phone_no); ?>" placeholder="Please enter contact person phone no" >                                    
                                    <span class="uk-form-help-block uk-text-danger"><?=form_error("contact_persone_phone_no");?></span>
                                </div>
                            </div> 

                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row md-input-filled input-simple">
                                    <label for="contact_persone_email">Contact Persone Email</label>
                                    <input type="text" id="contact_persone_email" name="contact_persone_email" value="<?php echo ($this->input->post('contact_persone_email')?$this->input->post('contact_persone_email'):$pdata->contact_persone_email); ?>" placeholder="Please enter contact person email" >                                    
                                    <span class="uk-form-help-block uk-text-danger"><?=form_error("contact_persone_email");?></span>
                                </div>
                            </div>   
                            
                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row md-input-filled input-simple">
                                    <label for="job_no"> Job No</label>
                                    <input type="text" id="job_no" name="job_no" value="<?php echo ($this->input->post('job_no')?$this->input->post('job_no'):$pdata->job_no); ?>" placeholder="Please enter job no" >
                                    <span class="uk-form-help-block uk-text-danger"><?=form_error("job_no");?></span>
                                </div>
                            </div> -->
                            
                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row md-input-filled input-simple">
                                    <label for="reason"></label>
                                    <button type="submit" name="submit" class="md-btn md-btn-success">Update</button>
                                    <a href="<?=base_url();?>Project_notification_log" class="md-btn">Back</a>
                                </div>
                            </div>                              
                        </form>
                    </div>                                        
                </div>
            </div>
        </div>            
    </div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
   
<script type="text/javascript">
    var base_url = '<?php echo base_url();?>';     
   
    $(document).ready(function(){
          
    });       

</script>