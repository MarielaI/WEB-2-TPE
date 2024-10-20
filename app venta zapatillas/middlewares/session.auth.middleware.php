<?php
    function sesionAutMiddleware($res) {
        session_start();
        if(isset($_SESSION['ID_USER'])){
            $res->user = new stdClass();
            $res->user->id = $_SESSION['ID_USER'];
            $res->user->nombre_us = $_SESSION['nombre_USER'];
            return;
            }
    }
    ?>