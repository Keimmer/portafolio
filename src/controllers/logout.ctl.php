<?php
    session_start();
    session_unset();
    session_destroy();

    header("location: /Portafolio?success=logoutSucceded");
    exit();