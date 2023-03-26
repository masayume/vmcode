<!DOCTYPE html>
<html lang="en">
<head>

<title>Homemade chatGPT prompt</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="Create your own chatGPT prompt">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<h1>chatGPT Prompt</h1>
<p>Ask a question to chatGPT</p>
<div class='result'>
<p>
<?php
session_start();
// Set your API key and the endpoint URL for the OpenAI API
$api_key = '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'; //add API key here
$endpoint_url = 'https://api.openai.com/v1/chat/completions';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Get question
$input = $_POST['input'];

// Set up the request data for the OpenAI API
$data = array(
//'temperature' => 0.5,
'max_tokens' => 60,
//'frequency_penalty' => 0,
//'presence_penalty' => 0,
'model' => 'gpt-3.5-turbo', // Specify the model to use
'messages' => [
[
'role' => 'user',
'content' => $input
]
]
);

//add chat history to data input array
if (isset($_SESSION['history'])) {
array_unshift($data['messages'], ...$_SESSION['history']);
$data['messages'] = array_values($data['messages']);
//echo json_encode($_SESSION['history']) . "<br><br>"; //un-comment to show chat history
//echo json_encode($data) . "<br><br>"; //un-comment to show data input array
}

// Set up the HTTP headers for the request
$headers = array(
'Content-Type: application/json',
'Authorization: Bearer ' . $api_key
);

// Send the request to the OpenAI API using cURL
$ch = curl_init($endpoint_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
curl_close($ch);

// Parse the response from the OpenAI API
$result = json_decode($response, true);
$answer = $result['choices'][0]['message']['content'];

// Output the answer to the user
echo $answer;

//save to message history
$user_input = array([
'role' => 'user',
'content' => $input]
);
$user_output = array([
'role' => 'assistant',
'content' => $answer]
);
$history = array_merge($user_input, $user_output);

if (isset($_SESSION['history'])){
$_SESSION['history'] = array_merge($_SESSION['history'], $history);
} else {$_SESSION['history'] = $history;}
}
?>
</p>
</div>
<div class="prompt-form">
<form method="post">
<input type="text" name="input" id='input' placeholder="Ask chatGPT" required="">
<input type="submit" name="submit" value="Ask chatGPT">
</form>
</div>
</body>
</html>