import { createMessage, createMessageErrors } from "./components/helpers";

document.addEventListener("DOMContentLoaded", () => {

    const formHandler = function (el) {
        let form = document.getElementById(el);

        if (form) {
            form.addEventListener('submit', (event) => {
                event.preventDefault();

                let iAgreeIsChecked = form.querySelector('.i_agree input');
                if (! iAgreeIsChecked.checked) {
                    let msgBox = createMessage('Отметьте, пожалуйста', 'agree_error');
                    form.querySelector('.submit').before(msgBox);
                    setTimeout(() => msgBox.remove(), 2500);
                    return false;
                }

                let submitBtn = form.querySelector('.submit');
                submitBtn.classList.add('is_sent');

                let data = Array.from(
                    new FormData(form),
                    e => e.map(encodeURIComponent).join('=')
                ).join('&');

                const action = form.getAttribute('action');

                return window.axios.post(action, data)
                    .then((response) => {

                        let msgBox = createMessage(response.data.message);
                        form.querySelector('.title').before(msgBox);

                        setTimeout(() => msgBox.remove(), 4500);

                        let popupBox = form.closest('.form_callback-popup');
                        if (popupBox) {
                            setTimeout(() => $(popupBox).fadeOut(), 4500);
                        }

                        form.reset();
                    })
                    .catch((error) => {
                        let errors = error.response.data.errors;

                        let msgBox = createMessageErrors(errors);

                        setTimeout(() => msgBox.remove(), 2500);

                        return submitBtn.after(msgBox);
                    })
                    .finally(() => {
                        return submitBtn.classList.remove('is_sent');
                    });
            });
        }
    };

    formHandler('form_callback');
    formHandler('form_callback-header');
});
