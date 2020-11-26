//send messages to email
$('#sendMail').click(function () {
    if (ValidateEmail($('#email').val(), $('#userName').val(), $('#content').val()) == true) {
        $.post("./pages/email.php", { userName: $('#userName').val(), email: $('#email').val(), content: $('#content').val() }, function (data, status) {
            if (status == "success") {
                if(data == "Your messages have been sent!"){
                    success(data);
                }else if(data == "Please try again!" || "Only can send email every 3 mins"){
                    fail(data);
                }
            }
            $('#userName').val('');
            $('#email').val('');
            $('#content').val('');
            $("#exampleModal").modal('hide');
        })
    }
})

$(document).ready(function () {
    //initiate aos animation
    AOS.init();
    //clear dialogue input
    $('[data-dismiss=modal]').on('click', function (e) {
        var $t = $(this),
            target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

        $(target)
            .find("input,textarea,select")
            .val('')
            .end()
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();
    })
})
//change pages
function changePage(hash) {
    switch (hash) {
        case '/':
            $('.page').hide();
            $('.parallax-window').css("display", "block")
            $('#mainpage').show();
            break;
        case '#home':
            $('.page').hide();
            $('.parallax-window').css("display", "block")
            $('#mainpage').show();
            break;
        case '#about':
            $('#mainpage').hide();
            $('.parallax-window').css("display", "none")
            $.ajax({
                url: "./pages/aboutus.html",
                error: function (err) {
                    console.log(err);
                },
                success: function (reslut) {
                    $('.page').html(reslut).show();
                },
            });
            break;
        case '#photoindex':
            $('#mainpage').hide();
            $('.parallax-window').css("display", "none")
            $.ajax({
                url: "./pages/photoindex.html",
                error: function (err) {
                    console.log(err);
                },
                success: function (reslut) {
                    $('.page').html(reslut).show();
                },
            });
            break;
        case '#contact':
            $('#mainpage').hide();
            $('.parallax-window').css("display", "none")
            $.ajax({
                url: "./pages/contactus.html",
                error: function (err) {
                    console.log(err);
                },
                success: function (reslut) {
                    $('.page').html(reslut).show();
                },
            });
            break;
        case '#picot':
            $('#mainpage').hide();
            $('.parallax-window').css("display", "none")
            $.ajax({
                url: "./pages/picot.php",
                error: function (err) {
                    console.log(err);
                },
                success: function (reslut) {
                    $('.page').html(reslut).show();
                    ;
                },
            });
            break;
        case '#satin':
            $('#mainpage').hide();
            $('.parallax-window').css("display", "none")
            $.ajax({
                url: "./pages/satin.php",
                error: function (err) {
                    console.log(err);
                },
                success: function (reslut) {
                    $('.page').html(reslut).show();
                },
            });
            break;
        case '#grosgrain':
            $('#mainpage').hide();
            $('.parallax-window').css("display", "none")
            $.ajax({
                url: "./pages/grosgrain.php",
                error: function (err) {
                    console.log(err);
                },
                success: function (reslut) {
                    $('.page').html(reslut).show();
                },
            });
            break;
        case '#oganza':
            $('#mainpage').hide();
            $('.parallax-window').css("display", "none")
            $.ajax({
                url: "./pages/oganza.php",
                error: function (err) {
                    console.log(err);
                },
                success: function (reslut) {
                    $('.page').html(reslut).show();
                },
            });
            break;
        case '#velvet':
            $('#mainpage').hide();
            $('.parallax-window').css("display", "none")
            $.ajax({
                url: "./pages/velvet.php",
                error: function (err) {
                    console.log(err);
                },
                success: function (reslut) {
                    $('.page').html(reslut).show();
                },
            });
            break;
        case '#metallic':
            $('#mainpage').hide();
            $('.parallax-window').css("display", "none")
            $.ajax({
                url: "./pages/metallic.php",
                error: function (err) {
                    console.log(err);
                },
                success: function (reslut) {
                    $('.page').html(reslut).show();
                },
            });
            break;
        case '#taffeta':
            $('#mainpage').hide();
            $('.parallax-window').css("display", "none")
            $.ajax({
                url: "./pages/taffeta.php",
                error: function (err) {
                    console.log(err);
                },
                success: function (reslut) {
                    $('.page').html(reslut).show();
                },
            });
            break;


        default:
            $('.parallax-window').css("display", "block")
            $('#mainpage').show();
            $('.page').hide();
    }
}
//to detect hashtag event
changePage(location.hash);
window.addEventListener("hashchange", function () {
    changePage(location.hash);
});
//use sweetalert
function alertEmail() {
    Swal.fire(
        "Warning", //title
        "You have entered an invalid email address!", //content
        "error" //success/info/warning/error/question
        // icon from https://sweetalert2.github.io/#icons
    );
}
function alertName() {
    Swal.fire(
        "Warning", 
        "You should enter your name!", 
        "error" 
    );
}
function alertContent() {
    Swal.fire(
        "Warning", 
        "You should enter your requirement!", 
        "error"
    );
}
function success(data) {
    Swal.fire(
        "Success!", 
        data, 
        "success" 
    );
}
function fail(data){
    Swal.fire(
        "warning!", 
        data, 
        "error"
    );
}

//to test the email's norm
function ValidateEmail(email, name, content) {
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!email.match(mailformat)) {
        //alert("You have entered an invalid email address");
        alertEmail();
        return false;
    } else if (name == "") {
        //alert("You should enter your name");
        alertName();
        return false;
    } else if (content == "") {
        //alert("You should enter your requirement");
        alertContent();
        return false;
    } else {
        return true;
    }
}

//when change different products to zoom in
function changePic(imgID,zoom){
    var img, glass, w, h, bw;
    img = document.getElementById(imgID);
    glass = document.getElementById("img-magnifier-glass");
    /*set background properties for the magnifier glass:*/
    glass.style.backgroundImage = "url('" + img.src + "')";
    glass.style.backgroundRepeat = "no-repeat";
    glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
    bw = 3;
    w = glass.offsetWidth / 2;
    h = glass.offsetHeight / 2;
    /*execute a function when someone moves the magnifier glass over the image:*/
    glass.addEventListener("mousemove", moveMagnifier);
    img.addEventListener("mousemove", moveMagnifier);
    /*and also for touch screens:*/
    glass.addEventListener("touchmove", moveMagnifier);
    img.addEventListener("touchmove", moveMagnifier);
    function moveMagnifier(e) {
        var pos, x, y;
        /*prevent any other actions that may occur when moving over the image*/
        e.preventDefault();
        /*get the cursor's x and y positions:*/
        pos = getCursorPos(e);
        x = pos.x;
        y = pos.y;
        /*prevent the magnifier glass from being positioned outside the image:*/
        if (x > img.width - (w / zoom)) { x = img.width - (w / zoom); }
        if (x < w / zoom) { x = w / zoom; }
        if (y > img.height - (h / zoom)) { y = img.height - (h / zoom); }
        if (y < h / zoom) { y = h / zoom; }
        /*set the position of the magnifier glass:*/
        glass.style.left = (x - w) + "px";
        glass.style.top = (y - h) + "px";
        /*display what the magnifier glass "sees":*/
        glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
    }
    function getCursorPos(e) {
        var a, x = 0, y = 0;
        e = e || window.event;
        /*get the x and y positions of the image:*/
        a = img.getBoundingClientRect();
        /*calculate the cursor's x and y coordinates, relative to the image:*/
        x = e.pageX - a.left;
        y = e.pageY - a.top;
        /*consider any page scrolling:*/
        x = x - window.pageXOffset;
        y = y - window.pageYOffset;
        return { x: x, y: y };
    }


}
//create a magnifer
function magnify(imgID) {
    var img, glass, w, h, bw;
    img = document.getElementById(imgID);
    /*create magnifier glass:*/
    glass = document.createElement("DIV");
    glass.setAttribute("class", "img-magnifier-glass");
    //*set id
    glass.setAttribute("id", "img-magnifier-glass");
    /*insert magnifier glass:*/
    img.parentElement.insertBefore(glass, img);
}
