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

//
// Fetch all the open issues per $repo
//
function printIssues($repo, $client) {
  echo "\n\nIssues on $repo\n";
  echo "===========================================\n\n";
  $issues = $client->api('issue')->all('actions-on-google', $repo, array('state' => 'open'));
  $i = 1;
  foreach ($issues as $key => $issue) {
    $tmpDate = substr($issue['created_at'], 0, 10);
    echo $i . ") [" . $tmpDate . "] " . ($issue['title'] . " - " . $issue['url'] .  "\n");
    $i++;
  }
}

// All the repos we wish to monitor
printIssues('actions-on-google-nodejs', $client);
printIssues('actionssdk-smart-home-nodejs', $client);


