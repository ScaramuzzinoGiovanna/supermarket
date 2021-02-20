
function addToList(idProductAtMarket){
    var quantity = document.getElementById("quantityId"+idProductAtMarket).value
    console.log(quantity);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "utility/add-to-list.php?productMarketId=" + idProductAtMarket + "&quantity=" + quantity, true);
    xmlhttp.send();
    $('#alert').show('medium');
}


function removeFromList(){
    var boxes = document.getElementsByClassName('chkbox');
    for(var i = 0; i<boxes.length; i++){
        box = boxes[i];
        listId = box.value;
        if(box.checked){
            console.log("rimuovo elemento "+listId)
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "utility/removeFromList.php?listId=" + listId, true);
            xmlhttp.send();
        }
    }
    window.location.reload(); 
}

