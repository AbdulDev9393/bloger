<?php
// Secret token — random string (optional but recommended for security)
$secret = 'mySecretToken123';

// Verify GitHub secret token (if set)
$headers = getallheaders();
if (!isset($headers['X-Hub-Signature-256'])) {
    http_response_code(403);
    die('No signature');
}

$signature = 'sha256=' . hash_hmac('sha256', file_get_contents('php://input'), $secret);
if (!hash_equals($signature, $headers['X-Hub-Signature-256'])) {
    http_response_code(403);
    die('Invalid signature');
}

$repo_dir = '/home/techblogs/techblogs';

// Pull latest code from main branch
$output = shell_exec("cd $repo_dir && git reset --hard && git pull origin main 2>&1");

echo "<pre>$output</pre>";
?>
