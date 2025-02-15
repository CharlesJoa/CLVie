const express = require('express');
const fetch = require('node-fetch');
const cors = require('cors');

const app = express();
app.use(cors());

app.get('/saint-du-jour', async (req, res) => {
    try {
        const response = await fetch('https://nominis.cef.fr/web/api/saint/saint-du-jour');
        const data = await response.json();
        res.json(data);
    } catch (error) {
        res.status(500).json({ error: 'Erreur lors de la récupération des données' });
    }
});

app.listen(3000, () => console.log('Serveur proxy en écoute sur http://localhost:3000'));
