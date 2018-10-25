<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct()
    {
        parent::__construct();
        $this->load->model('main_model');
    }
	public function index()
	{
		
       $links=$this->set_activate($this->set_admin_menu(),1);
        $data=$this->basic();
        $data['submenu']='hide-sub-menu';

        $menuitems='';

        $data['menuitems']=$menuitems;

        $this->load->view('template/header');
        $this->load->view('template/menu_header',$data);
        $this->load->view('template/menu',$links);
        $this->load->view('template/submenu');
        $this->load->view('template/breadcrumbs',$data);


          $data['tablename']='ci_employee';
        $data['table_name']='Employee Details';
        $fields=array('id','name','email','phone','dob','created_on');
        $table_heading=array('Emp ID','Emp Name','Email','Phone','DOB','Created On','Action');
        $table_data=$this->main_model->get_table_data_order($data['tablename'],'all','desc');
        $data['fields']=$fields;
        $data['table_headings']=$table_heading;
        $data['table_datas']=$table_data;
        $this->load->view('pages/datatable',$data);
         $this->load->view('pages/modal',$data);
        $this->load->view('template/footer');

	}
	   public function basic()
    {

        $segments = $this->uri->segment_array();
        $extension=base_url();
        $count=count($segments);
        $breadcrumbs="";
        foreach ($segments as $segment)
        {

           echo  $extension.=$segment."/";

            if($count!=1)
            {

                $breadcrumbs.='<li><a href="'.$extension.'">'.str_replace("-"," ",ucfirst($segment)).'</a>';
                $breadcrumbs.= '</li>';
            }
            else
            {
                $breadcrumbs.='<li class="active">'.str_replace("-"," ",ucfirst($segment)).'</li>';
                if(is_numeric($segment))$segment='ID : '.$segment;
                $data['heading']=str_replace("-"," ",ucfirst($segment));
            }

            $count--;
        }
        $data['breadcrumbs']=$breadcrumbs;

        $data['heading']='APA Task';
        
        return $data;
    }
	 public function set_activate($total , $current)
    {
        for($i=1;$i<=$total;$i++)
        {
            $val['link'.$i]="";
            if($i==$current)$val['link'.$i]="active";
        }
        return $val;
    }
    public function set_admin_menu()
    {
        return 1;
    }
    

    public function get_data()
    {
        $id=$this->input->post('id');
        $details=$this->main_model->get_row_data('ci_employee',$id);

        echo json_encode($details);

    }
    public function update_data()
    {
    	$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone number', 'required');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'required');

        if($this->form_validation->run()=== TRUE) {

	    	if($this->input->post('id')!='')
	    	{
	    		$this->main_model->update_data($this->input->post('id'));
	           $data['success']='<div class="alert alert-success alert-dismissable">
	              <i class="fa fa-check-circle"></i> <strong>Well done!</strong> You Have successfully Updated Info.
	              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	            </div>';
	    	}
	    	else
	    	{
	    		$this->main_model->add_data($this->input->post('id'));
	           $data['success']='<div class="alert alert-success alert-dismissable">
	              <i class="fa fa-check-circle"></i> <strong>Well done!</strong> You Have successfully Added Info.
	              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	            </div>';
	    	}
	        
	        echo json_encode($data);
	    }
	    else
	    {
	    	 $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
	    }

    }

    public function status_change()
    {
        $this->main_model->update_status();
        $data['message']='<div class="alert alert-success alert-dismissable">
              <i class="fa fa-check-circle"></i> <strong>Well done!</strong> You Have successfully changed the status.
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            </div>';

        echo json_encode($data);
    }
    public function delete_row()
    {
        $this->main_model->delete_row();
        $data['message']='<div class="alert alert-success alert-dismissable">
              <i class="fa fa-check-circle"></i> <strong>Well done!</strong> You Have successfully deleted.
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            </div>';

        echo json_encode($data);
    }

}
