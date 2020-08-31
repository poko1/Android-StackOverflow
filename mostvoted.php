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
      <li class="nav-item">
        <a class="nav-link" href="/stack/index.php">Latest Questions</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Most Voted Questions<span class="sr-only">(current)</span></a>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="/stack/trending.php">Trending Tags</a>
      </li>
      
  </div>
</nav>

<section class="stack_update containder-fluid">
	<div class="mb-3">
		<h4 class="text-center">Most Voted Questions Past Week</h4>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-fit table-striped" id="tbval">
			<tr> 
				<th class="text-center"> Votes </th>
				<th class="text-center"> Title of Question </th>
				<th class="text-center"> Asked By </th>
				<th class="text-center"> Question Preview </th>
				<th class="text-center"> Top Answer Preview </th>
			</tr>

		</table>
	</div>



</section>

<script type="text/javascript">

const url = 'https://api.stackexchange.com/2.2/questions?pagesize=10&order=desc&sort=week&tagged=android&site=stackoverflow&filter=!2JjgH6x(iIUjZHSyKKGm.jtWlH1vZHa.dv(8-VrUO).wm0sBF_ldRdZlNsd(H8damzRhk(R2CpQ_*';
//https://api.stackexchange.com/2.2/questions?pagesize=10&order=desc&sort=week&tagged=android&site=stackoverflow&filter=!UHY-aKsFJ(KvceZ5uauvPwwy.asT*hES7ssa6RsGwkSch3Pb5go9mnNdeTytv9zGbkfDX57KUq';

//'https://api.stackexchange.com/2.2/questions?pagesize=10&order=desc&sort=week&tagged=android&site=stackoverflow&filter=!*SU8CGYZitCB.D*(BDVIfh2KKqQ)7jqYCBJzAPqv1FF5P6ymFq8a9Bc8edrbS03CI27qgG*u';

//'https://api.stackexchange.com/2.2/questions?pagesize=10&order=desc&sort=week&tagged=android&site=stackoverflow&filter=!*SU8CGYZitCB.D*(BDVIfh2KKqQ)7jqYCBJzAPqv1FF5P6ymFq8a9Bc8edtQc*PqJ)28g05P';
      //'https://api.stackexchange.com/2.2/questions?page=1&pagesize=10&order=desc&sort=week&tagged=android&site=stackoverflow&filter=!--1nZwT40HJH';

const questionList = document.createElement('ul');
document.body.appendChild(questionList);
var i=1;
const responseData = fetch(url).then(response => response.json());

responseData.then(({items, has_more, quota_max, quota_remaining}) => {
  for (const {title, score, answers, owner,body,is_answered,link} of items) {
  	var x = tbval.insertRow();
    
    const listItem = document.createElement('li');
    questionList.appendChild(listItem);
    const a = document.createElement('a');
    listItem.appendChild(a);
    a.href = link;
    //a.textContent = `[${score}] ${title} (by ${owner.display_name || 'somebody'}) ${is_answered}`
    
    x.insertCell(0);
	tbval.rows[i].cells[0].innerHTML=score;

	// $('<a href="'+link+'">'+title+'</a>').appendTo($(tbval.rows[i].cells[1].innerHTML));

    //x.insertCell(1);
	//tbval.rows[i].cells[1].innerHTML=title;
	var linky = document.createElement("a");
	linky.setAttribute("href", link)
	linky.className = "someCSSclass";
	var linkText = document.createTextNode(title);
	linky.appendChild(linkText);
// Add the link to the previously created TableCell.
	x.appendChild(linky)

	x.insertCell(1);
	tbval.rows[i].cells[1].innerHTML=owner.display_name || 'somebody';

	x.insertCell(2);
	var newstr="";
	body.replace( /(<([^>]+)>)/ig, '');
	var l=600;
	//var flag=1;

	if(body.length<l){l=body.length;}
	for (var k = 0; k<l; k++){
    var strChar = body.charAt(k);
        newstr += strChar;
    }
    
	tbval.rows[i].cells[2].innerHTML=newstr;
////////////////////////////////////////////////////////

	x.insertCell(3);
	newstr="";
	//flag=1;
	if(is_answered==true){
		var base= answers[0].body;
		
		var len= answers.length;
		if(len>1){
			for(var j=1; j<len; j++){
				if(answers[j-1].is_accepted==true && answers[j].is_accepted==false){
					base= answers[j-1].body;

				}
				else if(answers[j-1].is_accepted==false && answers[j].is_accepted==true){
					base= answers[j].body;
				}
				else{
					if(answers[j-1].score>=answers[j].score){
						base= answers[j-1].body;
					}
					else{
						base= answers[j].body;
					}
				}
			}

			console.log(base);
		}

	base.replace( /(<([^>]+)>)/ig, '');
	l=600;
	if(base.length<l){l=base.length;}
	for (var k = 0; k<l; k++){
    var strChar = base.charAt(k);
        newstr += strChar;
    }
    //newstr+=string(len);
    tbval.rows[i].cells[3].innerHTML= newstr;
	}
	else{
		tbval.rows[i].cells[3].innerHTML= 'Not Found';
	}
	
	//}



	i++;
  }

});
	
	


</script>


</body>


</html>
