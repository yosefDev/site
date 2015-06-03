<?php ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>floors</title>
</head>
<body>
<div class="header">
    <div class="section">
        <div class="content">
            <div name="galleryA">
                <ul>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="section">
        <div class="content"></div>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function () {

    var gallery = jQuery("[name='galleryA']");
    var elemToSlide = jQuery("[name='galleryA']> ul");
    var elemToslideParent = elemToSlide.parent();
    var elemToSlideChild = elemToSlide.children("li");
    var elemCount = elemToSlideChild.length;

    var liHeight = elemToSlideChild.height();
    var liwidth = elemToSlideChild.width();

    //elemToSlide.css({ width: elemCount * liwidth + "px", height: liHeight + "px" });
    gallery.css({width: liwidth + "px"});
    //elemToSlideChild.css({ width: 100 / elemCount + "%" })

    /*-----------------------------------------------------------------------*/

    jQuery(elemToSlideChild).each(function (index, value) {
        var active = "";
        var classElem = $(this).attr("id");
        if (index == 0) {
            active = "active";
            jQuery(".arrow ul").append('<li class="' + classElem + '"></li>');
        }
        else {
            jQuery(".arrow ul").append('<li class="' + classElem + '"></li>');
        }
    });

    /*-----------------------------------------------------------------------*/
    var currentPressA = "activeBg";
    var beforePressA = "beforeBg";
    //var segment = "movers,cupcakes,pasta,makeup,coffee,gym";
    /*-----------------------------------------------------------------------*/
    var segParam = getParameterByName("seg");

    var parent = $(".gallery").attr("class");
    var activeGallery = $.trim(parent.replace('gallery','').replace('Active',''));
    
    if (segParam) {
        if ($("#" + segParam).length > 0) {
            $(".active").removeClass("active");
            $("#" + segParam).addClass("active");

            $("." + segParam).parent().prepend($("." + segParam).addClass("active"));

        } else {
            $("#"+activeGallery).addClass("active");
            $("."+activeGallery).addClass("active");
        }
    } else {
        $("#"+activeGallery).addClass("active");
        $("."+activeGallery).addClass("active");
    }


    var lastCliced;
    var currentNav = "currentNav";
    var current = "active";
    var currentElem, nextElem, currentElemNav, nextElemNav;

    //inter = setTimeout(function(){slider()}, 6000);
    function slider() {
        $(".gallery").attr("class", "gallery");
        if ($(".before").length > 0) {
            $(".before").removeClass("before");
        }
        currentElemNav = jQuery(".arrow ." + current).addClass("before");
        nextElemNav = jQuery(".arrow ." + current).next();

        if (nextElemNav.length == 0) {
            console.log("inNav");
            jQuery(currentElemNav).parent().children(":first-child").addClass(current);
        }

        currentElemNav.removeClass(current);
        nextElemNav.addClass(current);


        currentElem = jQuery(".gallery-content ." + current).addClass("before");
        nextElem = jQuery(".gallery-content ." + current).next();

        if (nextElem.length == 0) {
            console.log("in");
            jQuery(currentElem).parent().children(":first-child").addClass(current);
        }

        currentElem.removeClass(current);
        nextElem.addClass(current);


        //inter = setTimeout(function(){slider()}, 6000);
    }
    $(".arrow ul li").click(function (elem) {
        $(".gallery").attr("class", "gallery");
        if (!$(this).hasClass(current)) {
            jQuery("." + current).removeClass(current);
            if ($(".before").length > 0) {
                $(".before").removeClass("before");
            }
            $("#" + $(this).attr("class")).addClass(current);
            $(this).addClass(current);

        }
        //clearInterval(inter)
        //inter = setTimeout(function(){slider()}, 6000);
    });
    $(".gallery-content li").click(function () {
        slider();
    });
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

});








    </script>
</body>
</html>