// The category buttons under the shelf: one press shows only the books of that category, a second press shows the first books again.
var shelf = document.getElementById('books');
var shelfBooks = shelf.querySelectorAll('.book');
var categoryButtons = document.querySelectorAll('.category');

categoryButtons.forEach(function (button) {
    button.addEventListener('click', function () {
        var chosen = button.dataset.group;
        var wasPressed = button.getAttribute('aria-pressed') === 'true';

        categoryButtons.forEach(function (other) {
            other.setAttribute('aria-pressed', 'false');
        });

        if (wasPressed) {
            chosen = '';
        } else {
            button.setAttribute('aria-pressed', 'true');
        }

        shelf.classList.add('swapped');
        shelf.classList.toggle('filtered', chosen !== '');
        shelfBooks.forEach(function (book) {
            if (chosen === '') {
                book.hidden = book.dataset.extra === 'yes';
            } else {
                book.hidden = book.dataset.group !== chosen;
            }
        });
    });
});
