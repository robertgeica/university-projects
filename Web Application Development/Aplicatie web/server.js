const express = require('express');
const cors = require('cors');
const connectDb = require('./database/database');

const app = express();

// connect database
connectDb();

// apply middlewares
app.use(express.urlencoded({ extended: true}));
app.use(express.json());

// routes
app.use('/api/livada', require('./routes/pomRoutes'));

//setting the path of our views folder  
app.set("views", './views')  
  
//setting the template engine  
app.set('view engine','ejs') 


const PORT = process.env.PORT || 4000;
app.listen(PORT, () => {
    console.log('Server running on port', PORT);
});