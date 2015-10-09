/*
*  Copyright (c) Microsoft. All rights reserved. Licensed under the MIT license.
*  See LICENSE in the source repository root for complete license information.
*/


<?php
 /****
 * PHP proxy for using the Bing Search API
 */
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <title>Bing Search</title>
	
    <script language="JavaScript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.2.js"></script>
    <link rel="stylesheet" type="text/css" href="bing.css" />
    <script language="JavaScript" type="text/javascript" src="bing.js"></script>

    <script src="https://appsforoffice.microsoft.com/lib/1/hosted/office.js" type="text/javascript"></script>

</head>
<body>
    <div id="content-header">
        <div class="padding">
            <h1>Bing Search box</h1>
        </div>
    </div>
    <div id="content-main">
        <div class="padding">
		<form method="POST" action="bing.php" id="my_form">
      <p><strong>Enter some text and click the Search Bing button.</strong></p>
			<input id="query" name="query" type="text" size="60" maxlength="60" value="" /><br /><br />
      <input id="bt_search" name="bt_search" type="submit" value="Search Bing" /><br />
			
            
			</form>
 <?php
// Register your Microsoft account at http://datamarket.azure.com to get a key.
$acctKey  = 'Insert your account key';
$rootUri = 'https://api.datamarket.azure.com/Bing/SearchWeb/v1';

if (isset($_POST['query']))
{
  // Encode the query and the single quotes that must surround it.
  $query = urlencode("'{$_POST['query']}'");
    
  // Get the selected service operation (Web or Image).
  $serviceOp = 'Web';
  
  // Construct the full URI for the query.
  $requestUri = "$rootUri/$serviceOp?\$format=json&Query=$query";
  
  // Encode the credentials and create the stream context.
  $auth = base64_encode("$acctKey:$acctKey");
  $data = array(
    'http' => array(
      'request_fulluri' => true,
      // ignore_errors can help debug - remove errors for production. This option was added in PHP 5.2.10.
      'ignore_errors' => true,
      'header'  => "Authorization: Basic $auth")
    );
  $context = stream_context_create($data);
  
  // Get the response from Bing.
  $response = file_get_contents($requestUri, 0, $context);

  // Decode the response.
  $jsonObj = json_decode($response);
  
  $resultStr = '';
  
  // Parse each result according to its metadata type.
  foreach($jsonObj->d->results as $value)
  {  
        $resultStr .= 
          "<a href=\"{$value->Url}\">{$value->Title}</a><p>{$value->Description}</p>";      
  }
?>
<h2>Results</h2>
<?php  
  // Write the result to the output.
  echo $resultStr;
}
?>
		</div>
    </div>
</body>
</html>
