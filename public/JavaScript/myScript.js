const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");

    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";

    }
});


// Inside your myScript.js or a separate JavaScript file
document.addEventListener("DOMContentLoaded", function () {
    const modeToggle = document.querySelector(".toggle-switch");
    const modeText = document.querySelector(".mode-text");
    const switchSpan = document.querySelector(".switch");
    const body = document.body;

    const darkModeEnabled = localStorage.getItem("darkModeEnabled");

    if (darkModeEnabled === "true") {
        body.classList.add("dark-mode");
        modeText.textContent = "Light mode";
        switchSpan.style.transform = "translateX(26px)";
    }

    modeToggle.addEventListener("click", function () {
        body.classList.toggle("dark-mode");
        modeText.textContent = body.classList.contains("dark-mode")
            ? "Light mode"
            : "Dark mode";
        switchSpan.style.transform = body.classList.contains("dark-mode")
            ? "translateX(26px)"
            : "translateX(0)";
        localStorage.setItem("darkModeEnabled", body.classList.contains("dark-mode"));
    });
});

