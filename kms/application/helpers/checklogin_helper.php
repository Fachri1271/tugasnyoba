<?php

function  checklog()
{
    $CI = & get_instance();
    $id_level = $CI->session->userdata('id_level');
    if (!empty($id_level)) {
        redirect('dashboard');
    }
}

function checklogin()
{
    $CI = &get_instance();
    $id_level = $CI->session->userdata('id_level');
    if (!empty($id_level)) {
        redirect('auth/login');
    }
}
