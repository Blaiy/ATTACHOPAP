<?php
include 'connect.php';

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM cv_details WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $about = $row["about"];
        $skills = $row["skills"];
        $hobbies_interests = $row["hobbies_interests"];
        $projects = $row["projects"];
        $aspirations = $row["aspirations"];
        $phone_number = $row["phone_number"];
        $email = $row["email"];
        $linkedin = $row["linkedin"];
    }
}
?>
<html>

<head>
<title>View CV</title>
<link rel="icon" href="img/jobsConnect.svg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Share+Tech|Share+Tech+Mono" rel="stylesheet" />
    <style>
        body {
    margin: 0;
    font-family: 'Share Tech', sans-serif;
    font-size:16px;
    color: #505050;
    background:#eee;
    overflow-x:hidden;
}

main {
    position:relative;
    padding:7vh 0 10vh;
    opacity:0;
    margin-top:-5px;
}

@media all and (min-width:670px) {
    main { 
        width: 570px;
        margin-left: 10vw;
    }
}

@media all and (max-width:670px) {
    main { margin:0 15px }
}

.wave {
    width:100vw;
    height:150px;
    position:fixed;
    bottom:0;
    fill:#1b7477;
    z-index:-1;
}

#one {
    height:180px;
    fill:#8adbd3;
    width:120vw;
    left:-10vw;
}

h1, h2 {
    position:relative;
    display:flex;
    align-items:center;
    font-family:'Share Tech Mono', monospace;
    line-height: 1em;
    word-spacing:-.1em;
    letter-spacing:-.05em;
    transition:.2s all ease;
    margin-left:10px;
    margin-bottom:15px;
}

h1 span, h2 span { 
    background:rgba(238,238,238,.7);
    padding:5px 7px;
    border-radius:10px;
    box-sizing:border-box;
}
h1, h2:active { color:#51b5ac; }
h1 { font-size:2.2em }
h2 { cursor:pointer }
p:first-child { margin-top:0 }
p:last-child { margin-bottom:0 }

.subtext {
    position:relative;
    border-radius:10px;
    background: white;
    border:1px solid;
    padding:13px;
    line-height:1.5em;
}

.subtext:not(#main) {
    display:none;
}

.subtext ul { margin:0; padding:0 25px; }

.subtext a { 
    color:#0a9; 
    text-decoration:underline;
    cursor:pointer;
    transition:.2s all ease;
}

.subtext a:hover, h2:hover {
    color:#777;
}

.subtext:before {
    content:'';
    position:absolute;
    width:1px;
    background:#bbb;
    left:1.2em;
    height:1.2em;
    top:calc(-1.2em - 1px);
}

.subtext.coll:before {
    left:1em;
    height:1.2em;
    top:calc(-1.2em - 1px);
}

.hex:hover {
    transform:rotate(30deg);
}

.hex, .hex:before, .hex:after {
    height:1em;
    width:.59em;
    border:solid;
    border-width:1px 0;
    border-radius:2px;
    box-sizing:border-box;
}

main .hex { 
    position:relative;
    display:inline-block;
    margin-right:.5em;
    transition:.4s all ease;
}

.hex:before, .hex:after {
    content:'';
    position:absolute;
    margin-top:-1px;
    /*margin-left:;*/
/*     color:#ccc; */
}

.hex:before { transform:rotate(60deg); }
.hex:after { transform:rotate(-60deg); }

.hex, .hex:before, .hex:after, .subtext {
    border-color:#bbb;
}

.hex.moved {
    transform:rotate(30deg);
}

#hex-holder {
    position:fixed;
    height:100vh;
    width:100vw;
    top:0;
    z-index:-1;
    pointer-events:none;
    font-size:60px;
}

#hex-holder .hex {
    position:fixed;
}

#uno {
    border-radius:4px;
    border:none;
    background:#5b8b8c;
    transform:rotate(-12deg);
    bottom:30vh;
    left:30px;
}

#uno:before, #uno:after {
    margin-top:0;
}

#hex-holder .hex:before, #hex-holder .hex:after {
    border:inherit;
    border-radius:inherit;
    background:inherit;
}

#dos {
    border-color:#1B7477;
    border-radius:3px;
    border-width:5px 0;
    font-size:100px;
    bottom:12vh;
    right:-20px;
    transform:rotate(7deg);
}

#dos:before, #dos:after {
    margin-top:-5px;
}

#tres { display:none }

#bg {
/*     z-index:100; */
    position:fixed;
    top:0;
    height:100vh;
    width:100vw;
    box-sizing:border-box;
    border:5px solid black;
}
    </style>
</head>

<body onload="draw()">
    <canvas id="bg"></canvas>
    <main id="content">
        <h1>
            <div class="hex moved"></div><span>About the Dev</span></h1>
        <div class="subtext" id="main">
            <p><?php echo $about; ?></p>
        </div>
        <h2>
            <div class="hex"></div><span>Skills</span></h2>
        <div class="subtext coll">
        <?php echo $skills; ?>
        </div>
        <h2>
            <div class="hex"></div><span>Hobbies & Interests</span></h2>
        <div class="subtext coll">
        <?php echo $hobbies_interests; ?>
        </div>
        <h2>
            <div class="hex"></div><span>Projects</span></h2>
        <div class="subtext coll">
        <?php echo $projects; ?>
        </div>
        
        <h2>
            <div class="hex"></div><span>Contact Me</span></h2>
        <div class="subtext coll">
            <ul>
                <li>Phone: <?php echo $phone_number; ?></li>
                <li>E-mail: <a><?php echo $email; ?></a></li>
                <li>Linked-In: <a><?php echo $linkedin; ?></a></li>
            </ul>
        </div>
    </main>
    <svg viewBox="0 0 500 150" preserveAspectRatio="none" class="wave" id="one"><path d="M-13.36,88.98 C168.85,182.73 276.72,-73.84 506.31,79.10 L500.00,150.00 L0.00,150.00 Z"></path></svg>
    <svg viewBox="0 0 500 150" preserveAspectRatio="none" class="wave" id="two"><path d="M-13.36,88.98 C168.85,182.73 276.72,-73.84 506.31,79.10 L500.00,150.00 L0.00,150.00 Z"></path></svg>
    <div id="hex-holder">
        <div class="hex" id="uno"></div>
        <div class="hex" id="dos"></div>
        <div class="hex" id="tres"></div>
    </div>

    <script>
        function draw() {
    var canvas = $('canvas')[0];
    if(canvas.getContext) {
        var ctx = canvas.getContext('2d');
        ctx.fillStyle = 'rgb(200, 0, 0)';
        ctx.fillRect(10, 10, 50, 50);
        ctx.fillStyle = 'rgba(0, 0, 200, 0.5)';
        ctx.fillRect(30, 30, 50, 50);
    }
}

$(document).ready(function() {
    $('#content').animate({
        opacity:1,
        marginTop:'0',
    }, 800);
    $('h2').click(function() {
        $(this).next('.subtext').slideToggle('fast');
        $(this).children('.hex').toggleClass('moved');
    })
});
    </script>
</body>

</html>