<?php
    function Loi($errors)
    {
        if(count($errors) > 0)
        {
           $loi = '<div class="alert alert-danger">';
           foreach($errors as $err)
           {
               $loi.= $err .'<br/>';
           }
           $loi.='</div>';
        }
    }

    function ThongBao()
    {
        if(session('thongbao'))
        {
            $thongbao = '<div class="alert alert-success">';
            $thongbao.= session('thongbao').'</div>';
        }

    }
