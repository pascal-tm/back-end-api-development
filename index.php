<?php
	include_once('pages/app/examples-list.php');
	include_once('pages/app/exercises-list.php');

	$_common    = [
		"title" => 'Back end API development: course material'
	];

	$page = "outline";
	$iframeUrl = "pages/outline.php";
	if (isset($_GET['page']))
	{
		switch($_GET['page'])
		{
			case 'slides':
				$page = "slides";
				$iframeUrl = "https://docs.google.com/presentation/d/1dJdMD4FbkfrTOHhvXMcMSfhseXgy9MS2jRTXgiMzLNA/edit?usp=sharing";
				break;
			case 'examples':
				$page = "examples";
				$iframeUrl = $examples[0]['indexPath'];
				if(isset($_GET["example"]))
				{
					$iframeUrl = $_GET["example"];
				}
				break;
			case 'exercises':
				$page = "exercises";
				$iframeUrl = $exercises[0]['indexPath'];
				if(isset($_GET["exercise"]))
				{
					$iframeUrl = $_GET["exercise"];
				}
				break;
		}
	}
?>
<?php include 'pages/_partials/header.php' ?>

	<div class="container">
		
		<div class="index">
			<h2>Course</h2>

			<ul>
			    <li><a href="/?page=outline">outline</a></li>
				<li><a href="/?page=slides">slides</a></li>
			    <li>
			    	<a href="/?page=examples">examples</a>
			    	<?php if( $page == "examples"): ?>
			    	<ol>
			    		<?php foreach ($examples as $example): ?>
					<li><a href="/?page=examples&example=<?= $example['indexPath'] ?>" class="<?= ($iframeUrl == $example['indexPath']) ? 'bold': '' ?>"><?= $example['name'] ?></a></li>
						<?php endforeach ?>
			    	</ol>
			    	<?php endif ?>
			    </li>
			    <li>
			    	<a href="/?page=exercises">exercises</a>
			    	<?php if( $page == "exercises"): ?>
			    	<ol>
			    		<?php foreach ($exercises as $exercise): ?>
					<li><a href="/?page=exercises&exercise=<?= $exercise['indexPath'] ?>" class="<?= ($iframeUrl == $exercise['indexPath']) ? 'bold': '' ?>"><?= $exercise['name'] ?></a></li>
						<?php endforeach ?>
			    	</ol>
			    	<?php endif ?>
			    </li>
			</ul>

		</div>

		<div class="content">
			<iframe src="<?= $iframeUrl ?>" onload="this.style.height=(this.contentWindow.document.body.scrollHeight+30)+'px';" <?= ($page == "slides") ? 'style="height:800px"' : "" ?> 
	></iframe>
		</div>
	</div>

<?php include 'pages/_partials/footer.php' ?>
