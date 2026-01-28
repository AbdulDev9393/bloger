import sys
import json

# Laravel سے argument لو
title = sys.argv[1]

# Dummy content generate (آپ یہاں AI model call کر سکتے ہیں)
content = f"<h1>{title}</h1><p>This is a fully generated blog content for '{title}'.</p>"

# Output JSON for Laravel
print(json.dumps({"content": content}))
