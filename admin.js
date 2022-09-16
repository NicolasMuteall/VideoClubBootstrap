let admin = document.getElementById('admin');
let login = document.getElementById('login');
let retour = document.getElementById('retour');

admin.addEventListener('click',function(){
    if(getComputedStyle(login).display != "none"){
        login.style.display = "none";
    } else {
        login.style.display = "block";
    }
})

retour.addEventListener('click',function(){
    login.style.display = "none";
})