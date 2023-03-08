<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <script src="index.js" defer></script>
</head>
<body>
    <div class="mainbody">
    <div class="close slider ">
        <div class="profile">
            <img src="profile.jpeg" alt="profileImage" class="image">
            <div class="profileText">
                <p class="text maintext">John Doe</p>
            </div>
        </div>
        <div class="arrow">
            <i class="fa-solid fa-arrow-right-long"></i>
        </div>
        <div class="links">
            <div class="search">
            <i class="fa-solid fa-magnifying-glass icons"></i><input type="search" placeholder = "Search" class="searchbtn">
        </div>

        <a href="/oops.html">
        <div class="dashboard childs">
            <i class="fa-solid fa-house icons"></i><p class="text">Dashboard</p>
        </div></a>
        <div class="notifications childs">
            <i class="fa-solid fa-bell icons"></i><p class="text">Notifications</p>
        </div>
        <div class="messages childs">
            <i class="fa-solid fa-envelope icons"></i><p class="text">Messages</p>
        </div>
        <div class="heart childs">
            <i class="fa-regular fa-heart icons"></i><p class="text">Likes</p>
        </div>
        <div class="coins childs">
            <i class="fa-solid fa-coins icons"></i><p class="text">Money</p>
        </div><hr>
        <div class="logout childs">
            <i class="fa-solid fa-right-from-bracket icons"></i><p class="text">Log Out</p>
        </div>
        <div class="toggle">
            <input type="checkbox" class="checkbox">
            <p class="text" id="toggleText">Dark Mode</p>
        </div>
        </div>
</div>
</div>
</body>
</html>

let arrow = document.querySelectorAll(".arrow")[0];
let slider = document.querySelectorAll(".slider")[0];
arrow.addEventListener("click" , ()=>{
    slider.classList.toggle("close");
});
let togglebtn = document.querySelectorAll(".checkbox")[0];	
let body = document.querySelectorAll(".mainbody")[0];
let search = document.querySelectorAll(".fa-magnifying-glass")[0];
let anchor = document.getElementsByTagName("a")[0];
togglebtn.addEventListener("click" , ()=>{
    body.classList.toggle("dark");
    slider.classList.toggle("middark");
    slider.classList.toggle("color");
    search.classList.toggle("searchcolor");
    anchor.classList.toggle("linkcolor");
});
let bars = document.querySelectorAll(".fa-bars")[0];
bars.addEventListener("click" , ()=>{
    slider.classList.toggle("active");
});






