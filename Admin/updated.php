<?php

include 'Header.php';
?>
<body>
	<br>
<br>
<br>
<br>
<br>

     <div class="container">
        <div class="box">
        	<img src="icon.png"/>
        	<div class="box1">
        	

            <div class="caption">
                
                <p id="p1"><b><?php echo 'Your account has been updated';?></b></p>
                 <p id="p1"><?php echo 'An email providing update details has been sent!';?></p>
                
            </div>
            
    </div>
       <div id="note" class="center">
                <a href="edit.php"
                    style="color:black;">Visit Profile</a>
            </div>
   

        </div>
    </div>
<br>
 <style>
    body {
        background-color: #f9fafb;

    }
      main {
        display: flex;
        flex-direction: column;
        justify-items: center;
        align-items: center;
        box-sizing: border-box;
    }

    .box {
    	width:40%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-top-left-radius: 17px;
        border-top-right-radius: 17px;
        border-bottom-right-radius: 17px;
        border-bottom-left-radius: 17px;
         background-color:rgb(121, 204, 219);
          margin-left:23em;
    }

    

    .caption {
        text-align: center;
        margin-top: 3em;
        margin-bottom: 2.5em;
        margin-left: 4.2em;
        margin-right: 4.2em;
    }

    h2,
    p {
        margin: 0;
        font-family: sans-serif;
    }

    #h2 {
        font-size: 1.5rem;
        color: #000000;

    }
     #p1 {
        font-size: 1.2rem;
        color: #000000;

    }
   
    .box1 {
        width:10%
        display: flex;
        flex-direction: column;
        margin-left: .5em;
        margin-right: .5em;
    }
     #note {
        color: snow;
        font-size: 1rem;
        font-family: sans-serif;
        text-align: center;
        cursor: pointer;
            margin-bottom: 2em;
    }

    </style>
</style>
</body>


