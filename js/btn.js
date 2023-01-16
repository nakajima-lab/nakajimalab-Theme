$(".openbtn").click(function () {//ボタンがクリックされたら 
    $(this).toggleClass('active');//ボタン自身に activeクラスを付与し
    $("#glo-nav-sp").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
    $('body').toggleClass('noscroll');
});

$("#glo-nav-sp a").click(function () {//ナビゲーションのリンクがクリックされたら
    $(".openbtn").removeClass('active');//ボタンの activeクラスを除去し
    $("#glo-nav-sp").removeClass('panelactive');//ナビゲーションのpanelactiveクラスを除去し
    $('body').removeClass('noscroll');
});