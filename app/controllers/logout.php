<?php
session_start();

/** Destroy the session */
session_unset();
session_destroy();

/** Redirection to home */
header('Location: /touche-pas-au-klaxon/');
exit;
