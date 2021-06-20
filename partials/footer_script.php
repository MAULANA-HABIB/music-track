<script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
<script>
    let url = window.location.href; 
    let sidebarItems =document.getElementsByClassName('sidebar-menu-item');
    Array.from(sidebarItems).forEach(sidebarItem => {
        if (url == `http://localhost${sidebarItem.getAttribute('href')}`) {
            sidebarItem.classList.add('active');
        }
    });
</script>