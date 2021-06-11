#YOWP

## YouTube, OBS-Websocket, Windows and PHP Stack
This is a custom PHP-based software stack with an extremely specific use case...
## Tip!
Tap/click the top-ribbon to open the extra OBS settings - It's hidden like that to cut down screen clutter!

## Use case
For mobile streamers who use quicksync/GPU from a mobile laptop (via camera + capture card input) with their phone either connected to the same network, or using the hotspot on their phone. From the webapp you can view OBS-WS information (stream status, bitrate, start/stop streaming, change scene, etc.), YouTube viewer count and chat, and the laptop's battery % (or "plugged in" if using AC power with a portable charger) using Windows' powercfg CMD command.

![Relational Diagram](https://i.imgur.com/Xzcf9nh.png)

## Requirements
* https://github.com/Palakis/obs-websocket/releases/tag/4.9.0 for OBS
* Windows based OS to get the battery info with powercfg
* Lastly, somewhere to install and run the PHP scripts from, I'd recommend XAMPP but any Apache/PHP instance will work

## Setup (XAMPP)
1. Copy all files into new "htdocs/obs-websocket" folder (or call it whatever you want).
2. Set and replace the config file "settings.js" and "scripts/apiKey.php".
3. Run the websocket plugin is running in OBS and apache webserver.
4. Use your phone or local browser and access the webserver location of the index.html file - it should connect to OBS' Websocket automatically (you should see "Video: 1080p60" or something similar, and scenes).
5. You can tell you started streaming for the bitrate will show in the top-left.
6. From there start streaming, when you click the "Refresh" button in the main window next to "No Stream Available" the PHP script will automatically try to fetch current streams from the YouTube API - this normally takes a few minutes after the stream starts, be patient!

## Future Plans
* Add link to the YouTube livestream in the menu.
* Add embedded video on the page.
