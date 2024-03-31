const list = document.querySelector('.list-img');
const imgs = list.querySelectorAll('img');
let current = 0;
setInterval(function() {
    if(current == imgs.length -1){
        current = 0;
    } else {
        current++;
    }
    let width = imgs[0].offsetWidth;
    list.style.transform = `translateX(${width * -1 * current}px)`;
    // console.log(width);
}, 4000);
