<?php

$path = __DIR__ . '/storage';

if (is_link($path)) {
    echo "✅ Storage is a SYMLINK";
} elseif (is_dir($path)) {
    echo "⚠️ Storage is a NORMAL DIRECTORY";
} else {
    echo "❌ Storage does NOT exist";
}
