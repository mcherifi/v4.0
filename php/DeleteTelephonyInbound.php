<?php

require_once('CRMDefaults.php');
require_once('LanguageHandler.php');
require_once('DbHandler.php');
require_once('goCRMAPISettings.php');

$lh = \creamy\LanguageHandler::getInstance();

$groupid = NULL;
if (isset($_POST["groupid"])) {
    $groupid = $_POST["groupid"];
}

$ivr = NULL;
if (isset($_POST["ivr"])) {
    $ivr = $_POST["ivr"];
}

$did = NULL;
if (isset($_POST["did"])) {
    $did = $_POST["did"];
}

// IF INGROUP IS DELETED
if ($groupid != NULL) {
/*
 * Deleting In-group
 * [[API:Function]] – goDeleteInbound
 * This application is used to delete a in-group. Only in-group that belongs to authenticated user can be delete.
*/
    $url = gourl."/goInbound/goAPI.php"; #URL to GoAutoDial API. (required)
    $postfields["goUser"] = goUser; #Username goes here. (required)
    $postfields["goPass"] = goPass; #Password goes here. (required)
    $postfields["goAction"] = "goDeleteInbound"; #action performed by the [[API:Functions]]. (required)
    $postfields["responsetype"] = responsetype; #json. (required)
    $postfields["group_id"] = $groupid; #Desired User ID. (required)
    $postfields["hostname"] = $_SERVER['REMOTE_ADDR']; #Default value
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    $data = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($data);
     
    if ($output->result=="success") {
    # Result was OK!
        ob_clean();
        print CRM_DEFAULT_SUCCESS_RESPONSE;
    } else {
        ob_clean(); 
        $lh->translateText("unable_delete_ingroup");
    }

} else {
    ob_clean(); $lh->translateText("some_fields_missing");
}

// IF IVR IS DELETED
if ($ivr != NULL) {
/*
 * Deleting Interactive Voice Response
 * [[API:Function]] – goDeleteIVR
 * This application is used to delete a IVR menu. Only IVR menu that belongs to authenticated user can be delete.
*/
    $url = gourl."/goInbound/goAPI.php"; #URL to GoAutoDial API. (required)
    $postfields["goUser"] = goUser; #Username goes here. (required)
    $postfields["goPass"] = goPass; #Password goes here. (required)
    $postfields["goAction"] = "goDeleteIVR"; #action performed by the [[API:Functions]]. (required)
    $postfields["responsetype"] = responsetype; #json. (required)
    $postfields["menu_id"] = $ivr; #Desired User ID. (required)
    $postfields["hostname"] = $_SERVER['REMOTE_ADDR']; #Default value
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    $data = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($data);
     
    if ($output->result=="success") {
    # Result was OK!
		ob_clean();
		print CRM_DEFAULT_SUCCESS_RESPONSE;
    } else {
		ob_clean(); 
		$lh->translateText("unable_delete_ivr");
    }

} else {
	ob_clean(); $lh->translateText("some_fields_missing");
}

// IF PHONENUMBER IS DELETED
if ($did != NULL) {
/*
 * Deleting DID
 * [[API:Function]] – goDeleteDID
 * This application is used to delete a did. Only did that belongs to authenticated user can be delete.
*/
    $url = gourl."/goInbound/goAPI.php"; #URL to GoAutoDial API. (required)
    $postfields["goUser"] = goUser; #Username goes here. (required)
    $postfields["goPass"] = goPass; #Password goes here. (required)
    $postfields["goAction"] = "goDeleteDID"; #action performed by the [[API:Functions]]. (required)
    $postfields["responsetype"] = responsetype; #json. (required)
    $postfields["did_id"] = $did; #Desired User ID. (required)
    $postfields["hostname"] = $_SERVER['REMOTE_ADDR']; #Default value
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    $data = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($data);
     
    if ($output->result=="success") {
    # Result was OK!
        ob_clean();
        print CRM_DEFAULT_SUCCESS_RESPONSE;
    } else {
        ob_clean(); 
        $lh->translateText("unable_delete_phonenumber");
    }

} else {
    ob_clean(); $lh->translateText("some_fields_missing");
}

?>