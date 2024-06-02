export function printUsers(arr){
    const usersDiv = document.querySelector("#users");
    arr.forEach(element => {

        const divElement = document.createElement('div');
        const label = document.createElement('label');

        label.innerText = element.name;
        label.setAttribute("data-id", element.id);
        label.setAttribute("class", 'user');
        label.style.cursor = "pointer";

        divElement.appendChild(label);
        usersDiv.appendChild(divElement);
    })
}

//{id: 1, name: 'Leanne Graham', username: 'Bret', email: 'Sincere@april.biz', address: {…}, …}