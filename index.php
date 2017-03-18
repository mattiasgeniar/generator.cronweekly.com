<body>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>

<?php
# Generate the most probably next issue number
$issue_71_release_date = strtotime("2017-03-12 00:00:00");
$today                 = time();

$next_issue = round((($today - $issue_71_release_date) / 60 / 60 / 24 / 7) + 71, 0);
?>

<div class="container">
	<form class="form-horizontal" method="post" action="/render.php">
	<fieldset>

	<!-- Form Name -->
	<h1>cron.weekly mail generator</h1>
  <p>Unless your name is Mattias Geniar, you probably shouldn't be using this.</p>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="textinput">Issue #</label>
	  <div class="col-md-8">
	  <input id="textinput" name="issue" type="text" placeholder="<?= $next_issue ?>" class="form-control input-md" value="<?= $next_issue ?>">
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="textinput">Title</label>
	  <div class="col-md-8">
	  <input id="textinput" name="title" type="text" placeholder="PostgreSQL 9.6, Security, Otto, armor, conferences &amp; more!" class="form-control input-md">
	  </div>
	</div>

	<!-- Text input-->
	<?php
		$date = @strtotime("next sunday");
		$date_display = "Sunday, ". @date('F', $date) ." ". @date('j', $date) .", ". @date('Y', $date);
	?>
	<div class="form-group">
	  <label class="col-md-2 control-label" for="textinput">Date</label>
	  <div class="col-md-8">
	  <input id="textinput" name="date" type="text" placeholder="<?= $date_display ?>" class="form-control input-md" value="<?= $date_display ?>">
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="textarea">Intro text</label>
	  <div class="col-md-8">
	    <textarea class="form-control" id="intro" name="intro" rows="10" cols="30" placeholder="Lots of variation again that should keep you busy on your Sunday!

I'm also in the process of moving the e-mail list to something self-hosted ..."></textarea>
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="textarea">Full body content</label>
	  <div class="col-md-8">
	    <textarea class="form-control" id="content" name="content" rows="30" cols="10" placeholder="copy/paste wordpress HTML here"></textarea>
	  </div>
	</div>

  <!-- Text / HTML? -->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="text_html">Text or HTML?</label>
	  <div class="col-md-8 radio">
      <div class="radio">
        <label><input type="radio" name="type" value="text" checked>Text</label>
      </div>

      <div class="radio">
        <label><input type="radio" name="type" value="html">HTML</label>
      </div>
	  </div>
	</div>

	<div class="form-group">
	  <div class="col-md-8">
	    <input type="submit" id="button1id" name="button1id" class="btn btn-success" value="Render!">
	  </div>
	</div>

	</fieldset>
	</form>
  </div>
</body>
