<?php

	$_common    = [
		"title" => 'Examples'
	];

	$examples = [
		[
			'name' => 'Full syntax',
			'indexPath' => '/examples/example-full-syntax/example-full-syntax.php'
		],
		[
			'name' => 'Inline syntax',
			'indexPath' => '/examples/example-inline-syntax/example-inline-syntax.php'
		]
	];

	$exampleUrl = $examples[0]['indexPath'];
	if (isset($_GET['example']))
	{
		$exampleUrl = $_GET['example'];
	}


?>
<?php include '../_partials/header.php' ?>

	<div class="container">
		
		<div class="index">
			
			<h2><?= $_common['title'] ?></h2>

			<ol>
				<?php foreach ($examples as $example): ?>
					<li><a href="/examples/index.php?example=<?= $example['indexPath'] ?>" class="<?= ($exampleUrl == $example['indexPath']) ? 'bold': '' ?>"><?= $example['name'] ?></a></li>
				<?php endforeach ?>
			</ul>

		</div>
		<div class="content">
			<iframe src="<?= $exampleUrl ?>" onload="this.style.height=(this.contentWindow.document.body.scrollHeight+20)+'px';">
></iframe>
		</div>

	</div>

	

<?php include '../_partials/footer.php' ?>
