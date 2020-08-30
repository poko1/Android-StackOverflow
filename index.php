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
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Latest Questions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Most Voted Questions</a>
      </li>
      <!-- DROPDOWN LIST
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
  DROPDOWN LIST
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
      -->
    </ul>
    <!-- search
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    search
-->
  </div>
</nav>
<!--
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
const url =
      'https://api.stackexchange.com/2.2/questions?page=1&pagesize=10&order=desc&sort=creation&tagged=android&site=stackoverflow';

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
-->

<section class="stack_update containder-fluid">
	<div class="mb-3">
		<h4 class="text-center">Most Voted Questions Past Week</h4>
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
      'https://api.stackexchange.com/2.2/questions?tab=week&page=1&pagesize=10&order=desc&sort=votes&tagged=android&site=stackoverflow';

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