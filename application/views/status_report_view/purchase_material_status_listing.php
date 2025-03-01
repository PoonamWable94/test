<style>
    .table_head{
        font-size: 16px;    
        background-color: #5f5e5c;
    }
</style>
    <div id="page_content">   

    <div id="page_content_inner">        
        <div class="md-card">
            <div class="md-card-toolbar md-bg-cyan-300" data-toolbar-progress="100">
                <div class="md-card-toolbar-heading-text"> Purchase Material Status Report
                    <?php if($this->session->userdata('role') != 4) { ?>
                        <a href="<?php echo base_url('client/add_client');?>" class="spacing-tab" data-uk-tooltip="{pos:'bottom'}" title=""><i class="md-icon material-icons md-color-white">&#xE146;</i></a> 
                    <?php } ?>        
                </div>
            </div>


            <div class="uk-width-medium-1-2 md-card-content ">
                <div class="uk-grid"> 
                   
                    <label for="projectNo">Project Number</label>
                   <!-- <?php print_r($project_list); ?> -->
                    <div class="uk-width-1-1">
                            <div class="parsley-row md-input-wrapper">
                                <select name="projects_id" id="projects_id" value="<?php echo $this->input->post('projects_id'); ?>">
                                    <option value="">Select Project No</option>
                                    <?php foreach($project_list as $project){?>
                                        <option value="<?php echo $project['id'];?>"><?php echo $project['project_no'];?></option>

                                     <?php } ?>   
                                </select>
                                <span id="errortag" class="uk-text-danger"></span>
                            </div>
                    </div>
                </div>
            </div>




            <div class="md-card-content task-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-align-vertical uk-table-nowrap uk-table-condensed tablesorter tablesorter-altair" id="ts_issues4">
                        <thead>
                            <tr class="table_head">
                                <th class="uk-text-center" style="color:#fff">#</th>
                                <th style="color:#fff">sno</th>                                
                                <th style="color:#fff">projectNo</th>                                
                                <th style="color:#fff">description</th>                                
                                <th style="color:#fff">tech_req</th>
                                <th style="color:#fff">material_reqd_prod</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div> 
                
                
                
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/date_time_picker/js/bootstrap-datetimepicker.pt-BR.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/date_time_picker/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">

    var save_method; //for save method string
    var table;

    $(document).ready(function() {            
        table = $('#ts_issues4').DataTable({ 

            "processing": true, 
            "serverSide": true,
            "pageLength": 50,
            "order": [], 

            "ajax": {
                "url": "<?php echo site_url('status_report/purchase_material_status/ajax_list')?>",
                "type": "POST"
            },

            "columnDefs": [
                { 
                   //"targets": [ 0, -1, -2],
                   "targets": [ 0, -1, -2], 
                    "orderable": false,
                }
            ],
        });
    });


    $('#projects_id').change(function() {
    // Destroy the existing DataTable instance to refresh with new data
    $('#ts_issues4').DataTable().destroy();

    var projects_id = $('#projects_id').val();

    // Initialize DataTable with updated parameters
    var table = $('#ts_issues4').DataTable({ 
        "processing": true, 
        "serverSide": true,
        "pageLength": 50,
        "order": [], 

        "ajax": {
            "url": "<?php echo site_url('status_report/purchase_material_status/ajax_list')?>",
            "type": "POST",
            "data": {
                'projects_id': projects_id
            }
        },

        "columnDefs": [
            { 
                "targets": [0], // Disable ordering for the first, last, and second-last columns
                "orderable": false
            }
        ]
    });
});


    // function view_data(id)
    // {    
    //     //   console.log(id);
    //     $.ajax({
    //         url : "<?php echo site_url('client/view_data')?>/" + id,
    //         type: "GET",
    //         dataType: "JSON",
    //         success: function(data)
    //         {          
    //             // console.log(data);                  
    //             $('[name="company_name"]').val(data.company_name);
    //             $('[name="address"]').val(data.address);
    //             $('[name="area"]').val(data.area);     
    //             // $('[name="job_no"]').val(data.job_no);                
    //             $('[name="phone_no"]').val(data.phone_no);
    //             $('[name="email"]').val(data.email);                
    //             $('[name="contact_persone_name"]').val(data.contact_persone_name);
    //             // $('[name="contact_persone_phone_no"]').val(data.contact_persone_phone_no);  
    //             // $('[name="contact_persone_email"]').val(data.contact_persone_email);                
    //             UIkit.modal($('.uk-modal')).show();
    //         },

    //         error: function (jqXHR, textStatus, errorThrown)
    //         {
    //             alert('Error get data from ajax');
    //         }
    //     });
    // }

    //  $("#check-all").click(function () {
    //     $(".data-check").prop('checked', $(this).prop('checked'));
    // });

    // // Change the Status...
    // $(document).on('click','.status_checks',function()
    // {
    //     var status=($(this).hasClass("md-btn-success")) ? '0' : '1';
    //     var msg=(status=='0')? 'Passive' : 'Active';

    //     if(confirm("Are you sure to "+ msg + "this record"))
    //     {
    //         var current_element=$(this);
    //         var id = $(current_element).attr('data');
    //         var myurl="<?php echo base_url()."client/update_status"?>";
    //         // console.log(id);
    //         $.ajax({
    //             type:"POST",
    //             url:myurl,
    //             data:{"id":id,"status":status},
    //             success:function(data)
    //             {   
    //                 // console.log(data);
    //                 reload_table();
    //             }
    //         });
    //     }      
    // });
    
    // function reload_table()
    // {
    //     table.ajax.reload(null,false); //reload datatable ajax 
    // }
    // function save()
    // {

    //     $('#btnSave').text('saving...'); //change button text
    //     $('#btnSave').attr('disabled',true); //set button disable 
    //     var url;

    //     if(save_method == 'add') {
    //         url = "<?php echo site_url('client/ajax_add')?>";
    //     } else {
    //         url = "<?php echo site_url('client/ajax_update')?>";
    //     }

    //     // ajax adding data to database
    //     var formData = new FormData($('#form')[0]);
    //     $.ajax({
    //         url : url,
    //         type: "POST",
    //         data: formData,
    //         contentType: false,
    //         processData: false,
    //         dataType: "JSON",
    //         success: function(data)
    //         {
    
    //             if(data.status) //if success close modal and reload ajax table
    //             {
    //                 UIkit.modal($('.uk-modal')).hide();
    //                 reload_table();

    //                 UIkit.notify({
    //                     message : 'Record saved!',
    //                     status  : 'success',
    //                     timeout : 5000,
    //                     pos     : 'bottom-center'
    //                 })
    //             }
    //             else
    //             {
    //                 for (var i = 0; i < data.inputerror.length; i++) 
    //                 {
    //                     if(data.status == false)
    //                     {
    //                         $('[name="'+data.inputerror[i]+'"]').next().addClass('parsley-required'); //select parent twice to select div form-group class and add has-error class
    //                         $('[name="'+data.inputerror[i]+'"]').addClass('md-input-danger');
    //                         $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
    //                     }
    //                 }
    //             }
    //             $('#btnSave').text('save'); //change button text
    //             $('#btnSave').attr('disabled',false); //set button enable 
    //         },
    //         error: function (jqXHR, textStatus, errorThrown)
    //         {
    //             alert('Error adding / update data');
    //             $('#btnSave').text('save'); //change button text
    //             $('#btnSave').attr('disabled',false); //set button enable 
    //         }
    //     });

    // }
    // function delete_data(id)
    // {
    //     UIkit.modal.confirm('Are you sure you want to delete this call?', function(){ 
    //         $.ajax({
    //             url : "<?php echo site_url('client/ajax_delete')?>/"+id,
    //             type: "POST",
    //             dataType: "JSON",
    //             success: function(data)
    //             {
    //                 table.ajax.reload(null,false);
    //                 UIkit.notify({
    //                     message : 'Call removed successfully!',
    //                     status  : 'danger',
    //                     timeout : 1000,
    //                     pos     : 'bottom-center'
    //                 })
    //             },
    //             error: function (jqXHR, textStatus, errorThrown)
    //             {
    //                 alert('Error removing call');
    //             }
    //         });
    //     });
    // }
    // function bulk_delete()
    // {
    //     var list_id = [];
    //     $(".data-check:checked").each(function() {
    //             list_id.push(this.value);
    //     });
    //     if(list_id.length > 0)
    //     {
    //         UIkit.modal.confirm('Are you sure delete this '+list_id.length+' data?', function(){ 
    //         // if(confirm('Are you sure delete this '+list_id.length+' data?'))
    //         // {
    //             $.ajax({
    //                 type: "POST",
    //                 data: {id:list_id},
    //                 url: "<?php echo site_url('client/ajax_bulk_delete')?>",
    //                 dataType: "JSON",
    //                 success: function(data)
    //                 {
    //                     if(data.status)
    //                     {
    //                         reload_table();
    //                         UIkit.notify({
    //                     message : 'Records deleted!',
    //                     status  : 'danger',
    //                     timeout : 5000,
    //                     pos     : 'bottom-center'
    //                 })
    //                     }
    //                     else
    //                     {
    //                         alert('Failed.');
    //                     }
    //                 },
    //                 error: function (jqXHR, textStatus, errorThrown)
    //                 {
    //                     alert('Error deleting data');
    //                 }
    //             });
    //         });
    //     }
    //     else
    //     {
    //         UIkit.modal.alert('No record selected!')
    //     }
    // }
</script>