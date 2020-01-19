<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "address";
        
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
////         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
