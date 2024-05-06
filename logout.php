<?php

/**
 * Scritp para destruir sesión activa del usuario
 * Adrian Guillen
 * 22310361
 */

require_once 'config/config.php';

session_destroy();

header("Location: index.php");
