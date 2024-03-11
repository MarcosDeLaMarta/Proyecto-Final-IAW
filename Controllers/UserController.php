<?php

include_once ("views/view.php");

public function showiniciosesion(){
    View::show("login");
}
public function cerrarsesion(){
    session_destroy();
    View::show("login");
}
