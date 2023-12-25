

    var countInput = 15 * 60 * 1000; //settime need to countdown
    var now = 0;                        //settime start
    var x = setInterval(function() 
    {
        now = now + 1000;
        var distance = countInput - now;
        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("count-down-15min").innerHTML = minutes + " phút " + seconds + " giây. ";
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("count-down-15min").innerHTML = "OTP đã hết hiệu lực";
        }
    }, 1000);