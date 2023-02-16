document.getElementById("add").addEventListener("click", addUser)

function addUser (){
    const name = document.querySelector("input").value

    let options = {
        method: 'POST',
        headers: "Content-Type: application/json",
        body: {name}
    } 

    fetch("./post.php", options)
    .then(r => {
        if (r.ok){
           return r.json
        } else {
            document.getElementById("error").textContent = r.statusText
            return
        }
        })
    .then(r => {
        let div = document.querySelector("#current > div")
        div.textContent = ""
        r.forEach(element => {
            div.append(element)
        });
    })
}