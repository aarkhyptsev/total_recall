// get start button object
const button = document.querySelector('.btnBookID');
// get $book_id as users attribute
const bookId = button.dataset.bookId;
// get objects popup and close button
const modal = document.querySelector('#myModal');
const close_btn = document.querySelector('#closeModalBtn');

// add listener to close button
close_btn.addEventListener("click", function () {
    modal.style.display = "none";
});
window.addEventListener("click", function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});

// add listener to start button
button.addEventListener('click', async () => {
    try {
        // doing GET-request with fetch
        const response = await fetch(`/?click=${bookId}`);

        // Checked response
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        // if response is true, show message to console
        console.log('GET запрос выполнен успешно');
    } catch (error) {
        // if is error, show message to console
        console.error('There has been a problem with your fetch operation:', error);
    }

    // show popup
    modal.style.display = "block";

});
