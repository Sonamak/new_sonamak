<?php 

function has_coder($model,$coder_id) {
    return array_search($coder_id,$model->coders->pluck('id')->toArray()) === false ? false : true;
}