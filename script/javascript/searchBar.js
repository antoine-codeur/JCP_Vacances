document.getElementById('search-button').addEventListener('click', function() {
    const searchTerm = document.getElementById('search-input').value;
    fetchSearchResults(searchTerm);
});

document.getElementById('search-input').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        const searchTerm = e.target.value;
        fetchSearchResults(searchTerm);
    }
});

function fetchSearchResults(query) {
    // Remplacez '/search' par votre endpoint API
    fetch(`/search?q=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            // Traitez les données de la recherche ici
            console.log(data);
        })
        .catch(error => console.error('Error:', error));
}
