<?php
// Path to your working directory
$workingDir = '/home/trimworldwide/backendbb.trimworldwide.com';

// Absolute path to node, npm, and PM2 binaries
$nodeBinPath = '/home/trimworldwide/.nvm/versions/node/v18.20.4/bin/node';


// Set the PATH environment variable explicitly
putenv("PATH=$nodeBinPath:" . getenv('PATH')); // Append nodeBinPath to system PATH

// Define the process name

$processName = 'bb.js';


// Commands for PM2 management
$pm2StopDeleteCommand = "pm2 stop $processName || true && pm2 delete $processName || true";
$pm2CreateCommand = "npm install && pm2 start $processName";
$pm2SaveCommand = "pm2 save";

// Combine all commands (fix order of save command)
$command = "export PATH=$nodeBinPath:\$PATH && export HOME=/home/trimworldwide && cd $workingDir && $pm2StopDeleteCommand && $pm2CreateCommand && $pm2SaveCommand 2>&1";

// Execute the command and capture the output
$output = shell_exec($command);

// Output the result for debugging
echo "<pre>";
echo "Command Output:\n";
echo htmlspecialchars($output);
echo "</pre>";
?>