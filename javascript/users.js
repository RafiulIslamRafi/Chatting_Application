const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".myFrList");

searchIcon.onclick = ()=>{
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}
function setSession(receiverID){
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "JS_to_Backend/SetSession.php?incoming_id="+receiverID, true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
            document.getElementById("right-top").innerHTML = data;
            // console.log("Works");
        }
    }
  }
  xhr.send(null);
}
searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "JS_to_Backend/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "JS_to_Backend/users.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            usersList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500);

