document.addEventListener('DOMContentLoaded', () => {
    const menu = document.querySelectorAll('.sidenav-menu');
    M.Sidenav.init(menu, {edge: 'right'});
});