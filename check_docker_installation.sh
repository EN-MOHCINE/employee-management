echo "Checking docker installation"
if command -v docker &> /dev/null; then
    echo "Docker installation found"
else
    echo "Docker installation not found. Please install docker."
    exit 1
fi