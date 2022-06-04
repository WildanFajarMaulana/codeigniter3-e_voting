<?php 

function acces(){
	$ci=get_instance();
	if (!$ci->session->userdata('nim')) {
		redirect('auth');
	}else{
		$role = $ci->session->userdata('role');
		$role_access = $ci->uri->segment(1);
		if ($role != $role_access) {
			redirect('auth/blocked');
		}
	}
}