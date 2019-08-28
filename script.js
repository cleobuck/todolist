let archiveToggle = (event) => {
    let formData = new FormData();
    formData.append('tache',event.name);
    formData.append('submit', true);
    formData.append('checked',event.checked)

    fetch('formulaire.php',{
        method:'post',
        body:formData
    }).catch(err => console.log(err))
console.log(event.parentElement)
    if(event.checked)
        document.getElementById('archive').appendChild(event.parentElement)
    else
        document.getElementById('afaire').appendChild(event.parentElement)
}

  