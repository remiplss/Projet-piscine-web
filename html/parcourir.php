<?php

//debut de session
session_start();

//Connexion a la db
$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);



?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="format.css">
	<style>
		table {
			border-spacing: 0;
			width: 100%;
			height: 50%;
			border: 1px solid #ddd;
			overflow: auto;
			padding-bottom: 10%;
		}

		th {
			cursor: pointer;

		}

		th, td {
			text-align: center;
			padding: 16px;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		tr:hover {
			background-color: #f5f5f5;
		}

	</style>
</head>
<body>
	<header>
		<a href="Page d'accueil.php"><img src="LOGOprojet.png" alt="Market place Logo" width="500"></a>
	</header>
	<div class="nav-bar">
		<a href="Page d'accueil.php">Accueil</a>
		<a href="parcourir.html">Tout parcourir</a>
		<a href="notification.html">Notification</a>
		<a href="panier.html">Panier</a>
		<a href="compte.php">Mon compte</a>
	</div>
	<table id="myTable">
		<tr>  
			<th>Aperçu</th>
			<th onclick="sortTable(1)">Produit</th>
			<th onclick="sortTable(2)">Prix de départ</th>
			<th onclick="sortTable(3)">Prix d'achat immédiat</th>
		</tr>
		<tr >
			
			<th><a href = "produit.php" style="display:block;width:100%;height:100%;"><img src="test1.jpg" alt="Item1" height="100"></a></th>
			<td> <a href = "produit.php" style="display:block;width:100%;height:100%;"> Texas TI N-Spire </a> </td>
			<td><a href = "produit.php" style="display:block;width:100%;height:100%;">57.90</a></td>
			<td><a href = "produit.php" style="display:block;width:100%;height:100%;">133.50</a></td>
			
		</tr>
		<tr>
			<th><img src="test2.jpg" alt="Item2" height="100"></th>
			<td>Kit PCB Cuivre DIY</td>
			<td>9.00</td>
			<td>16.00</td>
		</tr>
		<tr>
			<th><img src="test3.jpg" alt="Item3" height="100"></th>
			<td>Arduino Uno + Câbles</td>
			<td>25.55</td>
			<td>47.76</td>
		</tr>
		<tr>
			<th><img src="test4.jpg" alt="Item4" height="100"></th>
			<td>ASUS E406MA-BV901TS - 14.0" - Neuf</td>
			<td>175.00</td>
			<td>299.00</td>
		</tr>
		
	</table>
	
	<div class="footer">
			<p>Copyright &copy; 2021 ECE MarketPlace
			<a href="contact.html">Contact</a></p>
	</div>
	<script>
		function sortTable(n) {
			var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
			table = document.getElementById("myTable");
			switching = true;
  			//Set the sorting direction to ascending:
  			dir = "asc"; 
  			/*Make a loop that will continue until
  			no switching has been done:*/
  			while (switching) {
    			//start by saying: no switching is done:
    			switching = false;
    			rows = table.rows;
    			/*Loop through all table rows (except the
    			first, which contains table headers):*/
    			for (i = 1; i < (rows.length - 1); i++) {
      				//start by saying there should be no switching:
      				shouldSwitch = false;
      				/*Get the two elements you want to compare,
      				one from current row and one from the next:*/
      				x = rows[i].getElementsByTagName("TD")[n];
      				y = rows[i + 1].getElementsByTagName("TD")[n];
      				/*check if the two rows should switch place,
      				based on the direction, asc or desc:*/
      				if (dir == "asc") {

      					if (n==1) {
      						if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          						//if so, mark as a switch and break the loop:
          						shouldSwitch= true;
          						break;
      						}
      					}
      					if (n==2 || n==3) {
      						if (Number(x.innerHTML) > Number(y.innerHTML)) {
          						//if so, mark as a switch and break the loop:
          						shouldSwitch= true;
          						break;
      						}
      					}
  					} else if (dir == "desc") {
  				
  						if (n==1) {	
  							if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          						//if so, mark as a switch and break the loop:
          						shouldSwitch = true;
          						break;
      						}
  						}
  						if (n==2 || n==3) {	
  							if (Number(x.innerHTML) < Number(y.innerHTML)) {
          						//if so, mark as a switch and break the loop:
          						shouldSwitch = true;
          						break;
      						}
  						}
  					}
				}
				if (shouldSwitch) {
      				/*If a switch has been marked, make the switch
     				and mark that a switch has been done:*/
      				rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      				switching = true;
      				//Each time a switch is done, increase this count by 1:
      				switchcount ++;      
  				} else {
      				/*If no switching has been done AND the direction is "asc",
      				set the direction to "desc" and run the while loop again.*/
      				if (switchcount == 0 && dir == "asc") {
      					dir = "desc";
      					switching = true;
      				}
  				}
			}	
		}
	</script>
</body>
</html>
