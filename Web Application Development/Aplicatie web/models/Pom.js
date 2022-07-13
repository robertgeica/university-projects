const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const PomSchema = new Schema({
  nume_pom: {
    type: String,
    required: true
  },
  soi_pom: {
    type: String,
    required: true
  },
  perioada_insamantare: {
    type: String,
    required: true
  },
  perioada_coacere: {
    type: String,
    required: true
  },
  inaltime_maturitate: {
    type: Number,
    required: true
  },
  distanta_plantare: {
    type: Number,
    required: true
  },
  rezistenta_inghet: {
    type: Number,
    required: true
  },
  productivitate: {
    type: Number,
    required: true
  },
  pret: {
    type: Number,
    required: true
  }
});

module.exports = Pom = mongoose.model('pom', PomSchema);