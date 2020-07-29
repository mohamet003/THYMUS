$(function(){"use strict";
  var temoin = true
  var a=$(".app-file-overlay"),

    o=$(".sidebar-left"),
    s=$(".app-file-sidebar-info"),
    e=$(".app-file-content"),
    i=$(".app-file-sidebar-left");

  if(0<o.length&&$(".add-file-btn").on("click",function(){

    $(".getfileInput input").click()

  }),

  0<e.length)new PerfectScrollbar(".app-file-content",{
    theme:"dark"

  });

  if(0<i.length)new PerfectScrollbar(".app-file-sidebar-content",{theme:"dark"});
  if(0<s.length)new PerfectScrollbar(".app-file-sidebar-info",{theme:"dark"});

  $(".checc").on('click',function (d) {
    temoin = false
  })

  $(".menu-toggle, .close-icon, .app-file-overlay").on("click",function(e){

    o.removeClass("show"),
      a.removeClass("show"),
      s.removeClass("show")
  }),

    $(".app-file-info").on("click",function(e){
         var link =  $(this).data('link')+"#toolbar=0"
        $("#iframee").attr("src","../../../"+link);
        console.log(link)
        var iframe = document.getElementById("iframee");
        iframe.src = iframe.src;
        if (temoin){
            s.addClass("show"),
            a.addClass("show")
      }
      temoin = true
    }),
    $(".app-file-sidebar-close").on("click",function(){

      o.removeClass("show"),
        a.removeClass("show")}),

    $(".sidebar-toggle").on("click",function(e){

      e.stopPropagation(),
        o.addClass("show"),
        a.addClass("show")
    });

  var l=$(".app-file-sidebar-content .file-manager-drive a");

  $(l).on("click",function(){

    var e=$(this);
    l.removeClass("active"),
      e.addClass("active")}),

    $(window).on("resize",function(){

      768<$(window).width()&&a.hasClass("show")&&(o.removeClass("show"),
        a.removeClass("show"),
        s.removeClass("show"))
    })});

$("#checkAll").click(function(){
    $('input:checkbox').not(this,'.removed').prop('checked', this.checked);
});
