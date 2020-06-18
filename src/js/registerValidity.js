userName = document.getElementById('userName');
email = document.getElementById('e-mail');
password = document.getElementById("password");
passwordConfirm = document.getElementById("passwordConfirm");
submit = document.getElementById("submit");

userName.addEventListener("input", function () {
    this.setCustomValidity('');
});
email.addEventListener("input", function () {
    this.setCustomValidity('');
});
password.addEventListener("input", function () {
    this.setCustomValidity('');
});

submit.addEventListener("click", function (e) {
//检测用户名合法性
    let text = userName.value;
    let reg = /^\w{4,12}$/;
    if (!reg.test(text)) {
        userName.setCustomValidity('请输入4-12个字母、数字、_组成的用户名');
        return;
    } else userName.setCustomValidity('');

    //检测用户名重复性
    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            console.log(request.responseText);
            if (request.responseText === 'true') {
                alert('Username valid but repetitive\n' +
                    'Please change it');
                e.preventDefault();
            }
        }
    };
    request.open("GET", "../php/checkUserName.php?name=" + text, true);
    request.send();

    //检测密码强度

    text = password.value;
    reg = /^\w{6,}$/;
    if (!reg.test(text)) {
        password.setCustomValidity('请输入至少6位的密码');
        return;
    } else password.setCustomValidity('');

    //检测密码一致
    if (!(password.value === passwordConfirm.value)) passwordConfirm.setCustomValidity('请确保与密码一致');
    else passwordConfirm.setCustomValidity('');

}, false);

