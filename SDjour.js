fetch('https://nominis.cef.fr/web/api/saint/saint-du-jour')
    .then(response => response.json()) // Si la réponse est en JSON, on la transforme
    .then(data => {
        // Afficher les informations du saint du jour
        console.log(data);
        document.getElementById('saint-du-jour').innerText = `Saint du jour: ${data.nom}`;
    })
    .catch(error => {
        console.error('Erreur:', error);
    });
