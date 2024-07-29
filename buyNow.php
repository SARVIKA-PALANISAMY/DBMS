<?php
	session_start();
	require 'db.php';
    $pid = $_GET['pid'];
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST['name'];
        $city = $_POST['city'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $pincode = $_POST['pincode'];
        $addr = $_POST['addr'];
        $bid = $_SESSION['id'];

        $sql = "INSERT INTO transaction (bid, pid, name, city, mobile, email, pincode, addr)
                VALUES ('$bid', '$pid', '$name', '$city', '$mobile', '$email', '$pincode', '$addr')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $_SESSION['message'] = "Order Succesfully placed! <br /> Thanks for shopping with us!!!";
            header('Location: Login/success.php');
        }
        else {
            echo $result->mysqli_error();
            //$_SESSION['message'] = "Sorry!<br />Order was not placed";
            //header('Location: Login/error.php');
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Responsive Payment getway form design</title>
	<style>
        *{padding:0; margin:0; box-sizing: border-box; font-family:sans-serif;}
header{
	width: 100vw;
	min-height: 100vh;
	background-color:#4dac71;
	font-size: 1.2rem;
	display: flex;
	justify-content: center;
	align-items: center;
}
.container{
	background: white;
	max-width: 800px;
	min-height: 500px;
	display: flex;
	justify-content:space-between;
	align-items: flex-start;
	padding: 0.5rem 1.5rem;
}
.left{
	flex-basis: 50%;
}
.right{
	flex-basis: 50%;
}
form{
	padding: 1rem;
}

h3{
	margin-top: 1rem;
	color:#4dac71;
	}

form input[type="text"]{
	width: 100%;
	padding: 0.5rem 0.7rem;
	margin: 0.5rem 0;
	outline: none;
}

#zip{
	display: flex;
	margin-top: 0.5rem;
}
#zip select{
	padding: 0.5rem 0.7rem;
}
#zip input[type="number"]{
	padding: 0.5rem 0.7rem;
	margin-left: 5px;	
}
input[type="submit"]{
	width: 100%;
	padding: 0.7rem 1.5rem;
	background: #4dac71;
	color: white;
	border: none;
	outline: none;
	margin-top: 1rem;
	cursor: pointer;
}

input[type="submit"]:hover{
	background: #4dac71;
}


@media only screen and (max-width: 770px){
	.container{
		flex-direction: column;
	}
	body{
		overflow-x: hidden;
	}
}


        </style>
</head>
<body>

<header>
	<div class="container">
		<div class="left">
			<h3>BILLING ADDRESS</h3>
			<form>
				Full name
				<input type="text" name="" placeholder="Enter name">
				Email
				<input type="text" name="" placeholder="Enter email">

				Address
				<input type="text" name="" placeholder="Enter address">
				
				City
				<input type="text" name="" placeholder="Enter City">
				<div id="zip">
					<label>
						State
						<select>
							<option>Choose State..</option>
							<option>Rajasthan</option>
							<option>Hariyana</option>
							<option>Uttar Pradesh</option>
							<option>Madhya Pradesh</option>
						</select>
					</label>
						<label>
						Zip code
						<input type="number" name="" placeholder="Zip code">
					</label>
				</div>
			</form>
		</div>
		<div class="right">
			<h3>PAYMENT</h3>
			<form>
				Accepted Card <br>
				<img src="card1.png" width="100">
				<img src="card2.png" width="50">
				<br><br>

				Credit card number
			<input type="text" name="" placeholder="Enter card number">
				
				Exp month
				<input type="text" name="" placeholder="Enter Month">
				<div id="zip">
					<label>
						Exp year
						<select>
							<option>Choose Year..</option>
							<option>2022</option>
							<option>2023</option>
							<option>2024</option>
							<option>2025</option>
						</select>
					</label>
						<label>
						CVV
						<input type="number" name="" placeholder="CVV">
					</label>
				</div>
			</form>
            <form onsubmit="return setAction(this)">
			<input type="submit" name="" value="Proceed to Checkout">
</form>
		</div>
	</div>
</header>



<script>

document.querySelector('.card-number-input').oninput = () =>{
    document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
}

document.querySelector('.card-holder-input').oninput = () =>{
    document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
}

document.querySelector('.month-input').oninput = () =>{
    document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
}

document.querySelector('.year-input').oninput = () =>{
    document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
}

document.querySelector('.cvv-input').onmouseenter = () =>{
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
}

document.querySelector('.cvv-input').onmouseleave = () =>{
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
}

document.querySelector('.cvv-input').oninput = () =>{
    document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
}

</script>
                    <section></section>
            </form>
        </fieldset>
        </body>
</html>