const usersWrapper = document.querySelector("#usersWrapper");
const nextBtn = document.querySelector("#next");
let pageNumber = 1;

fetchAndShowUsers(pageNumber);

nextBtn.addEventListener('click', e => {
    usersWrapper.innerHTML = '';
    if(pageNumber == 1){
        pageNumber = 2;
    } else if ((pageNumber == 2)){
         pageNumber = 1;
    };
    fetchAndShowUsers(pageNumber);
});


function fetchAndShowUsers(pageNumber){
    fetch(`https://reqres.in/api/users?page=${pageNumber}`)
        .then((res) => res.json())
        .then((data) => {
            const users = data.data;
            console.log(users);
            users.forEach((user) => {
                const userDiv = document.createElement("div");
                const userAnchor = document.createElement("a");
                userAnchor.innerText = `${user.id} - ${user.email}`;
                userAnchor.href = `user.html?id=${user.id}`;
                userDiv.appendChild(userAnchor);
                usersWrapper.appendChild(userDiv);
            });
        });
}


// {id: 7, email: 'michael.lawson@reqres.in', first_name: 'Michael', last_name: 'Lawson', avatar: 'https://reqres.in/img/faces/7-image.jpg'}


// https://reqres.in/api/users/1123