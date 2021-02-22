
function addToList(idProductAtMarket) {
    var quantity = document.getElementById("quantityId" + idProductAtMarket).value
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var addProd = xmlhttp.responseText;
            if (addProd == '0') {
                $('#addProd').show();
                setTimeout(function () {
                    $('#addProd').hide();
                }, 1000);
            }
            else if(addProd == '2'){
                $('#prodNoLoggedModal').modal('show');
            }
        else {
                $('#prodNoAdd').show();
                setTimeout(function () {
                    $('#prodNoAdd').hide();
                }, 1000);
            }
        }
    }
    xmlhttp.open("GET", "utility/add-to-list.php?productMarketId=" + idProductAtMarket + "&quantity=" + quantity, true);
    xmlhttp.send();


}


function removeFromList() {
    var boxes = document.getElementsByClassName('chkbox');
    for (var i = 0; i < boxes.length; i++) {
        box = boxes[i];
        listId = box.value;
        if (box.checked) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "utility/removeFromList.php?listId=" + listId, true);
            xmlhttp.send();
        }
    }
    window.location.reload();
}


$(document).ready(function () {
$('#addProd').hide();
$('#addProd').hide();

var location = document.getElementById("position").value;
if (location==""){
    $('#geoModal').modal('show');
}
});