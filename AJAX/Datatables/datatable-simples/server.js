const express = require('express');
const bodyParser = require('body-parser')
const Pusher = require('pusher')
const cors = require('cors')

const app = express();

app.use(cors())
app.use(bodyParser.urlencoded({ extended: false }))
app.use(bodyParser.json())

const pusher = new Pusher({
  appId: 'APP ID',
  key: 'APP KEY',
  secret: 'SECRET',
  cluster: 'CLUSTER',
  encrypted: true
});

app.post('/record', (req, res) => {
  console.log(req.body);
  pusher.trigger('records', 'new-record', req.body);
  res.send('Pushed');
})

app.listen(2000, () => console.log('Listening at 2000'));