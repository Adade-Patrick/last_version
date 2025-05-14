document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById('dropzone-file');

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];

        // Vérifier la taille du fichier (limite 1 Go)
        const maxSize = 1 * 1024 * 1024 * 1024; // 1 Go en octets
        if (file && file.size > maxSize) {
            alert('Le fichier est trop gros. La taille maximale autorisée est de 1 Go.');
            fileInput.value = ''; // Réinitialiser l'input pour éviter la soumission du fichier trop grand
        }
    });
});
