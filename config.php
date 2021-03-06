<?php

  // Database access definition
  $dbname     = "u573184964_gp"; 
  $dbserver   = "localhost"; 
  $dbuser     = "u573184964"; 
  $dbpass     = "gaspedaal"; 
  
  // Define table prefix
  $table_prefix = "";
  
  // Don't display groups
  $nogroups = false;

  // blue, brown, green, grey, pink, purple, red, turquoise, yellow
  $skin_color = "blue";

  //
  // List of Login-Users:
  //
  /*
  $userlist['admin']['pass'] = "secret";
  
  -- Role "readonly": --
  $userlist['view']['pass'] = "apassword";
  $userlist['view']['role'] = "readonly";  

  -- A second, independent domain: --
  $userlist['adm2']['pass']   = "adm2";
  $userlist['adm2']['domain'] = 1;
  */

  // == List of IP-Users ==
  //
  /*
  $iplist['169.168.1.1']['role']  = "admin";
  $iplist['169.168.1.1']['role']  = "readonly";
  */

  //
  // Select displayed columns in "index.php"
  // - EARLY BETA!! (Search may not work well)
  //
  /*
  $disp_cols
    = array( "select"
           , "first_last"
           , "last_first"
           , "lastname"
           , "firstname"
           , "address"
           , "email"
           , "telephone"
           , "home"
           , "mobile"
           , "work"
           , "fax"
           , "edit"
           , "details" );
  */  

  // View e-mail addresses as images
  $mail_as_image = false;

 

  // Setup for "Country guessing" (Beta: Switzerland, US, Belgium)
  $map_guess  = true;

  // Disable all "edit/create" actions
  $read_only  = false;

  // Enable group administration pages
  $public_group_edit = true;

  // Keep a history of all changes, incl. deletion. Used for intelligent merge.
  $keep_history = true;

  // Setup language usage (auto, choose, en, de)
  $lang  = 'choose';
  
  // Change the location of the images (e.g. Google Appspot)
  $url_images = "";

  // Change or ommit page-extension in URL
  $page_ext   = ".php";

  // Disable HTTP-Compression with 0
  $compression_level = 2;
  
  // Disable the AJAX-Mode with "false"
  $use_ajax = true;
?>
