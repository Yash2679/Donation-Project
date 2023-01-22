<?php
if(isset($_POST['page'])){
    if($_POST['page']=="Pin"){
        $pin=$_POST['pincode'];

        $url="https://api.postalpincode.in/pincode/".$pin."";
        $data=@file_get_contents($url);
        $array=json_decode($data);
        if(isset($array['0']->PostOffice['0']->Block))
        {
            $Output=array(
                'success'=>$array['0']->PostOffice['0']->Block
            );
        }
        else{
            $Output=array(
                'error'=>'invalid pin code'
            );
        }
        // $Output=array(
        //     'success'=>true
        // );
        echo json_encode($Output);
    }
}

?>