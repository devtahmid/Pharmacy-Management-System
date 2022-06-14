var medNameFlag=descriptionFlag=brandFlag=categoryFlag=False;
function checkMedNameDescription(name,id) { //check medicine name, description, and brand
  var nameExp =/^([a-z0-9]+\s)*[a-z0-9]+$/i;
  if (name.length == 0) {
    msg = "";
    flag = false;
  }
  else if (!nameExp.test(name)) {
    msg = "Invalid format";
    color = "red";
    flag = false;
  }
  else {
    msg = "Valid format";
    color = "green";
    flag = true;
  }
  if (id=='medName')
    medNameFlag=flag
  else if (id=='description')
    descriptionFlag=flag;
  document.getElementById(id).style.color = color;
  document.getElementById(id).innerHTML = msg;
}

function checkBrandCategory(text,id) {  //check brand nd category
  var unameExp = /^[a-zA-Z]\w{3,19}$/i;
  if (text.length == 0) {
    msg = "";
    flag = false;
  }
  else if (!unameExp.test(text)) {
    msg = "Invalid format";
    color = "red";
    flag = false;
  }
  else {
    msg = "Valid format";
    color = "green";
    flag = true;
  }
  if (id=='brand')
    brandFlag=flag
  else if (id=='category')
    categoryFlag=flag;
  document.getElementById(id).style.color = color;
  document.getElementById(id).innerHTML = msg;
}

function checkStockCreationInputs(){ return  medNameFlag&&descriptionFlag&&brandFlag&&categoryFlag; }
