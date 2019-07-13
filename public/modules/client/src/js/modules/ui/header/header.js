import anime from 'animejs';

let startAnimSVG = function () {
    anime({
      targets: '#first_line',
      translateX: 165
    });
    anime({
      targets: '#third_line',
      translateX: 95
    });
};

let reverseAnimSVG = function () {
    anime({
      targets: '#first_line',
      translateX: 0
    });
    anime({
      targets: '#third_line',
      translateX: 0
    });
}
export {
    startAnimSVG, reverseAnimSVG
}