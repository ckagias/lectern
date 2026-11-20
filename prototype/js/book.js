// Opens a clicked book in a dialog.
var dialog = document.getElementById('book-dialog');
var books = document.querySelectorAll('.book');

books.forEach(function (book) {
    book.addEventListener('click', function () {
        document.getElementById('book-title').textContent = book.dataset.title;
        document.getElementById('book-author').textContent = book.dataset.author;
        document.getElementById('book-year').textContent = book.dataset.year;
        document.getElementById('book-year-row').hidden = book.dataset.year === '';
        document.getElementById('book-category').textContent = book.dataset.category;
        document.getElementById('book-call').textContent = book.dataset.call;
        document.getElementById('book-summary').textContent = book.dataset.summary;
        // The dialog takes the cloth colour of the clicked book.
        dialog.style.setProperty('--cloth', getComputedStyle(book).getPropertyValue('--cloth'));
        // The page behind must not scroll.
        document.body.classList.add('no-scroll');
        dialog.showModal();
    });
});

document.getElementById('book-close').addEventListener('click', function () {
    dialog.close();
});

// A click outside the book closes it.
dialog.addEventListener('click', function (event) {
    if (event.target === dialog) {
        dialog.close();
    }
});

dialog.addEventListener('close', function () {
    document.body.classList.remove('no-scroll');
});

document.getElementById('book-print').addEventListener('click', function () {
    window.print();
});
