const titre = document.querySelector("h1");
const txt = document.querySelector("p");
const bnt = document.querySelector("button");
const imglaptop = document.querySelector(".laptop");
const allitems = document.querySelectorAll("li");

const TL1 = new TimlineMax({ paused: true });

TL1.from(titre, 1, { y: -100, opacity: 0 })
  .from(txt, 1, { opacity: 0 }, "-=0.4")
  .from(btn, 1, { y: -100, opacity: 0 }, "-=0.5")
  .from(imglaptop, 1, { x: 100, opacity: 0 }, "-=0.5");

TL1.play();
