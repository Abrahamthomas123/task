
<style>
#data_success p{
    color:red;
}
</style>
<div class="modal fade" id="modalFormStyle2" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="widget widget-blue">
                <div class="widget-title">
                    <div class="widget-controls">
                        <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
                        <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>

                        <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
                            <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
                            <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
                                <li class="dropdown-header">Set Widget Color</li>
                                <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
                                <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
                                <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
                                <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
                                <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
                            </ul>
                        </div>
                        <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
                        <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
                        <a href="#" class="widget-control"  data-dismiss="modal" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
                    </div>
                    <h3><i class="fa fa-ok-circle"></i> Employee Information</h3>
                </div>
                <div class="widget-content" id="modalcontent">
                    <div id="data_success"></div>
                    <?php echo form_open();?>
                    <div class="row">

                      
                        <div class="col-sm-12">

                            <input type="hidden" class="form-control" id="id" name="id" value="" />
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Emp Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Employee name" value="" />
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Employee email" value="" />
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Employee phone" value="" />
                                </div>

                                <div class="form-group">
                                    <label>DOB</label>
                                    <input type="text" class="form-control  input-datepicker" id="dob" name="dob" placeholder="Enter Employee date of birth" value="" />
                                </div>

                                <button type="button" class="btn btn-primary" name="update" value="update" onclick="update_media();">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>


    function get_details(id)
    {
        $('#data_success').html('');
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url('/'); ?>" + "get_data",
            dataType: 'json',
            data: {id: id},
            success: function(res) {
                if (res)
                {
                    document.getElementById('id').value=res.id;
                     document.getElementById('name').value=res.name;
                     document.getElementById('email').value=res.email;
                    document.getElementById('phone').value=res.phone;
                    document.getElementById('dob').value=res.dob;
                }
            }
        });
    }
    function reset_inputs(){
       document.getElementById('id').value='';
       document.getElementById('name').value='';
       document.getElementById('email').value='';
       document.getElementById('phone').value='';
       document.getElementById('dob').value='';

        $('#data_success').html('');
    }
    function update_media()
    {
        id=document.getElementById('id').value;
        name=document.getElementById('name').value;
        email=document.getElementById('email').value;
        phone=document.getElementById('phone').value;
        dob= document.getElementById('dob').value;
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url('/'); ?>" + "update_data",
            dataType: 'json',
            data: {id: id,name:name,email:email,phone:phone,dob:dob},
            success: function(res) {
                if (res)
                {
                    if($.isEmptyObject(res.error)){
                         $('#data_success').html(res.success);
                        setTimeout('history.go(0)', 1500);
                    }else{                        
                        $('#data_success').html(res.error);
                    }        
                }
            },
            error: function( req, status, err ) {
              console.log( 'something went wrong', status, err );
            }
        });
    }

</script>