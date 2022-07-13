const express = require("express");
const router = express.Router();
const { getPom, createPom, updatePom, deletePom } = require('../controllers/pomController');

router
  .route('/:id')
  .delete(deletePom)
  .patch(updatePom)

router
  .route('/')
  .get(getPom)
  .post(createPom)


module.exports = router;