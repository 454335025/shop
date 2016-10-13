<?php


$passwordHash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);