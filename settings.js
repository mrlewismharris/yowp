//the global JS settings for the webapp
//you also need to set the API key in scripts/apiKey.php

const address = "127.0.0.1:4444"; //IP + port of OBS e.g "127.0.0.1:4444"
const pollRate = 1000; //Rate in ms to poll OBS Websocket (streaming, res + fps)
const channelID = ""; //ID of the youtube user (from URL, e.g. "UCRsAEo9tcSqPnPdcgYFCbog"). Need to click the user's username from one of their videos to get this ID in the URL, custom URL won't work.

