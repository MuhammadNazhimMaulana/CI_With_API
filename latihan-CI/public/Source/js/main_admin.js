// Menampilkan Navbar

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

    // Validasi Variabel ada
    if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{

            // Perlihatkan Navbar
            nav.classList.toggle('show')

            // Mengubah Icon
            toggle.classList.toggle('fa-times')

            // Menambahkan pdding ke body
            bodypd.classList.toggle('body-pd')
            
            // Menambahkan padding pada Header
            headerpd.classList.toggle('body-pd')
        })
    }
}

showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

// Link yang sedang Aktif
const linkColor = document.querySelectorAll('.nav__link')

function colorLink(){
    if(linkColor){
        linkColor.forEach(l => l.classList.remove('active'))
        this.classList.add('active')
    }
}

linkColor.forEach(l => l.addEventListener('click', colorLink))