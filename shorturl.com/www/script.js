function sendLongURL() {

  let formData = new FormData(document.forms.URLForm);

  let xhr = new XMLHttpRequest();

  xhr.open('POST', 'take.php');
  //xhr.responseType = "text";

  xhr.send(formData);

  xhr.onload = function() {
    let response = xhr.response;
    document.getElementById("shortURL").value = response;
  };

  xhr.onprogress = function(event) {
  };

  xhr.onerror = function() {
    alert("Error");
  };
}
