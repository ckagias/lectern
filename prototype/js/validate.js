// Checks the registration and login forms while the user types. The rules are the same as in the Validator class in PHP.
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

/** Shows or clears the error under one field and returns true when the value is fine. */
function check(field) {
    var ok = rules[field.dataset.rule](field.value);
    document.getElementById(field.id + '-error').textContent = ok ? '' : field.dataset.error;
    field.setAttribute('aria-invalid', ok ? 'false' : 'true');
    return ok;
}

fields.forEach(function (field) {
    field.addEventListener('blur', function () {
        field.dataset.touched = 'yes';
        check(field);
    });

    field.addEventListener('input', function () {
        if (field.dataset.touched === 'yes') {
            check(field);
        }
        var confirm = document.getElementById('confirm');
        if (field.id === 'password' && confirm !== null && confirm.dataset.touched === 'yes') {
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
        field.dataset.touched = 'yes';
        if (!check(field) && firstWrong === null) {
            firstWrong = field;
        }
    });
    if (firstWrong !== null) {
        event.preventDefault();
        firstWrong.focus();
    }
});
