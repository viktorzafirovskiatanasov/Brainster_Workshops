const urlParams = new URLSearchParams(window.location.search);

const ID = urlParams.get("id");

console.log(ID);

const URL = `https://reqres.in/api/users/${ID}`;

fetch(URL)
.then(res => res.json())
.then(data => {
    console.log(data);
    const singleUser = data.data;

    document.querySelector("#fname").innerText = singleUser.first_name;
    document.querySelector("#lname").innerText = singleUser.last_name;
    document.querySelector("#email").innerText = singleUser.email;
    document.querySelector("#avatar").src = singleUser.avatar;

});