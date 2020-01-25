<?php
/**
 * Deploy script for staging and production site of switching.software
 *
 * @category None
 * @package  None
 * @author   switching.software <info@switching.software>
 * @license  CC-BY-SA 4.0
 * @link     https://switching.software
 */

$secret = getenv('CODEBERG_DEPLOY_SECRET');
$source_dir = '/home/swiso/src/website/';
$public_dir = '/home/swiso/www/website/';

// check for POST request
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    error_log('FAILED - not POST - '. $_SERVER['REQUEST_METHOD']);
    exit();
}

// get content type
$content_type = isset($_SERVER['CONTENT_TYPE']) ? strtolower(trim($_SERVER['CONTENT_TYPE'])) : '';

if ($content_type != 'application/json') {
    error_log('FAILED - not application/json - '. $content_type);
    exit();
}

// get payload
$payload = trim(file_get_contents("php://input"));

if (empty($payload)) {
    error_log('FAILED - no payload');
    exit();
}

// get header signature
if (!isset($_SERVER['HTTP_X_GITEA_SIGNATURE'])) {
    error_log('FAILED - header signature missing');
    exit();
}

$header_signature = $_SERVER['HTTP_X_GITEA_SIGNATURE'];

// check payload signature against header signature
$payload_signature = hash_hmac('sha256', $payload, $secret, false);

if ($header_signature != $payload_signature) {
    error_log('FAILED - payload signature');
    exit();
}

// convert json to array
$decoded = json_decode($payload, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    error_log('FAILED - json decode - '. json_last_error());
    exit();
}

// determine changed branch
if (!isset($data->ref)) {
    error_log('FAILED - no target branch');
    exit();
}

if (substr($data->ref, 0, 11) !== "refs/heads/") {
    error_log('FAILED - couldn\'t determine branch - '. $data->ref);
    exit();
}

$branch = substring($data->ref, 11);
$subdomain = ($branch == "primary") ? '' : $branch . '.';

if ($branch !== "primary" && $branch !== "develop") {
    error_log('FAILED - unknown branch - '. $branch);
    exit();
}

// collect commit messages
$commit_message;
foreach ($data->commits as $commit) {
    $commit_message .= ' ' . $commit->message;
}

if (empty($commit_message)) {
    error_log('FAILED - no commits');
    exit();
}

// Do a git checkout and run Hugo
exec('cd ' . $source_dir);
exec('git fetch --all --prune && git reset --hard origin/' . $branch);
exec('hugo -b https://' . $subdomain . 'switching.software -d ' . $public_dir . $branch);

// Log the deployment
file_put_contents(
    $public_dir . 'deploy.txt',
    date('Y-m-d H:i:s') . " on " .  $branch . ": " . $commit_message . "\n",
    FILE_APPEND
);