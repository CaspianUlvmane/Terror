document.getElementById("getNew").addEventListener("click", terrorise)
document.getElementById("add").addEventListener("click", addUser);

function renderUsers(array){
    let container = document.querySelector("#users");
    container.textContent = "";

    array.forEach((element) => {
        let div = document.createElement("div");
        let name = document.createElement("div");
        div.classList.add("person");
        let span = document.createElement("div");
        span.classList.add("span")
        span.classList.add("material-symbols-outlined");
        span.textContent = "delete";
        span.addEventListener("click", () => deletePerson(div.firstChild));
        name.append(element.name);
        div.append(name, span)
        container.append(div);
      });

}

function startUp(){
    fetch("get.php?users")
    .then((r) => r.json())
    .then((r) => renderUsers(r))
}



function addUser() {
  const errorDiv = document.getElementById("error");
  errorDiv.textContent = "";
  const name = document.querySelector("input").value;
  if (name.length < 2) {
    errorDiv.textContent = "Enter a name longer than 1 character!";
    return;
  }
  let options = {
    method: "POST",
    header: "Content-Type: application/json",
    body: JSON.stringify({ name }),
  };

  fetch("post.php", options)
    .then((r) => r.json())
    .then((r) => {
      if (r.Error) {
        errorDiv.textContent = r.Error;
        return;
      }
     
      renderUsers(r)
    });
}

function deletePerson(div) {
    let name = div.textContent
    let options = {
        method: "DELETE",
        header: "Content-Type: application/json",
        body: JSON.stringify({ name }),
      };
    
      fetch("delete.php", options)
      .then((r) => r.json())
      .then((r) =>{
        renderUsers(r)
      })
}

async function terrorise(){
  let resource = await (await fetch("get.php?users").then(r => r.json()))
  let nameArray = []
  resource.forEach(e =>{
    for(let i = 0; i < e.notPicked; i++){
      nameArray.push(e.name)
    }

  })
  console.log(nameArray);
  let random = Math.floor(Math.random() * nameArray.length)
  let name = nameArray[random]
  let options = {
    method: "PATCH",
    header: "Content-Type: application/json",
    body: JSON.stringify({ name }),
  };

  fetch("patch.php", options)
  .then(r => {
    if (r.ok){
      return r.json()
    } else {
      return 1
    }
  })
  .then(r => {
    if (r == 1){
      document.getElementById("error").textContent = "Problem with terrorisation, try again!"
    } else{

      document.getElementById("terrorise").textContent = nameArray[random]
    }
  })
}

startUp()