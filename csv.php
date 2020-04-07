<?php

  //
  // Excel export - .csv Unicode
  //
  // concept found on selfhtml.org
  //

  include ("include/dbconnect.php");

  // Check if unicode can be produced with Unicode
    $use_utf_16LE = function_exists('mb_convert_encoding');

  function add($value, $first = false) {
  	
  	global $use_utf_16LE;
  	
  	// Remove whitespaces, replace newlines and escapes "
  	$res = trim($value);
  	$res = str_replace("\r\n", ", ", $res);
  	$res = str_replace('"', '""',  $res);
  
  	// Add to result
  	if($use_utf_16LE) {  		
  	  $res = ($first ? "" : "\t" ) . '"'.$res.'"';
      print mb_convert_encoding( $res, 'UTF-16LE', 'UTF-8');
      
    } else { // decode
      $res = ($first ? "" : ";" ) . '"'.$res.'"';
      print utf8_decode($res);
    }
  }
	
	$sql = "SELECT $table.*, $month_lookup.bmonth_num FROM $month_from_where ORDER BY lastname, firstname ASC";

	$result = mysql_query($sql);
	$resultsnumber = mysql_numrows($result);	

  // Header charset=UTF-8");
  Header("Content-Type: application/vnd.ms-excel");
  Header("Content-disposition: attachement; filename=export-".date("Ymd").($group_name != "" ? "-".$group_name : "").".csv");
  Header("Content-Transfer-Encoding: 8bit");  

  if($use_utf_16LE)
 	  print chr(255).chr(254);

	# Name + birthday
	add(ucfmsg("LASTNAME"), true);
	add(ucfmsg("FIRSTNAME"));
	add(ucfmsg("BIRTHDAY"));

	# Home contact
	add(ucfmsg("ADDRESS"));
	if($zip_pattern != "")
	{
		add(ucfmsg("ZIP"));
		add(ucfmsg("CITY"));
	}
        
	add(ucfmsg("PHONE_HOME"));
	add(ucfmsg("PHONE_MOBILE"));
	add(ucfmsg("E_MAIL_HOME"));

	# Work contact
	add(ucfmsg("PHONE_WORK"));
	add(ucfmsg("FAX"));
	add(ucfmsg("E_MAIL_OFFICE"));


	# 2. contact
	add(ucfmsg("2ND_ADDRESS"));
	add(ucfmsg("2ND_PHONE"));
	
  if($use_utf_16LE)
  	print mb_convert_encoding( "\n", 'UTF-16LE', 'UTF-8');
  else
	  echo "\r\n";

	while ($birthrow = mysql_fetch_array($result))
	{

		# Name + birthday
		add($birthrow["lastname"], true);
		add($birthrow["firstname"]);

		$day    = $birthrow["bday"];
		$year   = $birthrow["byear"];
                if(false) // verbose month
                {
		  // $month  = $birthrow["bmonth"];
		  add( ($day > 0 ? "$day. ":"").($month != null ? $month : "")." $year"); 
                } else {
		  $month  = $birthrow["bmonth_num"];
		  add( ($day > 0 ? "$day.":"").($month != null ? "$month." : "")."$year"); 
                }
		
		# Home contact
		if($zip_pattern != "")
		{
		  $address = "";
		  $zip     = "";
		  $city    = "";
			preg_match( "/(.*)(\b".$zip_pattern."\b)(.*)/m"
                                  , str_replace("\r\n", ", ", trim($addrrow["address"])), $matches);
		if(count($matches) > 1)
			$address = preg_replace("/,$/", "", trim($matches[1]));
		if(count($matches) > 2)
			$zip = $matches[2];
		if(count($matches) > 3)
			$city = preg_replace("/^,/", "", trim($matches[3]));
			
		add($address);
		add($zip);
		add($city);		
		}
		else add($addrrow["address"]);

		# Privat contact
		add($addrrow["home"]);
		add($addrrow["mobile"]);
		add($addrrow["email"]);


		# Work contact
		add($addrrow["work"]);
		add($addrrow["fax"]);
		add($addrrow["email2"]);

		# 2nd contact
		add($addrrow["address2"]);
		add($addrrow["phone2"]);

    if($use_utf_16LE)
    	print mb_convert_encoding( "\n", 'UTF-16LE', 'UTF-8');
    else
      echo "\r\n";
	}

?>