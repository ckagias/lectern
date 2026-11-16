// Checks the registration and login forms when they are sent, then again while the user fixes a wrong field. The rules are the same as in the Validator class in PHP.
var form = document.querySelector('form.panel');
var fields = form.querySelectorAll('[data-rule]');
var roles = form.querySelectorAll('input[name="role"]');

var rules = {
    username: function (value) {
        return /^[A-Za-z0-9_]{3,30}$/.test(value);
    },
    email: function (value) {
        return value.length <= 100 && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
    },
    password: function (value) {
        return value.length >= 8 && value.length <= 72 && /[A-Za-z]/.test(value) && /[0-9]/.test(value);
    },
    confirm: function (value) {
        return value === document.getElementById('password').value;
    },
    code: function (value) {
        return value.trim() !== '';
    },
    filled: function (value) {
        return value !== '';
    }
};

/**
 * Shows or clears the error under one field.
 *
 * @param {HTMLInputElement} field The field to check, its data-rule names the rule.
 * @returns {boolean} True when the value is fine.
 */
function check(field) {
    var valid = rules[field.dataset.rule](field.value);
    var message = document.getElementById(field.id + '-error');
    if (valid) {
        message.textContent = '';
        field.setAttribute('aria-invalid', 'false');
    } else {
        message.textContent = field.dataset.error;
        field.setAttribute('aria-invalid', 'true');
    }
    return valid;
}

fields.forEach(function (field) {
    field.addEventListener('input', function () {
        if (field.getAttribute('aria-invalid') === 'true') {
            check(field);
        }
        var confirm = document.getElementById('confirm');
        if (field.id === 'password' && confirm !== null && confirm.getAttribute('aria-invalid') === 'true') {
            check(confirm);
        }
    });
});

roles.forEach(function (role) {
    role.addEventListener('change', function () {
        document.getElementById('code-label').textContent = role.dataset.codeLabel;
    });
});

form.addEventListener('submit', function (event) {
    var firstWrong = null;
    fields.forEach(function (field) {
        if (!check(field) && firstWrong === null) {
            firstWrong = field;
        }
    });
    if (firstWrong !== null) {
        event.preventDefault();
        firstWrong.focus();
    }
});
