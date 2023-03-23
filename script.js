const input = document.getElementById('searchInput');
const liste = document.getElementById('searchResult');
const form = document.getElementById('form');

const main = document.getElementById('main');

input.addEventListener('keyup', async() => {

    const response = await fetch('index.php?find=' + input.value);
    const results = await response.json();
    liste.innerHTML = "";

    for (const result of results) {
        
        const ligne = document.createElement("option");
        ligne.value = result['titre'];
        liste.appendChild(ligne);
    }
})

form.addEventListener('submit', async(e) => {

    e.preventDefault();
    document.location.href = "recherche.php?search=" + input.value;

})