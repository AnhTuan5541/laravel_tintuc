<?php

namespace App;

function errors($errors){

    foreach($errors->all() as $err){
        echo $err;
    }
}