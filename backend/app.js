const express = require('express');
const app = express();

app.get('/api/data', (req, res) => {
  // Logique de traitement pour obtenir des données
  res.json({ message: 'Données provenant du backend' });
});

// Autres routes et configuration...

const PORT = process.env.PORT || 3001;
app.listen(PORT, () => {
  console.log(`Serveur backend en écoute sur le port ${PORT}`);
});
