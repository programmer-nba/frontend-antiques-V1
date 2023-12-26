const express = require("express");
var bodyParser = require('body-parser')
const app = express();
const port = process.env.PORT || 5555;
var NodeWebcam = require( "node-webcam" );
app.use(bodyParser.urlencoded({ extended: false }))
app.use(bodyParser.json())
app.use('/images', express.static('images'));
const util = require('util');
const fs = require("fs");

var options = {
    width: 800,
    height: 600,
    quality: 60,
    frames: 40,
    delay: 1,
    output: "jpeg",
    device: false,
    callbackReturn: "buffer",
    verbose: false
  };
var webcam = NodeWebcam.create(options);

const captureImage = async () => {
    try {
      // Capture an image
      const image = await util.promisify(webcam.capture(`images/test`));

      // Log the path to the captured image
      console.log('Image captured:', image);

      // You can perform further processing with the captured image path
      return { status: 'success', image };
    } catch (error) {
      console.error('Error capturing image:', error);
      return { status: 'error', error: error.message };
    }
  };

app.post('/', async (req, res) => {
    var name = req.body.name;
  await NodeWebcam.capture(`${name}.tmp`, {
    saveShots: false, callbackReturn: "buffer",
    width: 800,
    height: 600,
    quality: 60,
    frames: 40,
    delay:0
}, async function(err, data) {
  // For example use a custom write
  const date = new Date();

	await fs.writeFileSync(`images/${date}/${name}.jpg`, data);
    // Erase temp file created
    try {
        await fs.unlinkSync(`${name}.tmp`);
    } catch (error) {

    }

  res.status(200).json({ message: 'ok' });
});


});

app.listen(port, () => {
    console.log("Starting node.js at port " + port);
});
