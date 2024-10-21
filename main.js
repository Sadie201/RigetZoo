// Dark mode / light mode code:
 function setThemeFromLocalStorage() {
    //Gets the id 'theme' from the header in the CSS import
    var theme = document.getElementById('theme');
    var themeValue = localStorage.getItem('theme');
    //If the users theme is dark then
    if (themeValue === 'dark') {
        //Activate the darkmode.css file
        theme.setAttribute('href', 'darkmode.css');
    } else {
        //Otherwise activate or keep the theme to light 
        theme.setAttribute('href', 'lightmode.css');
    }
}

//Activites the dark mode / light mode
function changeCSS() {
    //The id theme is in the header and is determined to see what the users theme is currently
    var theme = document.getElementById('theme');
    //If the theme is lightmode
    if (theme.getAttribute('href') === 'lightmode.css') {
        //Change the lightmode.css to darkmode.css
        theme.setAttribute('href', 'darkmode.css');
        //Keep the theme dark throughout all pages. 
        localStorage.setItem('theme', 'dark');
 
    } else {
        //Otherwise change the darkmode.css to lightmode
        theme.setAttribute('href', 'lightmode.css');
        //Keep the theme light for all pages. 
        localStorage.setItem('theme', 'light');
    }
}

setThemeFromLocalStorage();


//Font size 
function SetFontSize() {
    //Will check the users font size from the localstorage
    var fontSize = localStorage.getItem('fontSize');
    if (fontSize) {
        //Applies the font size 
        document.body.style.fontSize = fontSize;
    }
}
//This will trigger when the page loads
window.addEventListener('load', SetFontSize);
//This function contains the font size that the user picks
function changeFontSize(fontSize) {
    //Applies the font size that the user chose
    document.body.style.fontSize = fontSize;
    //Sets the font size to the users prefrence and keeps it throughout the pages
    localStorage.setItem('fontSize', fontSize);
}