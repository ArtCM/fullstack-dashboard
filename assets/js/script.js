const menuItems = document.querySelectorAll('.dashboard__menu-home, .dashboard__menu-users, .dashboard__menu-leads');
const containers = document.querySelectorAll('.dashboard__home, .dashboard__users, .dashboard__leads-page');


menuItems.forEach((item, index) => {
    item.addEventListener('click', () => {
        containers.forEach(container => {
            container.classList.add('d-none');
        });

        containers[index].classList.remove('d-none');
    });
});