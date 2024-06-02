$(document).ready(function(){
    const password = "password";
    let input = $("input");
    // console.log(password.slice(5, 10));
    input.on('keyup', e => {
        // console.log('input value: ', input.val(), 'input value length:', input.val().length);
        // console.log("sliced password: ", password.slice(0, input.val().length));

        const value = input.val();
        const valueLength = input.val().length;
        const slicedPass = password.slice(0, valueLength);

        if (value === slicedPass && value != '') {
            console.log("correct");
            if (valueLength == password.length) {
                $('h3').toggle();
                $("p").text('');
            }
        } else if (value !== slicedPass) {
            console.log("incorrect");
            const message = `Incorrect! Correct letters ${valueLength - 1}`;
            $('p').text(message)
            input.val("");
        }
    });
});