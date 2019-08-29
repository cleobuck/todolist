
// changement de statut par rapport à la checkbox

let archiveToggle = (event) => {
    let formData = new FormData();
    formData.append('tache', event.name);
    formData.append('checked1',event.checked)

    fetch('formulaire.php',{
        method:'post',
        body:formData
    }).then(data => data.text())
    .then(data => console.log(data))
    .catch(err => console.log(err))


    if(event.checked)
        event.setAttribute('disabled', '');
        document.getElementById('archive').appendChild(event.parentElement)
}

// // drag & drop

// const afaire = document.getElementById("afaire");

  