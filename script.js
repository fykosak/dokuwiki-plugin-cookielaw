window.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.cookielaw-banner button').forEach((el) => {
        el.addEventListener('click', () => {
            const date = new Date();
            date.setFullYear(date.getFullYear() + 10);
            document.cookie = 'cookielaw=1; path=/; expires=' + date.toUTCString();
            document.querySelector('.cookielaw-banner').remove();
        })
    });
});
