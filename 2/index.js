let btn = document.querySelector("#registerBtn");

btn.addEventListener('click', e => {
    const payload = {
        email: document.querySelector("#email").value,
        password: document.querySelector("#password").value,
    };
    const URL = "https://reqres.in/api/register";
    fetch(URL, 
        { 
            headers: {
                'Content-Type': 'application/json'
            },
            method: "POST", 
            body: JSON.stringify(payload) 
        })
        .then((res) => res.json())
        .then((data) => {
            console.log(data);
            if (data.error) {
                console.log('ERROR!', data.error);
            } else {
                window.location.replace('users.html')
            }
        });
});