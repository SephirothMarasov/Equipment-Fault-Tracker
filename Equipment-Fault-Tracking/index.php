<?php

 session_start(); /* Starts the session */

 if($_SESSION['Active'] == false){ /* Redirects user to Login.php if not logged in */
  header("location:login.php");
	exit;
  }
?>

<!DOCTYPE html>
<html>
	<head>
			<title>Equipment Fault Tracking</title>

	</header>

<body>

        <div class="jumbotron">
        <h3>Status: logged in</h3>
        <p><a class="btn btn-lg btn-success" href="logout.php" role="button">Log out</a></p>
      </div>

<form action="action_page.php" method="POST">
	<label for="store"> Store ID </label><br>
	<input type="text" id="store" name="store" value=""><br>
	<br>
	<label for="sn"> Serial number (SN)</label><br>
	<input type="text" id"sn" name="sn" value=""><br>
	<br>
	<input type="radio" id="fault1" name="fault" value="mechanical">
	<label for="fault1">Mechanical</label><br>
	<input type="radio" id="fault2" name="fault" value="electrical">
	<label for="fault2">Electrical</label><br>
	<input type="radio" id="fault3" name="fault" value="blockage">
	<label for="fault3">Blockage</label><br>
	<input type="radio" id="fault4" name="fault" value="no fault found">
	<label for="fault4">No fault found</label><br>
	<br>
	<input type="date" id="date" name="date">
	<label for="date"></label><br>
	<br>
	<input type="submit" value="Submit" name="submit"><br>
	<br>
</form>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body>
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search Serial Numer..." />
        <div class="result"></div>
</div>		
</body>
</html>
