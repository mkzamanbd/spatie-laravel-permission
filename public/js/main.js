// aside layer
var asideLayer = document.getElementById("aside-layer");
var html = document.querySelector("html");
asideLayer.addEventListener("click", function(){
    document.querySelector("aside").classList.remove("aside-hide");
    asideLayer.classList.remove("aside-layer-active");
    html.classList.remove("html-overflow-lg")
});
// aside active function
function asideActive(){
    document.querySelector("aside").classList.toggle("aside-hide");
    document.querySelector(".mainbar").classList.toggle("mainbar-expand");
    asideLayer.classList.toggle("aside-layer-active");
    html.classList.toggle("html-overflow-lg");
};


// Navber layer
var navberLayer = document.getElementById("navber-layer");
navberLayer.addEventListener("click", function(){
    navberLayer.classList.remove("navber-layer-active");
    document.querySelector(".settings-dropdown").classList.remove("settings-dropdown-active");
    document.querySelector(".user-dropdown").classList.remove("user-dropdown-active");
    document.querySelector(".notifications-dropdown").classList.remove("notifications-dropdown-active");
    document.querySelector(".search-dropdown").classList.remove("search-dropdown-active");
    html.classList.remove("html-overflow");
})


// Search active
function searchActive(){
    document.querySelector(".search-dropdown").classList.toggle("search-dropdown-active");
    navberLayer.classList.add("navber-layer-active");
    html.classList.toggle("html-overflow");
};
// Search inactive
function searchInactive(){
    document.querySelector(".search-dropdown").classList.remove("search-dropdown-active");
    navberLayer.classList.remove("navber-layer-active");
    html.classList.remove("html-overflow");
};


// Notifications active
function notificationsActive(){
    document.querySelector(".notifications-dropdown").classList.toggle("notifications-dropdown-active");
    navberLayer.classList.add("navber-layer-active");
    html.classList.toggle("html-overflow");
};
// Notifications inactive
function notificationsInactive(){
    document.querySelector(".notifications-dropdown").classList.remove("notifications-dropdown-active");
    navberLayer.classList.remove("navber-layer-active");
    html.classList.remove("html-overflow");
};


// Setting active function
function settingActive(){
    document.querySelector(".settings-dropdown").classList.toggle("settings-dropdown-active");
    navberLayer.classList.add("navber-layer-active");
    html.classList.toggle("html-overflow");
};


// User active function
function userActive(){
    document.querySelector(".user-dropdown").classList.toggle("user-dropdown-active");
    navberLayer.classList.add("navber-layer-active");
    html.classList.toggle("html-overflow");
};


// navbar-toggler
var navbarTogglerLayer = document.getElementById("navbar-toggler-layer");
var navbarToggler = document.querySelector(".navbar-toggler");
navbarTogglerLayer.addEventListener("click", function(){
    document.querySelector(".navbar-collapse").classList.remove("show");
    navbarTogglerLayer.classList.remove("navbar-toggler-layer-active");
    navbarToggler.classList.remove("navbar-toggler-z-index");
    html.classList.remove("html-overflow-lg")
})
navbarToggler.addEventListener("click", function(){
    navbarTogglerLayer.classList.toggle("navbar-toggler-layer-active");
    navbarToggler.classList.toggle("navbar-toggler-z-index");
    html.classList.toggle("html-overflow-lg")
});
