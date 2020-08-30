<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'link/links.php'; ?>
	<?php include 'css/style.php'; ?>
</head>
<body onload="fetch()">
<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
  <a class="navbar-brand pl-5" href="#">Android Updates on Stack Overflow</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto pr-5">
      <li class="nav-item active">
        <a class="nav-link" href="#">Latest Questions<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/stack/mostvoted.php">Most Voted Questions</a>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="/stack/trending.php">Trending Users</a>
      </li>
      
  </div>
</nav>

<section class="stack_update containder-fluid">
	<div class="mb-3">
		<h4 class="text-center">Latest Questions</h4>
	</div>

	<div class="table-responsive">
		<table class="table-bordered table-striped text-center" id="tbval">
			<tr> 
				<th> Votes <th>
				<th> Questions </th>
				<th> Asked By </th>

			</tr>

		</table>
	</div>



</section>
<script type="text/javascript">
	function fetch(){
	 $.get=
      ('https://api.stackexchange.com/2.2/questions?page=1&pagesize=10&order=desc&sort=creation&tagged=android&site=stackoverflow',
      	function (data){
      		var tbval = document.getElementById('tbval');

      		for(var i=1; i<(data['Countries'].length);i++){
      			var x = tbval.insertRow();
      			x.insertCell(0);

      			tbval.rows[i].cells[0].innerHTML = data['items'][i-1]['score'];

      			tbval.rows[i].cell[0].style.background = '#7a4a91';

      			x.insertCell(1)
      			tbval.rows[i].cells[1].innerHTML = data['items'][i-1]['title'];

      			tbval.rows[i].cell[1].style.background = '#7a4a91';


      			x.insertCell(1)
      			tbval.rows[i].cells[1].innerHTML = data['items'][i-1]['owner'].display_name;

      			tbval.rows[i].cell[1].style.background = '#7a4a91';




      		}
      	}
)}

</script>

</body>


</html>
