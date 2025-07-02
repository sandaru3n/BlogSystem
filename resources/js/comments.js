document.addEventListener('DOMContentLoaded', function() {
    const commentForm = document.getElementById('comment-form');
    if (commentForm) {
        commentForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            // AJAX submission logic
        });
    }
});