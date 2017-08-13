<?php
/*
 @goal to enable Aog monitor its repos and see what new issues are being open.

 @author Ido Green | @greenido
 @date 8/2017

 @see 
 1. https://github.com/KnpLabs/php-github-api/blob/master/doc/issues.md
 2. https://developer.github.com/v3/issues/#list-issues
 
*/

require_once 'vendor/autoload.php';
$client = new \Github\Client();
date_default_timezone_set('America/Los_Angeles');

//
// Fetch all the open issues per $repo
//
function printIssues($repo, $client) {
  $twoDaysAgoTime = strtotime("-2 days");
  $twoDaysAgoStr = date('Y-m-d', $twoDaysAgoTime);

  echo "\n\nIssues on $repo from $twoDaysAgoStr\n";
  echo "==========================================================\n\n";
  $issues = $client->api('issue')->all('actions-on-google', $repo, array('state' => 'open'));
  $i = 1;
  foreach ($issues as $key => $issue) {
    $tmpDate = substr($issue['created_at'], 0, 10);
    if (strtotime($tmpDate) > $twoDaysAgoTime) {
      echo $i . ") [" . $tmpDate . "] " . ($issue['title'] . " - " . $issue['url'] .  "\n");
      $i++;
    }
  }
}

$reposToCheck = ['actions-on-google-nodejs',
  'apiai-facts-about-google-nodejs',
  'actionssdk-smart-home-nodejs',
  'apiai-trivia-game-nodejs',
  'apiai-transactions-nodejs',
  'apiai-webhook-template-nodejs'];
// All the repos we wish to monitor
foreach ($reposToCheck as $key => $repoName) {
  printIssues($repoName, $client);  
}

echo "\n\n**** Done **** \n";

