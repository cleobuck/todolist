
// drag & drop


// GET ALL THE PLAYERS - DRAGGABLE AND DROP ZONES

const todoDrag = document.querySelectorAll('.todoDrag');
const archive = document.getElementById("archive");
let dragCheck = false;
let draggable;

todoDrag.forEach(elem => {
    elem.addEventListener("dragstart", function (e) {
        e.dataTransfer.setData('text/plain', e.target.id);
            draggable = elem;
        })

    });
// DRAG OVER - PREVENT THE DEFAULT "DROP", SO WE CAN DO OUR OWN
archive.addEventListener("dragover", function (evt) {
evt.preventDefault();
});
archive.addEventListener("drop", function (evt) {
evt.preventDefault();
// Will move the draggable element only if dropped into a different box
if (evt.target != draggable.parentNode && evt.target != draggable) {
    draggable.parentNode.removeChild(draggable);
    evt.target.appendChild(draggable);
    draggable.children[0].setAttribute('checked', "");
    draggable.children[0].setAttribute('disabled', "");

    // send back form 
    let dragForm = new FormData;
    dragForm.append('dragName', draggable.children[0].name);
   
    fetch('formulaire.php',{
        method:'post',
        body:dragForm
    })
    .catch(err => console.log(err))
  
}


});
            
// changement de statut par rapport à la checkbox
      
let archiveToggle = (event) => {
    let formData = new FormData();
    formData.append('tache', event.name);
    formData.append('checked1',event.checked)
 
        

    fetch('formulaire.php',{
        method:'post',
        body:formData
    })
    .catch(err => console.log(err))


    if(event.checked)
        event.setAttribute('disabled', '');
        document.getElementById('archive').appendChild(event.parentElement)
}

