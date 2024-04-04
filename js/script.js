let userBox = document.querySelector('.header .flex .account-box');

document.querySelector('#user-btn').onclick = () =>{
    userBox.classList.toggle('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    userBox.classList.remove('active');
}

window.onscroll = () =>{
    userBox.classList.remove('active');
    navbar.classList.remove('active');
}

document.addEventListener('DOMContentLoaded', function() {
    // Ambil data dari local storage saat halaman dimuat
    let name = localStorage.getItem('name');
    let email = localStorage.getItem('email');
    let number = localStorage.getItem('number');
    let message = localStorage.getItem('message');

    // Isi nilai input dengan data dari local storage
    document.querySelector('#name').value = name;
    document.querySelector('#email').value = email;
    document.querySelector('#number').value = number;
    document.querySelector('#message').value = message;
});

// Mengatur fungsi untuk menyimpan data ke local storage saat tombol kirim diklik
document.querySelector('#send').onclick = () =>{
    let name = document.querySelector('#name').value;
    let email = document.querySelector('#email').value;
    let number = document.querySelector('#number').value;
    let message = document.querySelector('#message').value;

    // Simpan data ke local storage
    localStorage.setItem('name', name);
    localStorage.setItem('email', email);
    localStorage.setItem('number', number);
    localStorage.setItem('message', message);
};
