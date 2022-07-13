const mongoose = require("mongoose");

const db = "mongodb://127.0.0.1/livada";

const connectDb = async () => {
  try {
    const conn = await mongoose.connect(db, { });

    console.log(`Database connected: ${conn.connection.host}`);
  } catch (error) {
    console.log(`Error connecting. ${error.message}`);
  }
};

module.exports = connectDb;