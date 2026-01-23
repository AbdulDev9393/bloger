<?php
$repo_dir = '/home/techblogs/techblogs';
$output = shell_exec("cd $repo_dir && git reset --hard && git pull origin main 2>&1");
echo "<pre>$output</pre>";
?>
