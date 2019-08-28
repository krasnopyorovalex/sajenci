export function createMessage(message, className = 'status') {
    let msgBox = document.createElement('div');
    msgBox.innerHTML = message;
    msgBox.className = className;

    return msgBox;
}

export function createMessageErrors(errors, className = 'errors_list') {
    let msgBox = document.createElement('div');
    let html = '<ol>';

    Object.keys(errors).map(function(objectKey) {
        let messages = errors[objectKey];
        for (let j = 0; j < messages.length; j++) {
            html += '<li>' + messages[j] + '</li>';
        }
    });

    html += '</ol>';
    msgBox.innerHTML = html;
    msgBox.className = className;

    return msgBox;
}
