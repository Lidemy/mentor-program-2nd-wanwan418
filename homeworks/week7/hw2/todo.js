var item = document.getElementById("todoInput");
var items = document.querySelectorAll("#todoList li"),
    tab = [], index;


//get the selected in index using array
//populate array with li values

for(var i =0; i < items.length; i++) {
  tab.push(items[i].innerHTML);
}

//get li index onclick

for(var i =0; i < items.length; i++) {
  items[i].onclick = function(){
    index = tab.indexOf(this.innerHTML);
    console.log(this.innerHTML + " INDEX = " + index);
    // set the selected li into input text
    todoInput.value = this.innerHTML;
  };
}

function refreshArray(){
  //clear array
  tab.length = 0;
  items = document.querySelectorAll("#todoList li");

  //fill array
  for(var i = 0; i < items.length; i++) {
    tab.push(items[i].innerHTML);
  }

}

function todoList() {
  var item = document.getElementById("todoList")
  var text = document.createTextNode(todoInput.value);
  var newItem = document.createElement("li");
  newItem.appendChild(text);
  item.appendChild(newItem);
  document.getElementById("todoList").appendChild(newItem)

  refreshArray();
  //add event to the new li

  newItem.onclick = function(){
    index = tab.indexOf(newItem.innerHTML);
    console.log(newItem.innerHTML + " INDEX = " + index);
    //set the selected li value into input text
    todoInput.value = newItem.innerHTML;
  }
}

function editB() {
  //edit the selected li using 
  items[index].innerHTML = item.value;
  refreshArray();
}

function deleteB(){

  refreshArray();
  if(items.length > 0){
    items[index].parentNode.removeChild(items[index]);
    item.value = "";
  }
}