
const express = require("express");
var bodyParser = require('body-parser')

const app = express();
const port = process.env.PORT || 5555;
var NodeWebcam = require("node-webcam");
// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: false }))

// parse application/json
app.use(bodyParser.json())

app.use('/images', express.static('images'));

app.post("/", (req, res) => {
    console.log(req.query.id)
    console.log(req.body)

    var opts = {
        width: 1280,
        height: 720,
        quality: 100,
        frames: 60,
        delay: 0,
        saveShots: true,
        output: "jpeg",
        device: false,
        callbackReturn: "location",
        verbose: false
    };

    var Webcam = NodeWebcam.create(opts);

    Webcam.capture(`images/${req.body.name}`, (err, data) => {
        if (err) {
            console.error(err);
            res.send("eo");
        } else {
            console.log('Image captured:', data);
            res.send("test");
        }
    });

    res.send("test");

});


app.get('/test', (req, res) => res.json({ answer: 42 }));


app.listen(port, () => {
    console.log("Starting node.js at port " + port);
});
