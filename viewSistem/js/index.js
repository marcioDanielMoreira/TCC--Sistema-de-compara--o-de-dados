$('.toggle').on('click', function() {
  $('.container').stop().addClass('active');
});

$('.close').on('click', function() {
  $('.container').stop().removeClass('active');
});

document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};


$(document).ready(function() {
    $(window).load(function() {
        $('.loader').fadeOut('slow'); //retire o delay quando for copiar!
    $('#tudo_page').toggle('fast');
    });
});