window.onload = function() {
    const email = document.getElementById('email__input');
    const password = document.getElementById('password__input');

    const incorrect = document.querySelector('.form__incorrect');
    const incorrectMessage = document.querySelector('.incorrect__message');
    const emptyPassOrEmail = 'A-Ah! Check all fields,';
    const incorrectEmailOrPass = 'Email or password is incorrect.';

    const incorrectEmail = document.querySelector('.form__valid-email');
    const incorrectFormatEmail = 'Incorrect email format. Correct format is ****@**.***';
    const emptyEmail = 'Email is required.';

    const incorrectPassword = document.querySelector('.form__valid-password');
    const emptyPassword = 'Password is required.';

    const sendButton = document.getElementById('button_log-in');

    function isEmailValid() {
        const validSymbEmail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/
        let status = validSymbEmail.test(email.value);
        if (!status) {
            incorrectMessage.innerHTML = emptyPassOrEmail;
            incorrect.style.display = 'block';

            incorrectEmail.innerHTML = incorrectFormatEmail;
            incorrectEmail.style.display = 'inline';
            incorrectEmail.style.color = 'rgb(232, 105, 97)';
        }
        return status;
    }
    // стили добваить в css
    function isEmptyData() {
        let status = false;
        if (!email.value.trim() || !password.value.trim()) {
            incorrectMessage.innerHTML = emptyPassOrEmail;
            incorrect.style.display = 'block';

            if (!email.value.trim()) {
                incorrectEmail.innerHTML = emptyEmail;
                incorrectEmail.style.display = 'inline';
                incorrectEmail.style.color = 'rgb(232, 105, 97)';

            } else {
                if (!isEmailValid) {
                    incorrectEmail.style.color = 'rgb(153, 153, 153)';
                }
            }

            if (!password.value.trim()) {
                incorrectPassword.innerHTML = emptyPassword;
                incorrectPassword.style.display = 'inline';
                incorrectPassword.style.color = 'rgb(232, 105, 97)';
            } else {
                incorrectPassword.style.color = 'rgb(153, 153, 153)';
            }
            status = true;
        }
        return status;
    }

    function isValidData() {
        let status2 = isEmailValid();
        let status1 = isEmptyData();
        if (status2 && !status1) {
            return true;
        }
        return false;
    }

    function notFoundUser() {
        incorrectMessage.innerHTML = incorrectEmailOrPass;
        incorrect.style.display = 'block';
    }

    async function findAdmin() {
        const admin = {
            ['email']: email.value,
            ['password']: password.value
        }
        const adminData = JSON.stringify(admin);
        const response = await fetch('/api/api_login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: adminData
        });

        if (response.ok) {
            if (response.status === 200) {
                window.location.href = 'admin';
            }
        } else {
            if (response.status === 401) {
                notFoundUser();
            }
        }
    }

    function logIn() {
        let status = isValidData();
        if (status) {
            findAdmin();
        }
    }

    function initEventListeners() {
        sendButton.addEventListener("click", logIn);
    }

    initEventListeners();
}