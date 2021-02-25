
function addToList(idProductAtMarket) {
    var quantity = document.getElementById("quantityId" + idProductAtMarket).value
    var icon = document.getElementById("iconAddList"+idProductAtMarket).src
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var addProd = xmlhttp.responseText;
            if (addProd == '0') {
                $('#iconAddList'+idProductAtMarket).attr("src", "images/check-circle.svg");
                $('#iconAddList'+idProductAtMarket).attr("class", "iconColor");
                
                $('#addProd').show();
                setTimeout(function () {
                    $('#addProd').hide();
                }, 1000);
            }
            else if(addProd == '2'){
                $('#prodNoLoggedModal').modal('show');
            }
        else {
            $('#iconAddList'+idProductAtMarket).attr("src", "images/x-circle.svg");
            $('#iconAddList'+idProductAtMarket).attr("class", "iconColor");
           
            setTimeout(function () { $('#iconAddList'+idProductAtMarket).attr("src", icon)},3000); 
                $('#prodNoAdd').show();
                setTimeout(function () {
                    $('#prodNoAdd').hide();
                }, 1000);
            }
        }
    }
    xmlhttp.open("GET", "https://spesaconveniente.altervista.org/utility/add-to-list.php?productMarketId=" + idProductAtMarket + "&quantity=" + quantity, true); 
    xmlhttp.send();


}


function removeFromList() {
    var boxes = document.getElementsByClassName('chkbox');
    var count = 0;
    for (var i = 0; i < boxes.length; i++) {
        box = boxes[i];
        if (box.checked) {
            count += 1;
        }
    }
    var deleted = 0;
    for (var i = 0; i < boxes.length; i++) {
        box = boxes[i];
        listId = box.value;
        if (box.checked) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    deleted += 1;
                    if (deleted == count){
                        window.location.reload();
                    }
                }
            }
            xmlhttp.open("GET", "https://spesaconveniente.altervista.org/utility/removeFromList.php?listId=" + listId, true);
            xmlhttp.send();
        }
    }
}


$(document).ready(function () {
$('#addProd').hide();
$('#addProd').hide();

var location = document.getElementById("position").value;
if (location==""){
    $('#geoModal').modal('show');
}
});