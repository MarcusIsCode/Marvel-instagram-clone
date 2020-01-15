# picture this
<img src="https://media.giphy.com/media/3c2i2TC2FT5KM/giphy.gif" width="100%">

## in progress


## Code Review

* Project might not be done when I’m making this code reveiw but on line 130 in function.php gives me errors when trying the project. Undefined index. You might want to look in to that
* From what I can see, you are saving image posts to assets/Images/post_img/. That folder is not included in the repository. So when someone else is testing the project the can’t upload posts properly. To resolve this you can create a .gitkeep in that folder and att these lines to your .gitignore:
```
	assets/Images/post_img/*
	!assets/Images/post_img/.gitkeep
  ```
* On line 46 in function.php you might want to add a space before “exceeded” to Make it look like: “File exceeded ……..” instead of Fileexceeded …….” 
* On line 41, 44 and 110 in fetch.js you might want to remove the console.logs
* In function.php, don’t forget to use PHP DocBlocker on every function.
* On some buttons in the front end (example: line 2 in out.php, line 56, 57 in profile.php) you might want to start the word with a capital letter, since most of your button-texts start with a capital letter.. (Example: Sign out, instead of sign out).
* If I try to update my password and the “New password” and “Confirm new password” doesn’t match, I’m not getting any error message saying that it doesn’t match. You might want to look into why it’s not showing up, because I can see that you’ve added this on line 15-20 in updateAccount.php
* On line 11 in login.php, is the bindParam really needed? When looking at the rest of your back end code, you’re only using prepary and execute. In order to be more consistent you might want to  git rid of the bindParam and only use prepare and execute here as well? 
* There are some comments in your front end code you might want to get rid of. Example: line 9 in editPostV.php 
```
(<!--change here—>)
```
* Suggestion: In the update account section, it would be nice to see the current “About yourself” text that’s in the database when you want to update it. It’s currently just an empty textarea. 

Code review by:
[Andreas Lindberg](#https://github.com/oaflindberg)
