$('.owl-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    // stagePadding:50,
    center:true,
    autoplay:true,
    autoplayHoverPause:true,
    // autoplayTimeout:2000,
    dots:false,
    navText:[
        ' <i class="fa-solid fa-angle-right fa-xl "></i>',
        "<i class='fa-solid fa-chevron-left fa-xl' ></i>"

    ],

    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    },

})


!function ($) {
    $(document).on("click", "ul.nav li.parent > a ", function () {
        $(this).find('em').toggleClass("fa-minus");
    });
    $(".sidebar span.icon").find('em:first').addClass("fa-plus");
}

(window.jQuery);
$(window).on('resize', function () {
    if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
})
$(window).on('resize', function () {
    if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
})


$(document).ready(function () {
    $('#rooms').DataTable();
});


document.addEventListener('DOMContentLoaded', () => {

    let myBtns=document.querySelectorAll('.d');
    myBtns.forEach(function(btn) {

        btn.addEventListener('click', () => {
            myBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        });

    });

});





const input_left = document.getElementById("input_left");
const input_right = document.getElementById("input_right");

const thumb_left = document.querySelector(".slider > .thumb.left");
const thumb_right = document.querySelector(".slider > .thumb.right");
const range = document.querySelector(".slider > .range");

const set_left_value = () => {
    const _this = input_left;
    const [min, max] = [parseInt(_this.min), parseInt(_this.max)];

    _this.value = Math.min(parseInt(_this.value), parseInt(input_right.value) - 1);

    const percent = ((_this.value - min) / (max - min)) * 100;
    thumb_left.style.left = percent + "%";
    range.style.left = percent + "%";
};

const set_right_value = () => {
    const _this = input_right;
    const [min, max] = [parseInt(_this.min), parseInt(_this.max)];

    _this.value = Math.max(parseInt(_this.value), parseInt(input_left.value) + 1);

    const percent = ((_this.value - min) / (max - min)) * 100;
    thumb_right.style.right = 100 - percent + "%";
    range.style.right = 100 - percent + "%";
};

input_left.addEventListener("input", set_left_value);
input_right.addEventListener("input", set_right_value);

function left_slider(value) {
    document.getElementById('left_value').innerHTML = value;
}
function right_slider(value) {
    document.getElementById('right_value').innerHTML = value;
}








///Medicine Details

