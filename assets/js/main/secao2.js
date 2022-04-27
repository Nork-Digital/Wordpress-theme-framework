$(".itens-secao-2-home").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  mobileFirst: true,
  arrows: false,
  infinite: false,
  dots: true,
  responsive: [
    {
      breakpoint: 1025,
      settings: "unslick",
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
  ],
});
