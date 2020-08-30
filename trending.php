
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
      <li class="nav-item">
        <a class="nav-link" href="/stack/mostvoted.php">Most Voted Questions</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Trending Tags<span class="sr-only">(current)</span></a>
      </li>
      
  </div>
</nav>

<section class="stack_update containder-fluid">
	<div class="mb-3">
		<h4 class="text-center">Trending Android Experts</h4>
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



const url =
      'https://api.stackexchange.com/2.2/users?pagesize=10&order=desc&sort=reputation&site=stackoverflow&tag=android';

const questionList = document.createElement('ul');
document.body.appendChild(questionList);

const responseData = fetch(url).then(response => response.json());
responseData.then(({items, has_more, quota_max, quota_remaining}) => {
  for (const {title, score, owner, link, answer_count} of items) {
    const listItem = document.createElement('li');
    questionList.appendChild(listItem);
    const a = document.createElement('a');
    listItem.appendChild(a);
    a.href = link;
    a.textContent = `[${score}] ${title} (by ${owner.display_name || 'somebody'})`
  }
});

</script>


</body>


</html>