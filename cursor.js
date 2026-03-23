const cursor = document.querySelector(".cursor");
const titles = document.querySelectorAll("h1, h2");

let mouseX = 0, mouseY = 0;
let posX = 0, posY = 0;

document.addEventListener("mousemove", e => {
    mouseX = e.clientX;
    mouseY = e.clientY;
});

titles.forEach(title => {
    title.addEventListener("mouseenter", () => cursor.classList.add("active"));
    title.addEventListener("mouseleave", () => cursor.classList.remove("active"));
});

document.addEventListener("mouseleave", () => cursor.classList.add("hidden"));
document.addEventListener("mouseenter", () => cursor.classList.remove("hidden"));

function animate() {
    posX += (mouseX - posX) * 0.12;
    posY += (mouseY - posY) * 0.12;
    cursor.style.left = posX + "px";
    cursor.style.top = posY + "px";
    requestAnimationFrame(animate);
}

animate();