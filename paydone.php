<?php include'Header.php';?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popmotion/4.3.4/popmotion.global.min.js"></script>
    <table class="process">
        <tr>
            <td align="center">
                <div class="loading-icon">
                    <svg class="progress-icon" width="250" height="250" viewBox="0 0 32 32"
                        xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <path id="tick-outline-path"
                                d="M14 28c7.732 0 14-6.268 14-14S21.732 0 14 0 0 6.268 0 14s6.268 14 14 14z"
                                opacity="0" />
                            <path id="tick-path" d="M6.173 16.252l5.722 4.228 9.22-12.69" opacity="0" />
                        </defs>
                        <g class="tick-icon" stroke-width="2" stroke="rgba(63,173,168,1)" fill="none"
                            transform="translate(1, 1)">
                            <use class="tick-outline" xlink:href="#tick-outline-path" />
                            <use class="tick" xlink:href="#tick-path" />
                        </g>
                        <g class="tick-icon" stroke-width="2" stroke="rgba(63,173,168,1)" fill="none"
                            transform="translate(1, 1.2)">
                            <use class="tick-outline" xlink:href="#tick-outline-path" />
                            <use class="tick" xlink:href="#tick-path" />
                        </g>
                    </svg>
                </div>
                <div class="before-payment">
                    Confirming Payment : Wait <span id="seconds">60</span> seconds
                </div>

                <div class="after-payment hidden">
                    Payment Confirmed.<br>
                    <br>

                    <?php
date_default_timezone_set('Asia/Kathmandu');
$date = date("Y-m-d");
//echo $date;
$day = date("D",strtotime($date));

switch($day) {

case "Sun":
$a= strtotime($date."+ 3 days");
$b= strtotime($date."+ 4 days");
$c= strtotime($date."+ 5 days");
break;

case "Mon":
$a= strtotime($date."+ 2 days");
$b= strtotime($date."+ 3 days");
$c= strtotime($date."+ 4 days");
break;

case "Tue":
$a= strtotime($date."+ 1 days");
$b= strtotime($date."+ 2 days");
$c= strtotime($date."+ 3 days");
break;

case "Wed":
$a= strtotime($date."+ 1 days");
$b= strtotime($date."+ 2 days");
$c= strtotime($date."+ 7 days");
break;

case "Thu":
$a= strtotime($date."+ 1 days");
$b= strtotime($date."+ 6 days");
$c= strtotime($date."+ 7 days");
break;

case "Fri":
$a= strtotime($date."+ 5 days");
$b= strtotime($date."+ 6 days");
$c= strtotime($date."+ 7 days");
break;

case "Sat":
$a= strtotime($date."+ 4 days");
$b= strtotime($date."+ 5 days");
$c= strtotime($date."+ 6 days");
break;

}

/* $x= date("l-Y-m-d",$a);
$y= date("l-Y-m-d",$b);
$z= date("l-Y-m-d",$c);
*/

//$x1= $date->format('Y-m-d H:i:s');

$x1 =date("l-m-d-Y", $a);
$y2 = date("l-m-d-Y", $b);
$z3 =date("l-m-d-Y", $c);




echo "<br>";
?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <form method="post" action="payment.php">
                                    Please pick up a collection slot as per convenience

                                    <?php echo"<br>" ?>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="taskoption">
                                        <option value=<?php echo $x1?>><?php echo $x1?></option>
                                        <option value=<?php echo $y2?>><?php echo $y2?></option>
                                        <option value=<?php echo $z3?>><?php echo $z3?></option>
                                    </select>

                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="timeoption">
                                        <option value="10-13"><?php echo "10-13"?></option>
                                        <option value="13-16"><?php echo "13-16"?></option>
                                        <option value="16-19"><?php echo "16-19"?></option>
                                    </select>

                                    <br>
                                    <br>
                                    <button type="done" name="done" class="btn btn-success">Proceed to invoice</button>
                                </form>

                            </div>
            </td>
        </tr>
    </table>


    <style>
    .process {
        position: relative;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.6);
        top: 0px;
        left: 0px;
    }

    .body {
        padding-top: 50px;
    }

    .svg {
        width: 100px;
        display: block;
        margin: 0 auto;
    }

    .progress-icon {
        color: #3fada8;
    }

    .hidden {
        display: none;
    }
    </style>

    <script>
    var x = setInterval(function() {
        document.getElementById('seconds').innerHTML = Math.ceil(document.getElementById('seconds').innerHTML) -
            1;
    }, 1000);








    window.progressOutline = "";
    var showIcon = new ui.Tween({
        values: {
            opacity: 1,
            length: {
                to: 65,
                ease: 'easeIn'
            }
        }
    });

    var spinIcon = new ui.Simulate({
        values: {
            rotate: -400
        }
    });

    var progressCompleteOutline = new ui.Tween({
        values: {
            rotate: '-=200',
            length: 100
        }
    });

    var progressCompleteTick = new ui.Tween({
        delay: 150,
        values: {
            length: 100,
            opacity: 1
        }
    });

    function showTick() {
        var progressIcon = document.querySelector('.progress-icon');

        window.progressOutline = new ui.Actor({
            element: progressIcon.getElementById('tick-outline-path')
        });
        window.progressTick = new ui.Actor({
            element: progressIcon.getElementById('tick-path')
        });

        window.progressOutline.start(showIcon)
            .then(spinIcon);
    }



    if (document.readyState != 'loading') {
        showTick();
    } else {
        document.addEventListener('DOMContentLoaded', showTick);
    }

    function completeLoading() {
        bp = document.getElementsByClassName('before-payment')[0];
        ap = document.getElementsByClassName('after-payment')[0];

        bp.classList.add('hidden');
        ap.classList.remove('hidden');

        window.progressOutline.start(progressCompleteOutline);
        window.progressTick.start(progressCompleteTick);
    }




    setTimeout(function() {
        completeLoading();
    }, 1000);
    </script>

</body>
<?php include "footer.php"?>