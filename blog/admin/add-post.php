<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Publisher - Add Post</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Ek+Mukta:300,400,600|Open+Sans:400,800" rel="stylesheet">
  
  
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>

<div id="wrapper">

	<?php include('menu.php');?>
	<p><a href="./">Publisher Index</a></p>

	<h2>Publish</h2>

	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}

		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}
		if($Dept==''){
			$error[] = 'Please Select a Department';
			}

		if(!isset($error)){

			try {

				$postSlug = slug($postTitle);

				//insert into database
				$stmt = $db->prepare('INSERT INTO blog_posts_seo (postTitle,postSlug,postDesc,postCont,postDate,Dept) VALUES (:postTitle, :postSlug, :postDesc, :postCont, :postDate, :Dept)') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postSlug' => $postSlug,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':Dept' => $Dept,
					':postDate' => date('Y-m-d H:i:s')
				));

				//redirect to index page
				header('Location: index.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form action='' method='post'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}




}


.chosen-value,
.value-list {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
}

.chosen-value {
  font-family: 'Ek Mukta';
  text-transform: uppercase;
  font-weight: 600;
  letter-spacing: 4px;
  height: 4rem;
  font-size: 1.1rem;
  padding: 1rem;
  background-color: #FAFCFD;
  border: 3px solid transparent;
  -webkit-transition: .3s ease-in-out;
  transition: .3s ease-in-out;
}
.chosen-value::-webkit-input-placeholder {
  color: #333;
}
.chosen-value:hover {
  background-color: #FF908B;
  cursor: pointer;
}
.chosen-value:hover::-webkit-input-placeholder {
  color: #333;
}
.chosen-value:focus, .chosen-value.open {
  box-shadow: 0px 5px 8px 0px rgba(0, 0, 0, 0.2);
  outline: 0;
  background-color: #FF908B;
  color: #000;
}
.chosen-value:focus::-webkit-input-placeholder, .chosen-value.open::-webkit-input-placeholder {
  color: #000;
}

.value-list {
  list-style: none;
  margin-top: 4rem;
  box-shadow: 0px 5px 8px 0px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  max-height: 0;
  -webkit-transition: .3s ease-in-out;
  transition: .3s ease-in-out;
}
.value-list.open {
  max-height: 320px;
  overflow: auto;
}
.value-list li {
  position: relative;
  height: 4rem;
  background-color: #FAFCFD;
  padding: 1rem;
  font-size: 1.1rem;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  cursor: pointer;
  -webkit-transition: background-color .3s;
  transition: background-color .3s;
  opacity: 1;
}
.value-list li:hover {
  background-color: #FF908B;
}
.value-list li.closed {
  max-height: 0;
  overflow: hidden;
  padding: 0;
  opacity: 0;
}


</style>

		  <input type="text" class="chosen-value" name="Dept" value='<?php if(isset($error)){ echo $_POST['Dept'];}?>'placeholder="Department">
		  <ul class="value-list">
				<li>General</li>

				<li>Actuarial Science(ATS)</li>
				<li>Agricultural Econs(AEE)</li>
				<li>Animal Science(ANS)</li>
				 <li>Crop Science(CRS)</li>
			  <li>Fishery(FIS)</li>	
			  <li>Forestry and Wildlife(FAW)</li>
			  <li>Soil Science and Land Management (SSLM)</li>

		</ul>
<script type="text/javascript">
'use strict';

var inputField = document.querySelector('.chosen-value');
var dropdown = document.querySelector('.value-list');
var dropdownArray = [].concat(document.querySelectorAll('li'));
var dropdownItems = dropdownArray[0];
dropdown.classList.add('open');
inputField.focus(); // Demo purposes only

var valueArray = [];
dropdownItems.forEach(function (item) {
  valueArray.push(item.textContent);
});

var closeDropdown = function closeDropdown() {
  dropdown.classList.remove('open');
};

inputField.addEventListener('input', function () {
  dropdown.classList.add('open');
  var inputValue = inputField.value.toLowerCase();
  var valueSubstring = undefined;
  if (inputValue.length > 0) {
    for (var j = 0; j < valueArray.length; j++) {
      if (!(inputValue.substring(0, inputValue.length) === valueArray[j].substring(0, inputValue.length).toLowerCase())) {
        dropdownItems[j].classList.add('closed');
      } else {
        dropdownItems[j].classList.remove('closed');
      }
    }
  } else {
    for (var i = 0; i < dropdownItems.length; i++) {
      dropdownItems[i].classList.remove('closed');
    }
  }
});

dropdownItems.forEach(function (item) {
  item.addEventListener('click', function (evt) {
    inputField.value = item.textContent;
    dropdownItems.forEach(function (dropdown) {
      dropdown.classList.add('closed');
    });
  });
});

inputField.addEventListener('focus', function () {
  inputField.placeholder = 'Select Dept';
  dropdown.classList.add('open');
  dropdownItems.forEach(function (dropdown) {
    dropdown.classList.remove('closed');
  });
});

inputField.addEventListener('blur', function () {
  inputField.placeholder = 'Department';
  dropdown.classList.remove('open');
});

document.addEventListener('click', function (evt) {
  var isDropdown = dropdown.contains(evt.target);
  var isInput = inputField.contains(evt.target);
  if (!isDropdown && !isInput) {
    dropdown.classList.remove('open');
  }
});
</script>
		
		<p><label>Target</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea></p>

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>

		<p><input type='submit' name='submit' value='Submit'></p>

	</form>

</div>
