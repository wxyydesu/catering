<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UnderConstruction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background-color: black;
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .konten{
            text-align: center;
        }
        marquee{
            color: aqua;
            text-align: center;
            font-size: 3.2rem;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            padding-top: 180px;
        }
        .clock{
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            color: cyan;
            font-size: 60px;
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            letter-spacing: 7px;
        }

    </style>
    
  </head>
  <body>
    <div class="konten">
       <img src="../img/underconstruction.jpg" alt="Under Construction" height="200px">
    </div>
    <div>
        <marquee behavior="" direction="left" >Taylor Swift is The Greatest Singer of All Time!</marquee>
    </div>
    <div><div id="MyClockDisplay" class="clock" onload="showTime()"></div></div>
    <script>
        function showTime(){
            var date = new Date();
            var h = date.getHours(); // 0 - 23
            var m = date.getMinutes(); // 0 - 59
            var s = date.getSeconds(); // 0 - 59
            var session = "AM";
            
            if(h == 0){
                h = 12;
            }
            
            if(h > 12){
                h = h - 12;
                session = "PM";
            }
            
            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;
            
            var time = h + ":" + m + ":" + s + " " + session;
            document.getElementById("MyClockDisplay").innerText = time;
            document.getElementById("MyClockDisplay").textContent = time;
            
            setTimeout(showTime, 1000);
            
        }
        showTime()
    </script>
    