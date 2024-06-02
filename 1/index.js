const mailBtn = document.querySelector("#mailCheckBtn");
const domainBtn = document.querySelector("#domainCheckBtn");

mailBtn.addEventListener('click', e => {
    const email = document.querySelector("#email").value;
    const mailResult = document.querySelector("#mailResult");
    mailResult.innerText = 'Loading....';
    const URL = `https://api.hunter.io/v2/email-verifier?email=${email}&api_key=8d9ccf126dc5c9870e38819f18be097015a400a9`;

    // console.log(fetch(URL).then(res => { return res }));
    fetch(URL)
        .then((res) => {
            // console.log("This is from 1st then():", res);
            if(res.ok){
                return res.json();
            }
            throw new Error('Whoops! Something went wrong!');
        })
        .then(data => {
            console.log(data.data);
            // const result = data.data;
            mailResult.innerText = `${data.data.status}  -  ${data.data.result}`;
        }).catch(err => {
            console.log('this is from catch():', err);
        });

        // useFetch(URL, firstEventListenerFn);
});

domainBtn.addEventListener("click", (e) => {
    const domain = document.querySelector("#domain").value;
    const URL = `https://api.hunter.io/v2/domain-search?domain=${domain}&api_key=8d9ccf126dc5c9870e38819f18be097015a400a9`;

    fetch(URL)
    .then((res) => {
        // console.log("This is from 1st then():", res);
        if (res.ok) {
            return res.json();
        }
        throw new Error("Whoops! Something went wrong!");
    })
    .then((data) => {
        console.log(data.data.emails);
        const emails = data.data.emails;

        emails.forEach(email => {
            console.log(email.value);
        })
    })
    .catch((err) => {
        console.log("this is from catch():", err);
    });

    // useFetch(URL, secondEventListenerFn);
});


//EXAMPLE FOR MAKING THE FETCH AS A FLEXIBLE FUNCTION

// function useFetch(URL, cb){
//     fetch(URL)
//         .then((res) => {
//             // console.log("This is from 1st then():", res);
//             if (res.ok) {
//                 return res.json();
//             }
//             throw new Error("Whoops! Something went wrong!");
//         })
//         .then((data) => {
//            cb();
//         })
//         .catch((err) => {
//             console.log("this is from catch():", err);
//         });
// }

// function firstEventListenerFn(){
//        console.log(data.data);
//             // const result = data.data;
//             mailResult.innerText = `${data.data.status}  -  ${data.data.result}`;
// }

// function secondEventListenerFn() {
//      console.log(data.data.emails);
//      const emails = data.data.emails;

//      emails.forEach((email) => {
//          console.log(email.value);
//      });
// }
