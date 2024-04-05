const list = document.querySelector('.list-img');
const imgs = list.querySelectorAll('img');
let current = 0;

const changeSlide = () => {
    if(current == imgs.length -1){
        current = 0;
        list.style.transform = `translateX(0px)`;
    } else {
        current++;
        let width = imgs[0].offsetWidth;
        list.style.transform = `translateX(${width * -1 * current}px)`;
    }
}
let handleEventChangeSlide = setInterval(changeSlide, 4000);

const btnRight0 = document.getElementsByClassName('btn-right')[0];
const btnLeft0 = document.getElementsByClassName('btn-left')[0];

btnRight0.addEventListener('click', () => {
    clearInterval(handleEventChangeSlide);
    changeSlide();
    handleEventChangeSlide = setInterval(changeSlide, 4000);
});

btnLeft0.addEventListener('click', () => {
    clearInterval(handleEventChangeSlide);
    if(current == 0){
        current = imgs.length -1;
        let width = imgs[0].offsetWidth;
        list.style.transform = `translateX(${width * -1 * current}px)`;
    } else {
        current--;
        let width = imgs[0].offsetWidth;
        list.style.transform = `translateX(${width * -1 * current}px)`;
    }
    handleEventChangeSlide = setInterval(changeSlide, 4000);
});


function addEventListener(btn, showSanPham, translateX) {
    btn.addEventListener('click', () => {
        showSanPham.style.transform = `translateX(${translateX}px)`;
    });
}

const showSanPham1 = document.querySelectorAll('.list-sanpham')[0];
const btnRight1 = document.getElementsByClassName('btn-right')[1];
const btnLeft1 = document.getElementsByClassName('btn-left')[1];
addEventListener(btnRight1, showSanPham1, -1320);
addEventListener(btnLeft1, showSanPham1, 0);

const showSanPham2 = document.querySelectorAll('.list-sanpham')[1];
const btnRight2 = document.getElementsByClassName('btn-right')[2];
const btnLeft2 = document.getElementsByClassName('btn-left')[2];
addEventListener(btnRight2, showSanPham2, -1320);
addEventListener(btnLeft2, showSanPham2, 0);

const showSanPham3 = document.querySelectorAll('.list-sanpham')[2];
const btnRight3 = document.getElementsByClassName('btn-right')[3];
const btnLeft3 = document.getElementsByClassName('btn-left')[3];
addEventListener(btnRight3, showSanPham3, -1320);
addEventListener(btnLeft3, showSanPham3, 0);
// const list = document.querySelector('.list-img');
// const imgs = list.querySelectorAll('img');
// let current = 0;
// let handleEventChangeSlide = setInterval(changeSlide, 4000);

// function changeSlide(direction = 1) {
//     current = (current + direction + imgs.length) % imgs.length;
//     list.style.transform = `translateX(${-imgs[0].offsetWidth * current}px)`;
// }

// document.querySelectorAll('.btn-right, .btn-left').forEach((btn, idx) => {
//     btn.addEventListener('click', () => {
//         clearInterval(handleEventChangeSlide);
//         changeSlide(btn.classList.contains('btn-right') ? 1 : -1);
//         handleEventChangeSlide = setInterval(changeSlide, 4000);
//     });
// });

// function addEventListenerForProductList(index, translateX) {
//     const showSanPham = document.querySelectorAll('.list-sanpham')[index];
//     const btnRight = document.getElementsByClassName('btn-right')[index + 1];
//     const btnLeft = document.getElementsByClassName('btn-left')[index + 1];
//     btnRight.addEventListener('click', () => showSanPham.style.transform = `translateX(${translateX}px)`);
//     btnLeft.addEventListener('click', () => showSanPham.style.transform = `translateX(0px)`);
// }

// [...Array(3).keys()].forEach(idx => addEventListenerForProductList(idx, -1320));
