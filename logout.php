<?php

/**
 * Scritp para destruir sesión activa del usuario
 * Autor: Adrian Guillen
 * Web: https://github.com/GuillenA7
 */

require 'config/config.php';

session_destroy();

header('Location: index.php');
