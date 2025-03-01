const Theme = {
    DARK: "dark",
    LIGHT: "light"
};

let CurrentTheme = Theme.DARK;
const ThemeButton = document.getElementById('themeBtn');

const switchTheme = () => {
    setTheme(CurrentTheme == Theme.DARK ? Theme.LIGHT : Theme.DARK);
}

const setTheme = t => {
    CurrentTheme = t;
    document.documentElement.className = CurrentTheme;
    document.documentElement.setAttribute("data-bs-theme", CurrentTheme);

    ThemeButton.classList = `fa-solid ${CurrentTheme == Theme.DARK ? "fa-moon" : "fa-sun"}`;
}

window.onload = () => {
    setTheme(CurrentTheme);
    setTimeout(() => {
        document.getElementById("fadein").remove();
    });
};