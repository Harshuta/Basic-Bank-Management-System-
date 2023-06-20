<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Transmission</title> 
  <style>  
   .background {
    height: 100vh;
    background-image: 
    linear-gradient(to right bottom, 
   grey,
   black),
   url('image1.jpg');
    
  background-size: cover;
    background-position: top;
    position: relative;

    margin-top: 0%;
    padding-top: 0%;
}
                *,
          *:before,
          *:after{
              padding: 0;
              margin: 0;
              box-sizing: border-box;
          }
          body{
              background-color: grey;
          }
          .backgroundf{
              width: 430px;
              height: 300px;
              position: absolute;
              transform: translate(-50%,-50%);
              left: 50%;
              top: 50%;
          }
          
          form{
              height: 680px;
              width: 400px;
              background-color:grey;
              position: absolute;
              transform: translate(-50%,-50%);
              top: 50%;
              left: 50%;
              border-radius: 10px;
              backdrop-filter: blur(10px);
              border: 2px solid grey;
              box-shadow: 0 0 40px rgba(8,7,16,0.6);
              padding: 30px 35px;
          }
          form *{
              font-family: 'Poppins',sans-serif;
              color:black;
              letter-spacing: 0.5px;
              outline: none;
              border: none;
              font-size: smaller;
          }
          form h3{
              font-size: 32px;
              font-weight: 500;
              line-height: 42px;
              text-align: center;
          }
          
          label{
              display: block;
              margin-top: 30px;
              font-size: 16px;
              font-weight: 400;
          }
          input{
              display: block;
              height: 30px;
              width: 100%;
              background-color: rgba(255,255,255,0.07);
              border-radius: 3px;
               padding: 0 10px;
              margin-top: 5px;
              font-size: 14px;
              font-weight: 100;
          }
          ::placeholder{
              color: white;
          }
          
          
.buttonn:link,
.buttonn:visited {
    text-transform: uppercase;
    text-decoration: none;
    padding: 10px 20px;
    display: inline-block;
    border-radius: 100px;
    transition: all .2s;
    position: relative;
}

.buttonn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.buttonnn:active {
    transform: translateY(-1px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.buttonn-white {
    background-color: #fff;
    color: #777;
  font-size: 14px;
}
*{
  font-weight:400;
  font-family:Means Web,Georgia,Times,Times New Roman,serif;
  -webkit-font-variant-ligatures:none;
  font-variant-ligatures:none;
  font-size:var(--h1-size);
  line-height:var(--h3-line);
  letter-spacing:0;
}

</style>
</head>
<body class="background">
    <form action="http://localhost/phpt/transactiondemo.php" method="post">
        <h3>Transaction Details</h3>
        <label for="username">Sender</label>
        <input type="text" placeholder="Name" id="sname">
        <label for="email">Sender's email</label>
        <input type="email" placeholder="Email" id="semail">
        <label for="username">Receiver</label>
        <input type="text" placeholder="Name" id="rname">
        <label for="email">Receiver's email</label>
        <input type="email" placeholder="Email" id="remail">
        <label for="amount">Amount</label>
        <input type="number" placeholder="Amount" id="amount"><br>
       <center> <a href="http://localhost/phpt/transactiondemo.php" class="buttonn buttonn-white buttonn-animated" onclick="openPopup()">Send</a></center>
    </form>
  
 
   
</body>
</html>