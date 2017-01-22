<?php
function upload_photo($new_filename, $inputname, $path){
  $ci =& get_instance();

  if($_FILES[$inputname]['tmp_name'] == ""){
    return false;
  }

  $extension = explode(".", $_FILES[$inputname]['name']);
  $filename = $new_filename.".".end($extension);

  if(file_exists($path.$new_filename.'.png')){
    unlink($path.$new_filename.'.png');
  }
  if(file_exists($path.$new_filename.'.jpg')){
    unlink($path.$new_filename.'.jpg');
  }

  $config['upload_path']          = $path;
  $config['allowed_types']        = 'gif|jpg|png';
  $config['max_size']             = 100;
  $config['max_width']            = 1024;
  $config['max_height']           = 1024;
  $config['file_name'] = $filename;

  $ci->load->library('upload', $config);

  if (!$ci->upload->do_upload($inputname)){
    return false;
  }

  return $filename;
}
