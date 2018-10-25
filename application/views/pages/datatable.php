<div id="message"></div>

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
            <!--<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>-->
                    <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
                    <!--<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>-->
        </div>
        <h3><i class="fa fa-table"></i> <?php echo $table_name; ?></h3>
    </div>
    <div class="widget-content">
        <div class="table-responsive">
            <table class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                    <th><div class="checkbox"><input type="checkbox"></div></th>
                    <?php foreach($table_headings as $heading): ?>
                    <th><?php echo $heading; ?></th>
                    <?php endforeach; ?>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($table_datas as $data): ?>
                <tr>
                    <td><div class="checkbox"><input type="checkbox"></div></td>
                    <?php foreach($fields as $field): ?>

                       <?php if($field!='status' && $field!='post_id' && $field!='image' && $field!='created_on' && $field!='edited_on' && $field!='') {
                            echo '<td>'.$data[$field].'</td>';
                        }
                        if($field=='image')
                        {
                            $image=$this->main_model->get_field_by_id('ci_uploads', 'file_name', $data[$field]);

                            if($image)
                            {
                                isset($width)?$width=$width : $width=100;
                                $title=$this->main_model->get_field_by_id('ci_uploads', 'title', $data[$field]);
                                $alt=$this->main_model->get_field_by_id('ci_uploads', 'alt', $data[$field]);
                                echo '<td><img src="'.base_url().$image.'" alt="'.$alt.'" title="'.$title.'" style="width:'.$width.'%;" /></td>';
                            }
                            else
                            {
                                echo '<td></td>';
                            }

                        }
                         elseif($field=='post_id')
                        {
                            echo '<td><a href="'.base_url($this->main_model->get_field_by_id('ci_posts', 'slug', $data[$field])).'" target="_blank">'.$this->main_model->get_field_by_id('ci_posts', 'title', $data[$field]).'</a></td>';
                        }
                        elseif($field=='edited_on' || $field=='created_on')
                        {
                            echo '<td>'.date(DATE_RFC822, $data[$field]).'</td>';
                        }

                        ?>
                    <?php endforeach; ?>
                    <td>
                        <?php if($data["status"]==0) { ?>
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"  title="" data-original-title="Activate" class="btn btn-success btn-xs" onClick="change_status('<?php echo $tablename;?>','<?php echo $data["id"];?>',1);"><i class="fa fa-check-square"></i></a>
                        <?php }else{ ?>
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"  title="" data-original-title="In-Activate" class="btn btn-default btn-xs" onClick="change_status('<?php echo $tablename;?>','<?php echo $data["id"];?>',0);"><i class="fa fa-minus-square"></i></a>
                        <?php } ?>
                        <a href="#modalFormStyle2" data-toggle="modal" onclick="get_details(<?php echo $data['id']; ?>)" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" class="btn btn-danger btn-xs remove-tr" onClick="deleterow('<?php echo $tablename;?>','<?php echo $data["id"];?>');"><i class="fa fa-times"></i></a>
                    </td>
                     
                    <td>
                       <?php if($data["status"]==0) { ?> Inactive <?php }else{ ?> Active <?php } ?> 
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

            <a href="#modalFormStyle2" data-toggle="modal" onclick="reset_inputs()" class="btn btn-primary" >Add Data</a>
        </div>
    </div>
</div>


<script>
    function change_status(table,id,status)
    {
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "change_status",
            dataType: 'json',
            data: {table: table,id:id,status:status},
            success: function(res) {
                if (res)
                {
                    $('#message').html(res.message);
                    setTimeout('history.go(0)', 1000);
                }
            }
        });
    }
    function deleterow(table,id)
    {
        if(confirm('Are You Sure Want To Delete This Item')) {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "delete_row",
                dataType: 'json',
                data: {table: table, id: id},
                success: function (res) {
                    if (res) {
                         $('#message').html(res.message);
                         setTimeout('history.go(0)', 1000);
                    }
                }
            });
        }
        else{
            window.history.go(0);
        }
    }
</script>