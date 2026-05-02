#!/bin/bash
# Push script for RCS True Facilities website
# Run this from the rcsoriginal directory with your GitHub credentials

cd "$(dirname "$0")"

echo "Pushing to GitHub..."
git push origin main

if [ $? -eq 0 ]; then
    echo "✅ Successfully pushed to GitHub!"
else
    echo "❌ Push failed. You may need to authenticate."
    echo "Try running: git push origin main"
    echo "Or set up SSH keys / Personal Access Token"
fi
