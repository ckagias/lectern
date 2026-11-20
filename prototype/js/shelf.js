// Filters the shelf by category. A second press on the same button shows the first books again.
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

        // A second press clears the choice.
        if (wasPressed) {
            chosen = '';
        } else {
            button.setAttribute('aria-pressed', 'true');
        }

        shelf.classList.add('swapped');
        shelf.classList.toggle('filtered', chosen !== '');
        shelfBooks.forEach(function (book) {
            // Without a category the extra books stay hidden.
            if (chosen === '') {
                book.hidden = book.dataset.extra === 'yes';
            } else {
                book.hidden = book.dataset.group !== chosen;
            }
        });
    });
});
