import {printUsers} from './printUsers.js'

let todos = [];

const details = document.querySelector('#details');

fetch("https://jsonplaceholder.typicode.com/users")
.then(res => res.json())
.then(data => {
    // console.log(data);
    printUsers(data);
});

fetch("https://jsonplaceholder.typicode.com/todos")
    .then((res) => res.json())
    .then((data) => {
        // console.log(data)
        todos = data;
        // console.log(todos)
        let users = document.querySelectorAll(".user");
        // console.log(users)
        users.forEach((user) => {
            user.addEventListener("click", (e) => {
                console.dir(e.target.dataset.id);
                const userId = e.target.dataset.id;
                const filteredTodos = todos.filter((todo) => userId == todo.userId);
                details.innerHTML = '';
                filteredTodos.forEach(filteredTodo => {
                    console.log(filteredTodo);
                    const todoDiv = document.createElement('div');
                    todoDiv.innerText = `${filteredTodo.completed} - ${filteredTodo.title}`;
                    details.appendChild(todoDiv); 
                });
            });
        });
    });

// / {userId: 3, id: 41, title: 'aliquid amet impedit consequatur aspernatur placeat eaque fugiat suscipit', completed: false}
// setTimeout(function(){
//     console.log(todos);
// }, 3000);
