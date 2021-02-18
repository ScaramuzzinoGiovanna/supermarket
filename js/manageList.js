
function addToList(idProductAtMarket){
    var quantity = document.getElementById("exampleFormControlSelect1").value
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "utility/add-to-list.php?productMarketId=" + idProductAtMarket + "&quantity=" + quantity, true);
    xmlhttp.send();
}


function removeFromList(listId){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "utility/removeFromList.php?listId=" + listId, true);
    xmlhttp.send();
}