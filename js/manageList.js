function addToList(idProductAtMarket) {
    var quantity = document.getElementById("quantityId" + idProductAtMarket).value
    var icon = document.getElementById("iconAddList" + idProductAtMarket).src
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var addProd = xmlhttp.responseText;
            if (addProd == '0') {
                $('#iconAddList' + idProductAtMarket).attr("src", "images/check-circle.svg");
                $('#iconAddList' + idProductAtMarket).attr("class", "iconColor");

                $('#addProd').show();
                setTimeout(function () {
                    $('#addProd').hide();
                }, 1000);
            } else if (addProd == '2') {
                $('#prodNoLoggedModal').modal('show');
            } else {
                $('#iconAddList' + idProductAtMarket).attr("src", "images/x-circle.svg");
                $('#iconAddList' + idProductAtMarket).attr("class", "iconColor");

                setTimeout(function () {
                    $('#iconAddList' + idProductAtMarket).attr("src", icon)
                }, 3000);
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

function selectedfromList(idProductAtMarket) {
    var check = document.getElementById(idProductAtMarket);
    if (check.checked == true) {
        document.getElementById('nameProd' + idProductAtMarket).style.textDecoration = "line-through";
        document.getElementById('nameProd' + idProductAtMarket).style.color = "gray";
    }else{
        document.getElementById('nameProd' + idProductAtMarket).style.textDecoration = "";
        document.getElementById('nameProd' + idProductAtMarket).style.color = "#78c2ad";
    }

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
                    if (deleted == count) {
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
    if (location == "") {
        $('#geoModal').modal('show');
    }
});



$('#filter-material').change(function () {
    var allElements = document.getElementsByClassName("supermarket");
    var selection = this.value;
    if (selection) {
        var li = document.getElementsByClassName(selection);
        for (i = 0; i < allElements.length; i++) {
            allElements[i].style.display = "none";
        }
        for (i = 0; i < li.length; i++) {
            li[i].style.display = "";
        }
    } else {
        for (i = 0; i < allElements.length; i++) {
            allElements[i].style.display = "";
        }
    }

});