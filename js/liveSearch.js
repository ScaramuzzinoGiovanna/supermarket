function showResultMobile() {
  var str = document.getElementById("livesearchMobile").value;
  if (str.length == 0) {
    document.getElementById("livesearchMobile").innerHTML = "";
    $('.autocomplete-items').remove();
    return;
  }
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var arr = JSON.parse(xmlhttp.responseText);
      autocomplete(document.getElementById("livesearchMobile"), arr);
    }
  }
  xmlhttp.open("GET", "https://spesaconveniente.altervista.org/search/livesearch.php?search=" + str, true);
  xmlhttp.send();
}



function showResult() {
  var str = document.getElementById("livesearch").value;
  if (str.length == 0) {
    document.getElementById("livesearch").innerHTML = "";
    $('.autocomplete-items').remove();
    return;
  }
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var arr = JSON.parse(xmlhttp.responseText);
      autocomplete(document.getElementById("livesearch"), arr);
    }
  }
  xmlhttp.open("GET", "https://spesaconveniente.altervista.org/search/livesearch.php?search=" + str, true);
  xmlhttp.send();
}


function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  let focusInput = inp;

  /*execute a function when someone writes in the text field:*/
  var a, b, val = inp.value;

  /*close any already open lists of autocompleted values*/
  closeAllLists();

  if (!val) {
    return false;
  }

  /*create a DIV element that will contain the items (values):*/
  a = document.createElement("DIV");
  a.setAttribute("id", focusInput.id + "autocomplete-list");
  a.setAttribute("class", "autocomplete-items");

  /*append the DIV element as a child of the autocomplete container:*/
  focusInput.parentNode.appendChild(a);

  /*for each item in the array...*/
  for (i = 0; i < arr.length; i++) {
    b = document.createElement("DIV");
    b.style.cssText = 'padding:0;'
    b.innerHTML = "<a href='product_view.php?product=" + arr[i].replace(/ /g, "_") + "'> <div>" + arr[i] + "</div></a>";
    a.appendChild(b);
  }

  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }

  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
    closeAllLists(e.target);
  });

}