<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'link/links.php'; ?>
	<?php include 'css/style.php'; ?>
</head>
<body>
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
        <a class="nav-link" href="/stack/trending.php">Trending Tags</a>
      </li>
      
  </div>
</nav>

<section class="stack_update containder-fluid">
	<div class="mb-3">
		<h4 class="text-center">Latest Questions</h4>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="tbval">
			<tr> 
				<th class="text-center"> Votes </th>
				<th class="text-center"> Title of Question </th>
				<th class="text-center"> Asked By </th>
				<th class="text-center"> Question Preview </th>
			</tr>

		</table>
	</div>



</section>
<script type="text/javascript">
const url =
      'https://api.stackexchange.com/2.2/questions?page=1&pagesize=10&order=desc&sort=creation&tagged=android&site=stackoverflow&filter=!9_bDDxJY5';
      // /2.2/questions?page=1&pagesize=10&order=desc&sort=creation&tagged=android&site=stackoverflow';

const questionList = document.createElement('ul');
document.body.appendChild(questionList);
var i = 1;
const responseData = fetch(url).then(response => response.json());
responseData.then(({items, has_more, quota_max, quota_remaining}) => {
  for (const {title, score, owner, link, body} of items) {
  	var x = tbval.insertRow();

    const listItem = document.createElement('li');
    questionList.appendChild(listItem);
    const a = document.createElement('a');
    listItem.appendChild(a);
    a.href = link;
    //a.textContent = `[${score}] ${title} (by ${owner.display_name || 'somebody'})`;

    x.insertCell(0);
	tbval.rows[i].cells[0].innerHTML=score;

	// $('<a href="'+link+'">'+title+'</a>').appendTo($(tbval.rows[i].cells[1].innerHTML));

//x.insertCell(1);
	var linky = document.createElement("a");
	linky.setAttribute("href", link)
	linky.className = "someCSSclass";
// For IE only, you can simply set the innerText of the node.
// The below code, however, should work on all browsers.
	var linkText = document.createTextNode(title);
	linky.appendChild(linkText);

// Add the link to the previously created TableCell.
	x.appendChild(linky)

	x.insertCell(1);
	tbval.rows[i].cells[1].innerHTML=owner.display_name || 'somebody';

//////////////////////////////////////////////////////
	x.insertCell(2);
	var newstr="";
	body.replace( /(<([^>]+)>)/ig,'');
	var l=600;
	//var flag=1;

	if(body.length<l){l=body.length;}
	for (var k = 0; k<l; k++){
    var strChar = body.charAt(k);
        newstr += strChar;
    }
    
	tbval.rows[i].cells[2].innerHTML=newstr;

	i++;

  }
});

</script>

</body>


</html>
