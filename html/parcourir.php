<?php

//debut de session
session_start();

//Connexion a la db
$database = "projet web";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

/*$sql = "SELECT COUNT(*) FROM produits";
$result = mysqli_query($db_handle, $sql) ;

//nombre de produits
$rows = mysqli_num_rows($result);
$i = 0;*/
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
		
		<?php

		$query = "SELECT * from produits";
		$result = mysqli_query($db_handle, $query);
		if(mysqli_num_rows($result) > 0)
		{
			//on parcour chaques produits
  		while($data = mysqli_fetch_array($result))
  		{
			  $i = 0;
			  $i++;
		?>

		<script>

		</script>

			<!-- on créé  la table pour chaques produits -->
		<form id="test" action="produit.php" method="post">
		  <input type="hidden" name="ligne" value="<?php echo $i;?>"/>
		  test id <?php echo $i;?>
			<tr>
			
				<td><a href = "#" onclick='document.getElementById("test").submit()' style="display:block;width:100%;height:100%;"onclick='document.getElementById("test").submit()'><img src="<?php echo $data['Image'];?>" alt="Item1" height="100"></a></td>
				<td><a href = "#" onclick='document.getElementById("test").submit()' style="display:block;width:100%;height:100%;"> <?php echo $data['Nom'];?> </a> </td>
				<td><a href = "#" onclick='document.getElementById("test").submit()' style="display:block;width:100%;height:100%;"><?php echo $data['Prix_Debut'];?>€</a></td>
				<td><a href = "#" onclick='document.getElementById("test").submit()' style="display:block;width:100%;height:100%;"><?php echo $data['Prix_Direct'];?>€</a></td>
			
			</tr>
		</form>

			<?php
		  }
		}
			?>

		
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

		function buffID(ID)
		{

		}

	</script>
</body>
</html>
