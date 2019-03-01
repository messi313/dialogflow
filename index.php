<?php
$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST")
{
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {
		case 'hi':
			$speech = "Hi,Nice to meet you";
			break;
		case 'bye'
			$speech = "Bye,good night";
			break;

		case 'anything'
				$speech = "yes,you can type anything";
				break;	
		default:
			$speech = "Sorry,i didn't get that"
			break;
	}
    
    $response = new \stdclass();
    $response->speech = "";
    $response->source = "webhook";
    echo json_encode($response);

}

else
{
	echo "Method not alllowed";
}

?>