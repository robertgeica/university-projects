const Pom = require("../models/Pom");

// @route         Get /api/livada
// @description   Get pom
// @access        Public
const getPom = async (req, res) => {
  try {
    const pomi = await Pom.find();

    // res.status(200).send(pomi);
    res.render('index', { data: pomi})
  } catch (error) {
    console.log(error)
    res.status(400).send("A fost intampinata o eroare la interogare.");
  }
};

// @route         POST /api/livada
// @description   Create pom
// @access        Public
const createPom = async (req, res) => {
  try {
    const pom = new Pom({
      ...req.body,
    });

    await pom.save();
    res.redirect('livada')
    
  } catch (error) {
    res.status(400).send("A fost intampinata o eroare la adaugarea pomului.");
  }
};

// @route         DELETE /api/livada/:id
// @description   Delete pom
// @access        Public
const deletePom = async (req, res) => {
  try {
    let id = await req.params.id;

    const pom = await Pom.findByIdAndDelete({ _id: id });
    
    res.status(200).send("Pomul a fost sters cu success.");
  } catch (error) {
    res.status(400).send('Am intampinat o eroare la stergerea pomului.');
    
  }
};

// @route         PATCH /api/livada/:id
// @description   Update pom
// @access        Public
const updatePom = async (req, res) => {
  try {
    let pom = await Pom.findById(req.params.id);

    if (!pom) res.status(404).send('Pomul nu a fost gasit.');
    pom.nume_pom = req.body.nume_pom;    
    pom.soi_pom = req.body.soi_pom;
    pom.perioada_insamantare = req.body.perioada_insamantare;
    pom.perioada_coacere = req.body.perioada_coacere;
    pom.inaltime_maturitate = req.body.inaltime_maturitate;
    pom.distanta_plantare = req.body.distanta_plantare;
    pom.rezistenta_inghet = req.body.rezistenta_inghet;
    pom.productivitate = req.body.productivitate;
    pom.pret = req.body.pret;

    
    await pom.save();
    res.status(200).send("Pomul a fost editat cu success.");
  } catch (error) {
    res.status(400).send('Eroare la editarea pomului');
  }
};

module.exports = {
  getPom,
  createPom,
  updatePom,
  deletePom,
};
